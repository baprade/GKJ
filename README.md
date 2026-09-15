# Website Resmi GKJ Wonogiri

Website resmi dan sistem informasi jemaat **Gereja Kristen Jawa (GKJ) Wonogiri**, Jawa Tengah. Aplikasi ini digunakan untuk publikasi warta gereja, renungan, galeri kegiatan, serta pelayanan administrasi formulir gerejawi secara daring bagi warga jemaat.

---

## 🛠️ Tech Stack & Versi

* **Backend:** PHP `^8.2` / `8.3`
* **Framework:** Laravel `11.31`
* **Reactivity / Frontend:** Livewire `^3.5`, Alpine.js
* **Styling & UI:** Tailwind CSS, UIkit, FontAwesome 6
* **Database:** SQLite (default) / MySQL ready
* **Rich Text Editor:** Summernote Lite
* **SEO & Tooling:** Spatie Laravel Sitemap `^7.3`, Vite

---

## ✨ Fitur Utama

### 1. Portal Publik
* **Beranda & Profil Gereja:** Informasi seputar sejarah, visi, misi, dan jadwal ibadah.
* **Berita & Warta Gereja:** Publikasi artikel, warta jemaat mingguan, dan renungan.
* **Galeri Media:** Dokumentasi kegiatan persekutuan dalam bentuk foto dan video.
* **Optimasi Media:** Gambar yang diunggah otomatis di-resize dan dikonversi ke format `.webp` untuk kompresi maksimal dan loading cepat.

### 2. Layanan Formulir Gerejawi Online
Mempermudah jemaat mengajukan permohonan pelayanan gerejawi tanpa harus datang langsung ke kantor gereja:
* Pendaftaran Registrasi Warga Baru
* Formulir Baptis (Anak & Dewasa)
* Formulir Peneguhan Sidi
* Formulir Pernikahan Kudus
* Formulir Atestasi (Pindah Masuk / Keluar)
* Formulir Titip Warga
* Formulir Pengakuan / Percakapan Pastoral
* Pelaporan Kelahiran & Kematian Warga

### 3. CMS (Content Management System)
* Dashboard analitik konten dan ringkasan pengajuan formulir.
* Manajemen postingan berita, kategori, dan slide beranda.
* Manajemen data jemaat (data warga gereja) dan arsip formulir masuk.
* **Role-Based Access Control (RBAC):** Pembagian hak akses berjenjang untuk Admin Utama, Majelis, dan Operator Sekretariat.

---

## 🚀 Panduan Instalasi Lokal

### Prasyarat
* PHP >= 8.2 dengan ekstensi `pdo_sqlite`, `gd`, `mbstring`, `curl`, `xml`, `zip` aktif
* Composer
* Node.js & NPM (untuk build aset)

### Langkah-langkah

1. **Clone repositori:**
   ```bash
   git clone https://github.com/username/gkj-wonogiri.git
   cd gkj-wonogiri
   ```

2. **Install dependensi PHP & Node:**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup Database SQLite:**
   Buat file database kosong (jika belum ada), lalu jalankan migrasi:
   ```bash
   # Linux / macOS / Git Bash:
   touch database/database.sqlite

   # Windows PowerShell:
   New-Item -ItemType File -Path database\database.sqlite -Force

   # Jalankan migrasi dan seeder awal
   php artisan migrate --seed
   ```

5. **Build Aset Frontend:**
   ```bash
   npm run build
   ```
   *(Gunakan `npm run dev` jika sedang dalam proses pengembangan/development).*

6. **Jalankan Server Lokal:**
   ```bash
   php artisan serve
   ```
   Buka browser di `http://localhost:8000`.

---

## 🌐 Struktur Deployment (Shared Hosting / cPanel)

Untuk alasan keamanan pada shared hosting, struktur direktori aplikasi dipisah agar file sensitif tidak berada di web root:

```text
/home/user/
├── laravel/               <-- Inti project Laravel (di luar web root publik)
│   ├── app/
│   ├── config/
│   ├── database/          <-- File database.sqlite
│   ├── storage/
│   └── .env               <-- Kredensial aman di sini
└── public_html/           <-- Document root web publik
    ├── build/             <-- Aset hasil compile Vite
    ├── css/
    ├── js/
    ├── .htaccess          <-- Proteksi gembok dotfiles & redirect HTTPS
    └── index.php          <-- Entry point (terhubung ke ../laravel)
```

Pada `public_html/index.php`, public path di-bind otomatis ke folder `public_html`:
```php
$app = require_once __DIR__.'/../laravel/bootstrap/app.php';
$app->usePublicPath(__DIR__);
```

---

## 📄 Lisensi

Project ini dikembangkan untuk kebutuhan internal dan pelayanan **GKJ Wonogiri**. Dilindungi di bawah lisensi [MIT](LICENSE).
