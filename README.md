<p align="center">
  <a href="https://github.com/wahyusuhar" target="_blank">
    <img src="https://raw.githubusercontent.com/wahyusuhar/Kerja_Peraktek2025/main/public/img/logo123.png" width="210">
  </a>
</p>

## Tentang Aplikasi

Aplikasi POS atau point of sales adalah aplikasi yang digunakan untuk mengelola transaksi pada sebuah toko atau oleh kasir. Aplikasi ini dibuat menggunakan Laravel v8.\* dan minimal PHP v7.4 jadi apabila pada saat proses instalasi atau penggunaan terdapat error atau bug kemungkinan karena versi dari PHP yang tidak support.

### 🚀 Beberapa Fitur yang tersedia :

-   Manajemen Kategori Produk
-   Manajemen Produk
    -   Multiple Delete
    -   Cetak Barcode
-   Manajemen Member atau Anggota
    -   Cetak Kartu Member
-   Manajemen Supplier
-   Transaksi Pengeluaran
-   Transaksi Pembelian
-   Transaksi Penjualan
-   Laporan Pendapatan atau Laba & Rugi
    -   Bulanan
    -   Harian
    -   Custom Tanggal
-   Custom Tipe Nota
    -   Nota Besar
    -   Nota Kecil / Thermal Nota
-   Manajemen User dan Profil
-   Pengaturan Toko
    -   Identitas
    -   Upload Desain Kartu Member
    -   Setting Diskon Member
-   Chat Bot kasir
-   User (Admin, Kasir)
-   Grafik ChartJS pada Dashboard

### 🏗️ Instalasi

#### Via Git

```bash
git clone https://github.com/wahyusuhar/Kerja_Peraktek2025.git
```

### Download ZIP

[Link](https://github.com/wahyusuhar/Kerja_Peraktek2025?tab=readme-ov-file)

### Setup Aplikasi

Jalankan perintah

```bash
composer update
```

atau:

```bash
composer install
```

Copy file .env dari .env.example

```bash
cp .env.example .env
```

Konfigurasi file .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_app
DB_USERNAME=root
DB_PASSWORD=
```

Opsional

```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:QGRW4K7UVzS2M5HE2ZCLlUuiCtOIzRSfb38iWApkphE=
APP_DEBUG=true
APP_URL=http://example-app.test
```

Generate key

```bash
php artisan key:generate
```

Migrate database

```bash
php artisan migrate
```

Seeder table User, Pengaturan

```bash
php artisan db:seed
```

Menjalankan aplikasi

```bash
php artisan serve
```
