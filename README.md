# Sistem Operasional Laundry - Kelompok 9

Tugas Pengembangan Aplikasi Website (BBK2DAB3), Studi Kasus 09.
Dibuat dengan **PHP murni (native)** dan MySQL, tanpa framework.

## Modul A: Layanan & Tarif

Pengelolaan jenis layanan laundry beserta tarifnya.

Fitur:
- Tabel data layanan (cuci kiloan, cuci satuan, setrika, dll.)
- Tambah, ubah, dan hapus layanan (form)
- Validasi: nama layanan dan tarif wajib diisi, tarif harus berupa angka lebih dari 0
- RESTful API (JSON)

## Modul B: Mesin & Peralatan

Pengelolaan data mesin cuci, pengering, setrika, dan peralatan pendukung.

Fitur:
- Tabel data mesin dan peralatan
- Tambah, ubah, dan hapus data mesin (form)
- Status mesin: aktif, rusak, atau dalam perawatan
- Validasi: nama mesin dan status wajib diisi
- RESTful API (JSON)

## Modul C: Data Pelanggan

Pengelolaan biodata pelanggan, nomor telepon, dan catatan penanganan khusus pakaian.

Fitur:
- Tabel data pelanggan
- Tambah, ubah, dan hapus pelanggan (form)
- Validasi: nama dan no. telepon wajib diisi, no. telepon tidak boleh kembar
- RESTful API (JSON)

## Modul D: Bahan Pembersih

Pengelolaan stok deterjen, pelembut, pewangi, dan bahan pembersih lainnya.

Fitur:
- Tabel data bahan pembersih dan stok
- Tambah, ubah, dan hapus bahan (form)
- Validasi: nama bahan, satuan, dan stok wajib diisi, stok tidak boleh negatif
- RESTful API (JSON)
## Anggota Kelompok

| Modul | Nama |
|---|---|
| A - Layanan & Tarif | Aura Effel |
| B - Mesin & Peralatan | Delsya Navy |
| C - Data Pelanggan | Nurrahma Kaila Silva Gia |
| D - Bahan Pembersih | Triyanti |

## Kebutuhan

- PHP 8.x
- MySQL / MariaDB (XAMPP atau Laragon)

## Cara Menjalankan

1. Nyalakan MySQL (XAMPP atau Laragon).
2. Import `database.sql` lewat phpMyAdmin atau DBeaver.
   Ini otomatis membuat database `Kelompok_9` dan tabel `pelanggans`.
3. Sesuaikan koneksi di `config/koneksi.php` jika perlu
   (default: host `127.0.0.1`, user `root`, password kosong).
4. Jalankan server dari folder project:
```
   php -S localhost:8000
```
5. Buka `http://localhost:8000/pelanggan/index.php`.

## Struktur Folder

```
Kelompok-9/
├── api/
│   └── pelanggan.php     # RESTful API
├── config/
│   └── koneksi.php       # koneksi database (PDO)
├── pelanggan/
│   ├── index.php         # daftar pelanggan
│   ├── tambah.php        # form tambah
│   ├── edit.php          # form ubah
│   └── hapus.php         # hapus data
└── database.sql          # struktur database
```

## RESTful API

Base URL: `http://localhost:8000/api/pelanggan.php`

| Method | URL | Fungsi |
|---|---|---|
| GET | `/api/pelanggan.php` | Semua pelanggan |
| GET | `/api/pelanggan.php?id=1` | Satu pelanggan |
| POST | `/api/pelanggan.php` | Tambah pelanggan |
| PUT | `/api/pelanggan.php?id=1` | Ubah pelanggan |
| DELETE | `/api/pelanggan.php?id=1` | Hapus pelanggan |

Contoh body (JSON) untuk POST dan PUT:
```json
{
  "nama": "Budi",
  "alamat": "Bandung",
  "no_telepon": "0811111111",
  "catatan_khusus": "Pisahkan baju putih"
}
```

Kode respons: `200` sukses, `201` dibuat, `404` tidak ditemukan,
`409` no. telepon sudah terdaftar, `422` data tidak lengkap.
