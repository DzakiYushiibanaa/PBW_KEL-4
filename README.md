# PBW_KEL-4

## Anggota Kelompok 4 :
Nama & NPM:  
* Jati Rahmatulloh    - 4522210039
* Reno Fatullah Rifai - 4522210021
* Dzaki Yushiibanaa   - 4522210041

## Tugas :
Membangun Aplikasi Manajemen Perpustakaan Digital dengan Pendekatan OOP, PDO, dan MVC 
Fitur:
* pengelolaan koleksi buku
* manajemen pengguna
* peminjaman buku

1. Buat diagram use-case
- Manajemen buku: tambah, edit, hapus, dan cari buku
- Manajemen user: admin dan user biasa
- Peminjaman dan pengembalian buku: proses pinjam, pengecekan status buku, dan pengembalian
- Pelaporan: laporan buku yang paling banyak dipinjam, buku yang overdue (terlambat), dan total peminjaman
2. Buatkan ERD
3. Rancang Class Buku, Pengguna, dan Peminjaman
4. Koneksi dengan PDO
5. Implementasi dengan MVC
6. Testing
7. Dokumentasi (Google Drive)
8. Unggah ke Github
  
## Pendahuluan
Dalam era digital yang semakin berkembang, perpustakaan sebagai pusat informasi dan pengetahuan tidak lagi terbatas pada ruang fisik. Transformasi digital telah mengubah cara pengelolaan dan penyediaan layanan perpustakaan dengan lebih efisien dan aksesibel. Salah satu inovasi yang mendukung hal ini adalah pengembangan aplikasi manajemen perpustakaan digital yang memungkinkan pengguna untuk mengakses, meminjam, dan mengembalikan buku secara daring. Selain itu, aplikasi ini membantu pengelola perpustakaan dalam mengelola koleksi buku, manajemen pengguna, serta pelaporan aktivitas perpustakaan.

Dengan memanfaatkan teknologi seperti Object-Oriented Programming (OOP), PHP Data Objects (PDO), dan arsitektur Model-View-Controller (MVC), pengembangan aplikasi perpustakaan digital ini bertujuan untuk menyediakan solusi manajemen yang efisien dan terstruktur. OOP memungkinkan pengembangan aplikasi yang modular dan mudah di-maintain dengan cara mengorganisir kode dalam bentuk objek yang merepresentasikan data serta fungsionalitas. Sementara itu, PDO menyediakan koneksi database yang aman, fleksibel, dan mendukung berbagai jenis database dengan fitur prepared statement yang meningkatkan keamanan terhadap serangan injeksi SQL. Arsitektur MVC digunakan untuk memisahkan logika bisnis dari tampilan, yang membuat aplikasi lebih mudah untuk dikembangkan, dipelihara, dan diuji.

## Usecase
![Usecase](https://github.com/DzakiYushiibanaa/PBW_KEL-4/blob/10101106c67d209614d0a3483e3d01f669cc4aa0/Image%20PBW/usecase%20pbw.png)
### Aktor:
- Pengguna: Mewakili pengguna biasa sistem perpustakaan
- Admin: Mewakili administrator dengan hak akses lebih banyak

### Manajemen Buku:
- Tambah Buku (Hanya Admin)
- Edit Buku (Hanya Admin)
- Hapus Buku (Hanya Admin)
- Cari Buku (Pengguna dan Admin)

### Manajemen Pengguna:
- Login (Pengguna dan Admin)

### Manajemen Peminjaman:
- Pinjam Buku (Pengguna dan Admin)
- Cek Status Buku (Pengguna dan Admin)
- Kembalikan Buku (Pengguna dan Admin)

### Pelaporan:
- Laporan Buku Terpopuler (Hanya Admin)
- Laporan Buku Terlambat (Hanya Admin)
- Laporan Total Peminjaman (Hanya Admin)

## ERD
![ERD](https://github.com/DzakiYushiibanaa/PBW_KEL-4/blob/dafbf406cdc9ab5f0900dae16188d62efdb95874/Image%20PBW/ERD.jpeg)
### Entitas dan Atribut

#### a. Buku
Entitas Buku merepresentasikan koleksi buku yang tersedia dalam perpustakaan digital.
#### Atribut:
- id_buku (INT, PK): Identifier unik untuk setiap buku.
- judul (VARCHAR): Judul buku.
- penulis (VARCHAR): Nama penulis buku.
- penerbit (VARCHAR): Penerbit buku.
- tahun_terbit (INT): Tahun terbit buku.
- status (ENUM): Status buku, yang dapat berupa 'tersedia' atau 'dipinjam'.

#### b. User
Entitas User menggambarkan pengguna sistem, baik itu admin maupun pengguna biasa.
#### Atribut:
- id_user (INT, PK): Identifier unik untuk setiap pengguna.
- nama (VARCHAR): Nama pengguna.
- email (VARCHAR): Alamat email pengguna.
- password (VARCHAR): Kata sandi untuk autentikasi.
- role (ENUM): Peran pengguna, yang dapat berupa 'admin' atau 'user'.

#### c. Peminjaman
Entitas Peminjaman mencatat transaksi peminjaman buku oleh pengguna.
#### Atribut:
- id_peminjaman (INT, PK): Identifier unik untuk setiap transaksi peminjaman.
- tanggal_pinjam (DATE): Tanggal peminjaman buku.
- tanggal_kembali (DATE): Tanggal pengembalian buku yang diharapkan.
- status (ENUM): Status peminjaman, seperti 'dipinjam', 'dikembalikan', atau 'overdue'.
  
#### d. Detail Peminjaman
Entitas Detail Peminjaman menghubungkan entitas Peminjaman dengan Buku, mencatat buku-buku yang dipinjam dalam setiap transaksi.
#### Atribut:
- id_detail (INT, PK): Identifier unik untuk setiap detail peminjaman.
- id_peminjaman (INT, FK): Foreign Key yang merujuk ke id_peminjaman di entitas Peminjaman.
- id_buku (INT, FK): Foreign Key yang merujuk ke id_buku di entitas Buku.

#### e. Laporan
Entitas Laporan menyimpan data terkait laporan yang dihasilkan oleh sistem, seperti laporan buku paling banyak dipinjam, buku yang overdue, dan total peminjaman.
#### Atribut:
- id_laporan (INT, PK): Identifier unik untuk setiap laporan.
- jenis_laporan (ENUM): Jenis laporan, seperti 'buku terbanyak dipinjam', 'buku overdue', atau 'total peminjaman'.
- tanggal_laporan (DATE): Tanggal laporan dibuat.
- keterangan (VARCHAR): Deskripsi atau keterangan tambahan mengenai laporan.

### Hubungan Antar Entitas
#### a. User ke Peminjaman
Jenis Hubungan: One-to-Many (Satu ke Banyak)
#### Penjelasan:
Satu User dapat melakukan banyak Peminjaman. Misalnya, seorang pengguna dapat meminjam beberapa buku dalam periode waktu yang berbeda.
Setiap Peminjaman hanya dilakukan oleh satu User.

#### b. Peminjaman ke Detail Peminjaman
Jenis Hubungan: One-to-Many (Satu ke Banyak)
#### Penjelasan:
Satu Peminjaman dapat memiliki banyak Detail Peminjaman. Ini memungkinkan satu transaksi peminjaman untuk mencakup beberapa buku.
Setiap Detail Peminjaman hanya terkait dengan satu Peminjaman.

#### c. Detail Peminjaman ke Buku
Jenis Hubungan: Many-to-One (Banyak ke Satu)
#### Penjelasan:
Banyak Detail Peminjaman dapat terkait dengan satu Buku. Hal ini memungkinkan buku yang sama untuk dipinjam oleh banyak pengguna pada waktu yang berbeda.
Setiap Detail Peminjaman hanya terkait dengan satu Buku.

#### d. Peminjaman ke Laporan
Jenis Hubungan: One-to-Many (Satu ke Banyak)
#### Penjelasan:
Satu Peminjaman dapat menghasilkan banyak Laporan. Misalnya, satu peminjaman dapat berkontribusi pada berbagai laporan seperti buku overdue atau total peminjaman harian.
Setiap Laporan terkait dengan satu Peminjaman.


## Class Diagram
![ClassDiagram](https://github.com/DzakiYushiibanaa/PBW_KEL-4/blob/6ea93a6b35a44a801baed0e4ef56174c5b4fac10/Image%20PBW/class%20diagram%20(perpusweb).png)
#### Class diagram ini menggambarkan struktur kelas dan hubungan antar kelas dalam aplikasi manajemen perpustakaan digital. Diagram ini menggunakan pendekatan Object-Oriented Programming (OOP) dengan desain berbasis Model-View-Controller (MVC). Terdapat tiga kelas utama yang merepresentasikan entitas utama dalam sistem: Buku, Pengguna, dan Peminjaman. Berikut adalah penjelasan detail mengenai masing-masing kelas dan relasinya:
#### 1. Kelas Buku
#### Atribut:
- id_buku: Nomor unik untuk identifikasi setiap buku.
- judul: Judul buku.
- penulis: Nama penulis buku.
- penerbit: Nama penerbit buku.
- tahun_terbit: Tahun terbit buku.
- status: Status buku, seperti tersedia atau dipinjam.

#### Metode:
- tambahBuku(): Untuk menambahkan buku baru ke dalam koleksi.
- editBuku(): Untuk mengedit informasi buku yang ada.
- hapusBuku(): Untuk menghapus buku dari sistem.
- cariBuku(): Untuk mencari buku berdasarkan kriteria tertentu.
- Kelas Buku bertanggung jawab mengelola data dan operasi terkait koleksi buku di perpustakaan. Fitur-fitur seperti menambah, mengedit, menghapus, dan mencari buku dikelola oleh metode-metode dalam kelas ini.

#### 2. Kelas Pengguna
#### Atribut:
- id_user: Nomor unik untuk identifikasi pengguna.
- nama: Nama lengkap pengguna.
- email: Alamat email pengguna.
- password: Kata sandi pengguna untuk login.
- role: Peran pengguna, bisa berupa "admin" atau "user" biasa.

#### Metode:
- tambahPengguna(): Untuk menambahkan pengguna baru.
- editPengguna(): Untuk mengedit informasi pengguna.
- hapusPengguna(): Untuk menghapus pengguna dari sistem.
- Kelas Pengguna digunakan untuk mengelola data dan operasi yang terkait dengan pengguna aplikasi. Pengguna dapat memiliki peran sebagai admin, yang memiliki hak untuk mengelola data, atau sebagai user biasa yang dapat meminjam buku.

#### 3. Kelas Peminjaman
#### Atribut:
- id_peminjaman: Nomor unik untuk identifikasi peminjaman.
- id_buku: Nomor unik buku yang dipinjam.
- id_user: Nomor unik pengguna yang meminjam buku.
- tanggal_pinjam: Tanggal peminjaman buku.
- tanggal_kembali: Tanggal pengembalian buku.
- status: Status peminjaman (dipinjam/dikembalikan).

#### Metode:
- pinjamBuku(): Untuk memproses peminjaman buku.
- kembalikanBuku(): Untuk memproses pengembalian buku.
- cekStatusBuku(): Untuk mengecek status buku, apakah tersedia atau sedang dipinjam.
- Kelas Peminjaman berfungsi untuk menangani alur proses peminjaman dan pengembalian buku. Selain itu, kelas ini juga dapat mengecek status buku apakah masih tersedia atau sedang dipinjam.
- Relasi Antar Kelas
- Pengguna dan Peminjaman: Satu pengguna dapat melakukan banyak peminjaman, tetapi satu peminjaman hanya dilakukan oleh satu pengguna. Relasi ini direpresentasikan sebagai one-to-many (1 ke banyak).
- Buku dan Peminjaman: Satu buku bisa dipinjam berkali-kali, namun setiap peminjaman hanya berhubungan dengan satu buku. Relasi ini juga digambarkan sebagai one-to-many (1 ke banyak).

## Koneksi dengan PDO & Implementasi dengan MVC
![PDO & VMC](https://github.com/DzakiYushiibanaa/PBW_KEL-4/blob/8e216b214a2b15cb4104476812c32603149726b1/Image%20PBW/implemen.png)

## Testing
