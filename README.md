# TP8DPBO2025C - Tugas Praktikum 8 DPBO 2025 (MVC)

## Deskripsi Tugas

1. **Membuat database** berdasarkan konsep yang dibuat
2. **Mengubah arsitektur program** menjadi menggunakan pola **MVC (Model - View - Controller)**
3. **Menambahkan 1–2 tabel baru** yang memiliki relasi dengan tabel awal
4. **Membuat fitur CRUD** lengkap untuk tabel baru tersebut
5. **Diperbolehkan menambahkan atribut baru** ke tabel yang sudah ada jika dibutuhkan

---

## Desain Program

Terdapat tiga entitas dalam sistem:
- **Mahasiswa** (`students`)
- **Kelas** (`classes`)
- **Enrollment** (`enrollments`) – representasi hubungan many-to-many antara mahasiswa dan kelas

Masing-masing entitas diatur melalui:
- **Model**: Untuk koneksi dan manipulasi data
- **View**: Untuk tampilan HTML dinamis
- **Controller**: Untuk mengatur alur logika aplikasi dan permintaan pengguna

Semua halaman menggunakan `index.html` sebagai **template utama** dengan konten yang dimuat secara dinamis menggunakan kelas `Template`, lalu pada add/tambah dan edit/ubah data menggunakan `form.html` sebagai template-nya.

Database bernama `tp_mvc` menggunakan MariaDB.

---

## Penjelasan Alur Program

### Mahasiswa
- Menampilkan daftar mahasiswa
- Tambah mahasiswa baru (form + validasi)
- Edit data mahasiswa
- Hapus mahasiswa
- Menampilkan notifikasi jika operasi berhasil (ditambahkan/diedit)

### Kelas
- Menampilkan daftar kelas
- Tambah kelas baru (form + validasi)
- Edit dan hapus kelas
- Sama seperti mahasiswa, juga menampilkan notifikasi

### Enrollment
- Menampilkan daftar mahasiswa yang terdaftar di kelas tertentu (di group berdasarkan kelas)
- Form tambah pendaftaran mahasiswa ke kelas
- Validasi agar mahasiswa tidak bisa mendaftar ke kelas yang sama dua kali
- Hapus data enrollment / Unenroll

---

## Dokumentasi


https://github.com/user-attachments/assets/22f681d4-ba8d-4401-a3a6-fddd40d270e8


