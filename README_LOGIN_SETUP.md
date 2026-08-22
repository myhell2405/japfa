Instruksi setup login dan seeder (Laravel)

1. Pastikan file gambar latar ada di: public/assets/login-bg.png
   - Copy file yang kamu upload ke lokasi ini.

2. Migration
   - Terdapat migration baru: database/migrations/2026_08_08_000000_add_username_and_role_to_users.php
   - Jalankan:
       php artisan migrate

   - Migration ini menambahkan kolom `username` (unique) dan `role` pada table users.

3. Seeder
   - Seeder baru: Database\Seeders\UsersTableSeeder
   - Menambahkan: owner1-3, manajer1, operator1-5 dengan password default password123
   - Jalankan:
       php artisan db:seed

4. Menjalankan aplikasi
   - Pastikan dependensi PHP terpasang dan environment .env dikonfigurasi
   - Jalankan local server:
       php artisan serve
   - Buka: http://127.0.0.1:8000/login

5. Penyesuaian
   - Jika project menggunakan `email` untuk login di tempat lain, perhatikan perubahan bahwa login sekarang memakai `username`.
   - Ubah SESSION_SECRET / APP_KEY jika diperlukan.

6. Catatan keamanan
   - Password default untuk seeder adalah `password123`. Ganti segera setelah deploy.

Jika ingin, dapat menambahkan formulir reset password, registrasi, atau integrasi dengan Laravel Breeze/Jetstream untuk fitur lengkap auth.
