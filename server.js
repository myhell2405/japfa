import express from 'express';
import session from 'express-session';
import sqlite3 from 'sqlite3';
import bcrypt from 'bcrypt';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const DB_PATH = path.resolve(process.cwd(), 'database.sqlite');
const db = new sqlite3.Database(DB_PATH);

function runSql(sql, params=[]) {
  return new Promise((resolve, reject) => {
    db.run(sql, params, function(err){ if(err) reject(err); else resolve(this); });
  });
}

function getSql(sql, params=[]) {
  return new Promise((resolve, reject) => {
    db.get(sql, params, (err, row) => { if(err) reject(err); else resolve(row); });
  });
}

async function ensureSchema(){
  await runSql(`
    CREATE TABLE IF NOT EXISTS users (
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      username TEXT NOT NULL UNIQUE,
      password_hash TEXT NOT NULL,
      role TEXT NOT NULL,
      created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )
  `);
}

await ensureSchema();

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use(session({
  secret: process.env.SESSION_SECRET || 'please-change-this-secret',
  resave: false,
  saveUninitialized: false,
  cookie: { maxAge: 1000 * 60 * 60 * 8 } // 8 hours
}));

// Serve static files (login.html and dashboards)
app.use(express.static(path.join(__dirname, 'public')));

// Login endpoint
app.post('/api/auth/login', async (req, res) => {
  try {
    const { username, password } = req.body;
    if(!username || !password) return res.status(400).json({ ok:false, msg: 'username & password required' });

    const user = await getSql('SELECT id, username, password_hash, role FROM users WHERE username = ?', [username]);
    if(!user) return res.status(401).json({ ok:false, msg: 'Invalid credentials' });

    const match = await bcrypt.compare(password, user.password_hash);
    if(!match) return res.status(401).json({ ok:false, msg: 'Invalid credentials' });

    // Set session
    req.session.user = { id: user.id, username: user.username, role: user.role };
    res.json({ ok:true, role: user.role, username: user.username });
  } catch(err){
    console.error('login error', err);
    res.status(500).json({ ok:false, msg: 'Internal error' });
  }
});

// Logout
app.post('/api/auth/logout', (req, res) => {
  req.session.destroy(err => {
    if(err){
      console.error('session destroy err', err);
      return res.status(500).json({ ok:false });
    }
    res.json({ ok:true });
  });
});

// Check current user
app.get('/api/auth/me', (req, res) => {
  if(req.session && req.session.user) return res.json({ ok:true, user: req.session.user });
  return res.status(401).json({ ok:false });
});

// Dashboard route: serve role-specific dashboard based on session
app.get('/dashboard', (req, res) => {
  if(!req.session || !req.session.user) {
    return res.redirect('/login.html');
  }
  const role = req.session.user.role;
  if(role === 'owner') return res.sendFile(path.join(__dirname, 'public', 'dashboards', 'owner.html'));
  if(role === 'manajer') return res.sendFile(path.join(__dirname, 'public', 'dashboards', 'manajer.html'));
  if(role === 'operator') return res.sendFile(path.join(__dirname, 'public', 'dashboards', 'operator.html'));

  // default
  return res.sendFile(path.join(__dirname, 'public', 'dashboards', 'operator.html'));
});

// Simple auth middleware for API routes
function ensureAuth(req, res, next){
  if(req.session && req.session.user) return next();
  return res.status(401).json({ ok:false, msg: 'not authenticated' });
}

// Example protected API route
app.get('/api/protected/sample', ensureAuth, (req, res) => {
  res.json({ ok:true, msg: `Hello ${req.session.user.username}. This is protected data for role ${req.session.user.role}.` });
});

app.listen(PORT, () => {
  console.log(`Server listening on http://localhost:${PORT}`);
});
