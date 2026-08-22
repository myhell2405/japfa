/*
  Seeder for users using SQLite and bcrypt.
  - Creates database file: database.sqlite (in repo root)
  - Creates table `users` if not exists
  - Inserts: 3 owners, 1 manajer, 5 operators

  Usage:
    1. npm install
    2. node seeds/seed.js

  Default password for all seeded users: password123
  Change passwords after seeding in production.
*/

const fs = require('fs');
const path = require('path');
const sqlite3 = require('sqlite3');
const bcrypt = require('bcrypt');

const DB_PATH = path.resolve(process.cwd(), 'database.sqlite');

async function run() {
  const db = new sqlite3.Database(DB_PATH);

  const runAsync = (sql, params=[]) => new Promise((res, rej) => db.run(sql, params, function(err){ if(err) rej(err); else res(this); }));
  const allAsync = (sql, params=[]) => new Promise((res, rej) => db.all(sql, params, (err, rows) => { if(err) rej(err); else res(rows); }));

  try {
    // Create users table
    await runAsync(`
      CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        role TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
      );
    `);

    // Clear any existing seeded users with names we will create (safe for repeated runs)
    const usernames = [];
    for(let i=1;i<=3;i++) usernames.push(`owner${i}`);
    for(let i=1;i<=1;i++) usernames.push(`manajer${i}`);
    for(let i=1;i<=5;i++) usernames.push(`operator${i}`);

    for(const u of usernames){
      await runAsync(`DELETE FROM users WHERE username = ?`, [u]).catch(()=>{});
    }

    const plain = 'password123';
    const saltRounds = 10;
    const hash = await bcrypt.hash(plain, saltRounds);

    // Insert owners (3)
    for(let i=1;i<=3;i++){
      await runAsync(`INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?);`, [ `owner${i}`, hash, 'owner' ]);
    }

    // Insert manajer (1)
    for(let i=1;i<=1;i++){
      await runAsync(`INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?);`, [ `manajer${i}`, hash, 'manajer' ]);
    }

    // Insert operators (5)
    for(let i=1;i<=5;i++){
      await runAsync(`INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?);`, [ `operator${i}`, hash, 'operator' ]);
    }

    console.log('Seeding selesai. Database:', DB_PATH);
    console.log('User list:');
    const rows = await allAsync(`SELECT id, username, role, created_at FROM users WHERE username IN (${usernames.map(()=>'?').join(',')}) ORDER BY role, username`, usernames);
    console.table(rows);
    console.log('Default password for seeded accounts: password123');
  } catch(err){
    console.error('Error saat seeding:', err);
  } finally{
    db.close();
  }
}

run();
