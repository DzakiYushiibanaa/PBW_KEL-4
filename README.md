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




