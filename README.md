# KosmoKost – Boarding House Reservation System

## Project Title
KosmoKost – Boarding House Reservation System

---

## Description
KosmoKost adalah aplikasi web berbasis PHP dan MySQL yang berfungsi sebagai sistem pemesanan dan manajemen kost.
Aplikasi ini dibuat untuk mempermudah pencarian kamar kost, proses pemesanan, serta pengelolaan data penghuni dan pembayaran oleh admin.

Proyek ini merupakan bagian dari **Capstone Project – Student Developer Initiative** dengan memanfaatkan AI (IBM Granite) untuk membantu proses pengembangan kode.

---

## Technologies Used
- **Frontend**: HTML, CSS, Bootstrap  
- **Backend**: PHP (Native)  
- **Database**: MySQL (XAMPP)  
- **Tools**: Visual Studio Code, phpMyAdmin 
- **Deployment**: (isi nanti misalnya 000webhost / InfinityFree / Netlify + API)  

---

## Features
- **User (Penghuni Kost)**
  - Registrasi & login  
  - Melihat daftar kamar  
  - Melakukan pemesanan kamar  
  - Melihat riwayat pembayaran  
  - Edit profil

- **Admin**
  - CRUD data kamar (tambah, edit, hapus)  
  - CRUD data penghuni  
  - CRUD data admin
  - Mengelola transaksi pembayaran  
  - Dashboard laporan  

---

## Setup Instructions
1. Clone repository:  
   ```bash
   git clone https://github.com/nonilisurante-hash/kosmokost.git

2. Import database:
   - Buka phpMyAdmin
   - Buat database baru, misalnya kosmokost
   - Import file kosmokost.sql yang ada di folder project

3. Jalankan project menggunakan XAMPP:
   - Simpan folder project di htdocs
   - Jalankan Apache & MySQL di XAMPP
   - Akses aplikasi melalui browser: http://localhost/kosmokost

4. Login dengan akun default (opsional):
   - Admin → username: admin | password: admin
   - User → buat akun baru melalui halaman registrasi

---

## AI Support Explanation
Selama pengembangan aplikasi, IBM Granite AI digunakan sebagai asisten dalam:
 - Membuat template kode CRUD PHP & MySQL.
 - Memberikan contoh validasi form input & struktur database.
 - Memberikan ide perbaikan UI menggunakan Bootstrap.

AI tidak digunakan dalam produk akhir, hanya sebagai pendukung saat coding dan dokumentasi.
