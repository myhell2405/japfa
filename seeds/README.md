Seeder instructions

Files created:
- seeds/seed.js : Node.js seeder that creates database.sqlite and inserts users

How to run (from repo root):

1. Install dependencies (adds sqlite3 and bcrypt):

   npm install bcrypt sqlite3

   Or, if you prefer to use the project's package manager and package.json has been updated:

   npm install

2. Run the seeder:

   node seeds/seed.js

   Or via npm script (if using the updated package.json):

   npm run seed

Seeded accounts (username -> role):
- owner1 -> owner
- owner2 -> owner
- owner3 -> owner
- manajer1 -> manajer
- operator1 -> operator
- operator2 -> operator
- operator3 -> operator
- operator4 -> operator
- operator5 -> operator

Default password for seeded accounts: password123
Change these immediately in production.

Notes:
- Seeder creates database.sqlite in the repository root.
- The users table has: id, username, password_hash, role, created_at
- If you need raw SQL instead, run a SELECT on the database or use sqlite3 to export.
