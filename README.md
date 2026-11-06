# 🐔 Sistem Informasi Manajemen Kemitraan Peternakan (SIM-Kemitraan)

Aplikasi berbasis web untuk tata kelola kemitraan peternakan ayam broiler, mencakup pencatatan peternak mitra, kapasitas kandang, perjanjian kontrak kerja sama, logistik sarana produksi ternak (Sapronak: DOC, pakan, obat), standarisasi kelas bobot harga panen, hingga evaluasi mortalitas dengan mekanisme kontrol akses berbasis peran (RBAC).

---

## 🚀 Fitur Utama & Modul Sistem

### 1. Autentikasi & Multi-Role Access Control (RBAC)
- **Owner**: Akses monitoring performa kemitraan dan laporan strategis.
- **Manajer**: Otoritas penuh pengelolaan master data, kontrak kemitraan, alokasi sapronak, dan manajemen akun pengguna.
- **Operator**: Pencatatan aktivitas harian dan input operasional lapangan.

### 2. Tata Kelola Kemitraan & Fasilitas
- **Data Mitra**: Direktori lengkap peternak mitra, riwayat kemitraan, dan kontak.
- **Data Kandang**: Pemetaan kapasitas populasi, tipe kandang, dan lokasi geografis.
- **Manajemen Kontrak**: Pencatatan periode siklus kemitraan, target populasi, dan klausul kerja sama.

### 3. Logistik Sarana Produksi Peternakan (Sapronak)
- **DOC (Day-Old Chicken / Bibit)**: Pencatatan batch bibit ayam, asal distributor, dan tanggal kedatangan.
- **Manajemen Pakan**: Inventaris jenis pakan (Pre-starter, Starter, Finisher), monitoring stok, dan konsumsi.
- **Manajemen Obat & Vaksin**: Pengawasan jadwal vaksinasi, pemberian vitamin, dan penanganan kesehatan ternak.

### 4. Standarisasi Panen & Skema Penilaian
- **Kelas Bobot & Skema Harga**: Penetapan batas ambang bobot ayam dan matriks penyesuaian harga beli.
- **Monitoring Mortalitas**: Klasifikasi kategori kematian ayam untuk identifikasi dini risiko penyakit dan evaluasi performa budidaya (FCR / IP).

---

## 🛠️ Stack Teknologi

- **Backend**: PHP 8.2+, Laravel 11/12
- **Database**: MySQL / MariaDB (ORM Eloquent, Migration, & Seeder)
- **Frontend**: Blade Templating, Tailwind CSS, Vite
- **Autentikasi**: Custom Role-Based Session Middleware

---

## 📁 Struktur Direktori Proyek

`	ext
japfa/
├── app/
│   ├── Http/Controllers/       # Logika controller: Mitra, Kandang, Kontrak, Sapronak
│   └── Models/                 # Eloquent Model: User, Mitra, Kandang, Kontrak, dsb.
├── database/
│   ├── migrations/             # Skema tabel database relasional
│   └── seeders/                # Data awal pengguna & parameter default
├── resources/
│   └── views/                  # Tampilan antarmuka Blade per peran
├── routes/
│   └── web.php                 # Definisi rute aplikasi & middleware filter
└── README.md                   # Dokumentasi sistem
`

---

## 💻 Panduan Instalasi Lokal

### 1. Prasyarat
- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL Server

### 2. Langkah Pengaturan

`ash
# Clone repositori
git clone git@github.com:myhell2405/japfa.git
cd japfa

# Pasang dependensi
composer install
npm install

# Konfigurasi environment
cp .env.example .env
php artisan key:generate

# Konfigurasi database di file .env, lalu jalankan migrasi & seeder
php artisan migrate --seed

# Kompilasi aset frontend
npm run build

# Jalankan server pengembangan
php artisan serve
`

Akses sistem melalui peramban di: http://localhost:8000

---

## 👤 Pengembang

**Helmy Akrim, S.Kom**  
*Sarjana Sistem Informasi \| Systems Analyst & Full-Stack Developer*