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
![Usecase](https://github.com/DzakiYushiibanaa/PBW_KEL-4/blob/0fdb4c55753bc3515614a19b01080ce2a141d174/Image%20PBW/Usecase.jpeg)
### Aktor:
- Pengguna: Mewakili pengguna biasa sistem perpustakaan
- Admin: Mewakili administrator dengan hak akses lebih banyak

### Manajemen Buku:
- Tambah Buku (Hanya Admin)
- Edit Buku (Hanya Admin)
- Hapus Buku (Hanya Admin)
- Cari Buku (Pengguna dan Admin)

### Manajemen Pengguna:
- Kelola Pengguna (Hanya Admin)

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
