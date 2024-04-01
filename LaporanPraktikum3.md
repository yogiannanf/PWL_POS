# **Laporan Praktikum Jobsheet 03 MIGRATION, SEEDER, DB FAÇADE, QUERY BUILDER, dan ELOQUENT ORM**
---

## Nama  : Yogianna Nur Febrianti
## Kelas : TI 2F
## Absen : 27

### **A. PENGATURAN DATABASE**:
### **Praktikum 1-pengaturan database**:

1. Buka aplikasi phpMyAdmin, dan buat database baru dengan nama PWL_POS

<img src = img/prak1_no1a.png>

<img src = img/prak1_no1b.png>

2. Buka aplikasi VSCode dan buka folder project PWL_POS yang sudah kita buat

<img src = img/prak1_no2.png>

<img src = img/prak1_2b.png>

3. Copy file .env.example menjadi .env

4. Buka file .env, dan pastikan konfigurasi APP_KEY bernilai. Jika belum bernilai silahkan kalian generate menggunakan php artisan.

5. Edit file .env dan sesuaikan dengan database yang telah dibuat

<img src = img/prak1_no5.png>

6. Laporkan hasil Praktikum-1 ini dan commit perubahan pada git

<img src = img/prak1_no6.png>

### **B. MIGRATION**:
### **Praktikum Praktikum 2.1 - Pembuatan file migrasi tanpa relasi**:

1. Buka terminal VSCode kalian, untuk yang di kotak merah adalah default dari laravel

2. Kita abaikan dulu yang di kotak merah (jangan di hapus)

3. Kita buat file migrasi untuk table m_level dengan perintah

<img src = img/prak2_no3a.png>

<img src = img/prak2_no3b.png>

4. Kita perhatikan bagian yang di kotak merah, bagian tersebut yang akan kita modifikasi
sesuai desain database yang sudah ada

<img src = img/prak2_no4.png>

5. Simpan kode pada tahapan 4 tersebut, kemudian jalankan perintah ini pada terminal
VSCode untuk melakukan migrasi 

<img src = img/prak2_5.png>

6. Kemudian kita cek di phpMyAdmin apakah table sudah ter-generate atau belum

<img src = img/prak2_no6.png>

7. Ok, table sudah dibuat di database

8. Buat table database dengan migration untuk table m_kategori yang sama-sama tidak
memiliki foreign key

<img src = img/prak2_8a.png>

<img src = img/prak2_no8b.png>

9. Laporkan hasil Praktikum-2.1 ini dan commit perubahan pada git.

### **Praktikum Praktikum 2.2 - Pembuatan file migrasi dengan relasi**:

1. Buka terminal VSCode kalian, dan buat file migrasi untuk table m_user

<img src = img/prak3_no1.png>

2. Buka file migrasi untuk table m_user, dan modifikasi seperti berikut

<img src = img/prak3_no2.png>

3. Simpan kode program Langkah 2, dan jalankan perintah php artisan migrate. Amati
apa yang terjadi pada database.

4. Buat table database dengan migration untuk table-tabel yang memiliki foreign key

| m_barang |
|---|
| t_penjualan |
| t_stok |
| t_penjualan_detail |

- Create m_barang

<img src = img/prak2.2_no4a.png>

<img src = img/prak2.2_no4b.png>

<img src = img/prak2.2_no4c.png>

- Create t_penjualan

<img src = img/prak2.2_no4d.png>

<img src = img/prak2.2_no4e.png>

<img src = img/prak2.2_no4f.png>

- Create t_stok

<img src = img/prak2.2_no4g.png>

<img src = img/prak2.2_no4h.png>

<img src = img/prak2.2_no4i.png>

- Create t_penjualan_diskon

<img src = img/prak2.2_no4j.png>

<img src = img/prak2.2_no4k.png>

<img src = img/prak2.2_no4l.png>

5. Jika semua file migrasi sudah di buat dan dijalankan maka bisa kita lihat tampilan
designer pada phpMyAdmin seperti berikut

<img src = img/prak2.2_no5.png>

### **C. SEEDER**:
### **Praktikum 3 – Membuat file seeder**:

1. Kita akan membuat file seeder untuk table m_level dengan mengetikkan perintah

<img src = img/prak3.1_no1.png>

2. Selanjutnya, untuk memasukkan data awal, kita modifikasi file tersebut di dalam
function run()

<img src = img/prak3.1_no2.png>

3. Selanjutnya, kita jalankan file seeder untuk table m_level pada terminal

<img src = img/prak3.1_no3.png>

4. Ketika seeder berhasil dijalankan maka akan tampil data pada table m_level

<img src = img/prak3.1_no4.png>

5. Sekarang kita buat file seeder untuk table m_user yang me-refer ke table m_level

<img src = img/prak3.1_no5.png>

6. Modifikasi file class UserSeeder seperti berikut 

<img src = img/prak3.1_no6.png>

7. Jalankan perintah untuk mengeksekusi class UserSeeder

<img src = img/prak3.1_no7.png>

8. Perhatikan hasil seeder pada table m_user

<img src = img/prak3.1_no8.png>

9. Ok, data seeder berhasil di masukkan ke database.

10. Sekarang coba kalian masukkan data seeder untuk table yang lain, dengan ketentuan seperti berikut

| No | Nama Tabel | Jumlah Data | Keterangan |
|---| --- | ---| ---|
| 1 | m_kategori | 5 | 5 kategori barang |
| 2 | m_barang | 10 | 10 barang yang berbeda |
| 3 | t_stok | 10 | Stok untuk 10 barang |
| 4 | t_penjualan | 10 | 10 transaksi penjualan |
| 5 | t_penjualan_detail | 30 | 3 barang untuk setiap transaksi penjualan |

- Insert tabel m_kategori

<img src = img/prak3.1_no10a.png>

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'YN001',
                'kategori_nama' => 'Furniture ruang tamu',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'YN002',
                'kategori_nama' => 'Furniture kamar tidur',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'YN003',
                'kategori_nama' => 'Furniture ruang makan',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'YN004',
                'kategori_nama' => 'Furniture dapur',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'YN005',
                'kategori_nama' => 'Furniture ruang kerja',
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
```
<img src = img/prak3.1_no10b.png>

- Insert tabel m_barang

<img src = img/prak3.1_no10c.png>

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => '011',
                'barang_nama' => 'Sofa',
                'harga_beli' => 1000000,
                'harga_jual' => 2500000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => '012',
                'barang_nama' => 'Hiasan Dinding',
                'harga_beli' => 600000,
                'harga_jual' => 1000000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => '021',
                'barang_nama' => 'Kasur',
                'harga_beli' => 1500000,
                'harga_jual' => 2000000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => '022',
                'barang_nama' => 'Lemari',
                'harga_beli' => 3000000,
                'harga_jual' => 5000000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => '031',
                'barang_nama' => 'Piring',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => '032',
                'barang_nama' => 'Gelas',
                'harga_beli' => 100000,
                'harga_jual' => 155000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => '041',
                'barang_nama' => 'Kompor Elektric',
                'harga_beli' => 800000,
                'harga_jual' => 1500000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => '042',
                'barang_nama' => 'Wastafel',
                'harga_beli' => 300000,
                'harga_jual' => 700000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => '051',
                'barang_nama' => 'Meja',
                'harga_beli' => 800000,
                'harga_jual' => 1050000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => '052',
                'barang_nama' => 'Lampu',
                'harga_beli' => 500000,
                'harga_jual' => 700000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
```
<img src = img/prak3.1_no10d.png>

<img src = img/prak3.1_no10f.png>

- Insert tabel t_stok

<img src = img/prak3.1_no10g.png>

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 111,
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 25,
            ],
            [
                'stok_id' => 112,
                'barang_kode' => 2,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 30,
            ],
            [
                'stok_id' => 113,
                'barang_kode' => 3,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 17,
            ],
            [
                'stok_id' => 114,
                'barang_kode' => 4,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 30,
            ],[
                'stok_id' => 115,
                'barang_kode' => 5,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 32,
            ],
            [
                'stok_id' => 116,
                'barang_kode' => 6,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 18,
            ],
            [
                'stok_id' => 117,
                'barang_kode' => 7,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 19,
            ],
            [
                'stok_id' => 118,
                'barang_kode' => 8,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 15,
            ],
            [
                'stok_id' => 119,
                'barang_kode' => 9,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 30,
            ],
            [
                'stok_id' => 121,
                'barang_kode' => 10,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-25',
                'stok_jumlah' => 35,
            ],
        ];
        DB::table('t_stok')->insert($data);
    }
}
```

<img src = img/prak3.1_no10h.png>

<img src = img/prak3.1_no10i.png>

- Insert tabel t_penjualan 

<img src = img/prak3.1_no10j.png>

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 101,
                'user_id' => 2,
                'pembeli' => 'Yogianna Nur',
                'penjualan_kode' => '01',
                'penjualan_tanggal' => '2024-02-25',
            ],
            [
                'penjualan_id' => 102,
                'user_id' => 3,
                'pembeli' => 'Masitha',
                'penjualan_kode' => '02',
                'penjualan_tanggal' => '2024-02-26',
            ],
            [
                'penjualan_id' => 103,
                'user_id' => 1,
                'pembeli' => 'Azzhra',
                'penjualan_kode' => '03',
                'penjualan_tanggal' => '2024-02-27',
            ],
            [
                'penjualan_id' => 104,
                'user_id' => 1,
                'pembeli' => 'Naruto',
                'penjualan_kode' => '04',
                'penjualan_tanggal' => '2024-02-28',
            ],
            [
                'penjualan_id' => 105,
                'user_id' => 2,
                'pembeli' => 'Chintia',
                'penjualan_kode' => '05',
                'penjualan_tanggal' => '2024-03-01',
            ],
            [
                'penjualan_id' => 106,
                'user_id' => 3,
                'pembeli' => 'Aprilia',
                'penjualan_kode' => '06',
                'penjualan_tanggal' => '2024-03-02',
            ],
            [
                'penjualan_id' => 107,
                'user_id' => 1,
                'pembeli' => 'Mail',
                'penjualan_kode' => '07',
                'penjualan_tanggal' => '2024-03-03',
            ],
            [
                'penjualan_id' => 108, 
                'user_id' => 2,
                'pembeli' => 'Budi',
                'penjualan_kode' => '08',
                'penjualan_tanggal' => '2024-03-04',
            ],
            [
                'penjualan_id' => 109,
                'user_id' => 3,
                'pembeli' => 'Ratnasari',
                'penjualan_kode' => '09',
                'penjualan_tanggal' => '2024-03-05',
            ],
            [
                'penjualan_id' => 110,
                'user_id' => 1,
                'pembeli' => 'Surya',
                'penjualan_kode' => '10',
                'penjualan_tanggal' => '2024-03-06',
            ],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
```

<img src = img/prak3.1_no10k.png>

<img src = img/prak3.1_no10l.png>

- Insert tabel t_penjualan_detail

<img src = img/prak3.1_no10m.png>

```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Penjualan_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'detail_id' => 1,
                'penjualan_id' => 101,
                'barang_id' => 1,
                'harga' => 7500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 2,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 1000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 3,
                'penjualan_id' => 103,
                'barang_id' => 3,
                'harga' => 6000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 4,
                'penjualan_id' => 104,
                'barang_id' => 4,
                'harga' => 15000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 5,
                'penjualan_id' => 105,
                'barang_id' => 5,
                'harga' => 450000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 6,
                'penjualan_id' => 106,
                'barang_id' => 6,
                'harga' => 465000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 7,
                'penjualan_id' => 107,
                'barang_id' => 7,
                'harga' => 4500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 8,
                'penjualan_id' => 108,
                'barang_id' => 8,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 9,
                'penjualan_id' => 109,
                'barang_id' => 9,
                'harga' => 4200000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 10,
                'penjualan_id' => 110,
                'barang_id' => 10,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 11,
                'penjualan_id' => 110,
                'barang_id' => 10,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 12,
                'penjualan_id' => 109,
                'barang_id' => 9,
                'harga' => 4200000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 13,
                'penjualan_id' => 108,
                'barang_id' => 8,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 14,
                'penjualan_id' => 107,
                'barang_id' => 7,
                'harga' => 4500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 15,
                'penjualan_id' => 106,
                'barang_id' => 6,
                'harga' => 465000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 16,
                'penjualan_id' => 105,
                'barang_id' => 5,
                'harga' =>  450000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 17,
                'penjualan_id' => 104,
                'barang_id' => 4,
                'harga' => 15000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 18,
                'penjualan_id' => 103,
                'barang_id' => 3,
                'harga' => 6000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 19,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 1000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 20,
                'penjualan_id' => 101,
                'barang_id' => 1,
                'harga' => 7500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 21,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 7500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 22,
                'penjualan_id' => 102,
                'barang_id' => 2,
                'harga' => 1000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 23,
                'penjualan_id' => 103,
                'barang_id' => 3,
                'harga' => 6000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 24,
                'penjualan_id' => 106,
                'barang_id' => 4,
                'harga' => 15000000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 25,
                'penjualan_id' => 105,
                'barang_id' => 5,
                'harga' => 450000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 26,
                'penjualan_id' => 106,
                'barang_id' => 6,
                'harga' => 465000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 27,
                'penjualan_id' => 107,
                'barang_id' => 7,
                'harga' => 4500000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 28,
                'penjualan_id' => 108,
                'barang_id' => 8,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 29,
                'penjualan_id' => 109,
                'barang_id' => 9,
                'harga' => 4200000,
                'jumlah' => 3,
            ],
            [
                'detail_id' => 30,
                'penjualan_id' => 110,
                'barang_id' => 10,
                'harga' => 2100000,
                'jumlah' => 3,
            ],
        ];
        DB::table('t_penjualan_detail')->insert($data);
    }
}
```

<img src = img/prak3.1_no10n.png>


### **D. DB FACADE**:
### **Praktikum 4 – Implementasi DB Facade**:

1. Kita buat controller dahulu untuk mengelola data pada table m_level

<img src = img/prak4_no1.png>

2. Kita modifikasi dulu untuk routing-nya, ada di PWL_POS/routes/web.php

```php
<?php

use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
```

3. Selanjutnya, kita modifikasi file LevelController untuk menambahkan 1 data ke table m_level

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)',['CUS', 'Pelanggan', now()]);
        return 'Insert data baru berhasil';
    }
};
```

4. Browser dengan url localhost/PWL_POS/public/level dan amati apa yang terjadi pada table m_level di database

5. Selanjutnya, kita modifikasi lagi file LevelController untuk meng-update data di table m_level seperti berikut

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        
        $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        return 'Update data berhasil. Jumlah data yang diupdate: '.$row.' baris';
    }
};
```

<img src = img/prak4_no5a.png>

6. Jalankan di browser dengan url localhost/PWL_POS/public/level lagi dan amati apa yang terjadi pada table m_level di database, screenshot perubahan yang ada pada table m_level

<img src = img/prak4_no6a.png>

<img src = img/prak4_no6b.png>

<img src = img/prak4_no6c.png>

<img src = img/prak4_no6d.png>

<img src = img/prak4_no6e.png>

7. Kita coba modifikasi lagi file LevelController untuk melakukan proses hapus data

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {

        $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        return 'Delete date berhasil. Jumlah data yang dihapus: '. $row.' baris';

    }
};
```

<img src = img/prak4_no7a.png>

<img src = img/prak4_no7b.png>

<img src = img/prak4_no7c.png>

8. Method terakhir yang kita coba adalah untuk menampilkan data yang ada di table m_level. Kita modifikasi file LevelController seperti berikut

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index()
    {
        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }
}
```

<img src = img/prak4_no8a.png>

9. Coba kita perhatikan kode yang diberi tanda kotak merah, berhubung kode tersebut memanggil view(‘level’), maka kita buat file view pada VSCode di PWL_POS/resources/view/level.blade.php

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Data Level Pengguna</title>
    </head>
    <body>
        <h1>Data Level Pengguna</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Kode Level</th>
                <th>Nama Level</th>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->level_id }}</td>
                <td>{{ $d->level_kode }}</td>
                <td>{{ $d->level_nama }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
```

<img src = img/prak4_no9a.png>

<img src = img/prak4_no9b.png>

### **E. QUERY BUILDER**:
### **Praktikum 5 – Implementasi Query Builder**:

1. Kita buat controller dahuku untuk mengelola data pada table m_kategori

<img src = img/prak5_no1.png>

2. Kita modifikasi dulu untuk routing-nya, ada di PWL_POS/routes/web.php 

```php
<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);
```

3. Selanjutnya, kita modifikasi file KategoriController untuk menambahkan 1 data ke table m_kategori

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
         $data = [
             'kategori_kode' => 'SNK',
             'kategori_nama' => 'Snack/Makanan Ringan',
             'created_at' => now()
        ];
        DB::table('m_kategori')->insert($data);
        return 'insert data baru berhasil';

    }
}
```

4. Kita coba jalankan di browser dengan url localhost/PWL_POS/public/kategori dan amati apa yang terjadi pada table m_kategori di database, screenshot perubahan yang
ada pada table m_kategori

<img src = img/prak5_no4.png>

5. Selanjutnya, kita modifikasi lagi file KategoriController untuk meng-update data di
table m_kategori seperti berikut

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama'=>'Camilan']);
        return 'Update data berhasil. Jumlah data yang diupdate: ' .$row.' baris';
    }
}
```

6. Kita coba jalankan di browser dengan url localhost/PWL_POS/public/kategori lagi dan amati apa yang terjadi pada table m_kategori di database, screenshot perubahan
yang ada pada table m_kategori

<img src = img/prak5_no6.png>

7. Kita coba modifikasi lagi file KategoriController untuk melakukan proses hapus data

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete(['kategori_nama'=>'Camilan']);
        return 'Delete data berhasil. Jumlah data yang diupdate: ' .$row.' baris';
    }
}
```

8. Method terakhir yang kita coba adalah untuk menampilkan data yang ada di table m_kategori. Kita modifikasi file KategoriController seperti berikut

```php 
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}
```

9. Coba kita perhatikan kode yang diberi tanda kotak merah, berhubung kode tersebut memanggil view(‘kategori’), maka kita buat file view pada VSCode di PWL_POS/resources/view/kategori.blade.php

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Data Kategori Barang</title>
    </head>
    <body>
        <h1>Data Kategori Barang</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->kategori_id }}</td>
                <td>{{ $d->kategori_kode }}</td>
                <td>{{ $d->kategori_nama }}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
```

10. Silahkan dicoba pada browser dan amati apa yang terjadi.

<img src = img/prak5_no10.png>

### **F. ELOQUENT ORM**:
### **Praktikum 6 – Implementasi Eloquent ORM**:

1. Kita buat file model untuk tabel m_user dengan mengetikkan perintah

<img src = img/prak6_no1.png>

2. Setelah berhasil generate model, terdapat 2 file pada folder model yaitu file User.php bawaan dari laravel dan file UserModel.php yang telah kita buat. Kali ini kita akan
menggunakan file UserModel.php

3. Kita buka file UserModel.php dan modifikasi seperti berikut

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    
    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; //Mendefinisikan primary key dari tabel yang digunakan
}
```

4. Kita modifikasi route web.php untuk mencoba routing ke controller UserController

```php
<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController as ControllersUserController;
use Illuminate\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);

Route::get('/kategori', [KategoriController::class, 'index']);

Route::get('/user', [ControllersUserController::class, 'index']);
```

5. Sekarang, kita buat file controller UserController dan memodifikasinya seperti berikut

```php
<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    //coba akses model UserModel
    $user = UserModel::all();//ambil semua data dari tabel m_user
    return view('user', ['data' => $user]);
    }
}
```
<img src = img/prak6_no5a.png>

6. Kemudian kita buat view user.blade.php

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
        <h1>Data User</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
                <th>Aksi</th>
                {{--<th>Jumlah Pengguna</th>--}}
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td><a href="/user/ubah/{{ $d->user_id }}">Ubah</a> | <a href="/user/ubah/{{ $d->user_id }}">Hapus</a></td>
                {{--<td>{{ $data }}</td>--}}
            </tr>
            @endforeach
        </table>
    </body>
</html>
```

7. Jalankan di browser, catat dan laporkan apa yang terjadi

<img src = img/prak6_no7.png>

8. Setelah itu, kita modifikasi lagi file UserController

```php
<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    // tambah data user dengan Eloquent Model
    $data = [
        'level_id' => 2,
        'username' => 'manager_tiga',
        'nama' => 'Manager 3',
        'password' => Hash::make('12345')
    ];
    UserModel::insert($data); // tambahkan data ke tabel m_user

    //coba akses model UserModel
    $user = UserModel::all();//ambil semua data dari tabel m_user
    return view('user', ['data' => $user]);
    }
}
```

9. Jalankan di browser, amati dan laporkan apa yang terjadi

<img src = img/prak6_no9.png>

10. Kita modifikasi lagi file UserController menjadi seperti berikut

```php
    class UserController extends Controller
    {
    public function index()
    {
    // tambah data user dengan Eloquent Model
    $data = [
        'nama' => 'Pelanggan Pertama',
    ];
    UserModel::insert($data); // tambahkan data ke tabel m_user

    //coba akses model UserModel
    $user = UserModel::all();//ambil semua data dari tabel m_user
    return view('user', ['data' => $user]);
    }
    }
```

11. Jalankan di browser, amati dan laporkan apa yang terjadi

<img src = img/prak6_no10.png>

### **G. Penutup**:

Jawablah pertanyaan berikut sesuai pemahaman materi di atas
1. Pada Praktikum 1 - Tahap 5, apakah fungsi dari APP_KEY pada file setting .env Laravel?

    Jawab : 

    Dalam Laravel, `APP_KEY` dalam file `.env` berfungsi sebagai kunci enkripsi yang digunakan untuk mengamankan data sensitif dalam aplikasi.

2. Pada Praktikum 1, bagaimana kita men-generate nilai untuk APP_KEY?
    
    Jawab :
    - Pertama dengan mebuka folder PWL_POS
    - Selanjutnya membuka new terminal
    - Dan ketikan peritah ‘php artisan key:generate’ pada terminal yang sudah anda buka
    - Maka secara otomatis akan menghasilkan nilai APP_KEY yang unik dan di atur pada file.env

3. Pada Praktikum 2.1 - Tahap 1, secara default Laravel memiliki berapa file migrasi? dan untuk apa saja file migrasi tersebut?
    
    Jawab :

    a. create_users_table.php: Membuat tabel `users` untuk menyimpan informasi pengguna seperti nama, email, dan kata sandi.

    b. create_password_resets_tokens_table.php: Membuat tabel `password_resets` untuk menyimpan token reset kata sandi yang dikirimkan kepada pengguna yang lupa kata sandi mereka.

    c. create_failed_jobs_table.php: Membuat tabel `failed_jobs` untuk menyimpan informasi tentang pekerjaan yang gagal dieksekusi dalam sistem antrian Laravel. sehingga pengembang dapat menelusuri dan memperbaiki kesalahan tersebut.

    d. create_personal_access_tokens_table.php: Membuat tabel `personal_access_tokens` untuk mengelola token akses pribadi dalam autentikasi API menggunakan Laravel Passport. Tabel ini menyimpan informasi tentang token akses pribadi yang diterbitkan untuk setiap pengguna.

4. Secara default, file migrasi terdapat kode $table->timestamps();, apa tujuan/output dari fungsi tersebut?

    Jawab : 
    
    Fungsi `$table->timestamps()` secara singkat adalah untuk menambahkan dua kolom ke tabel: `created_at` dan `updated_at`.
    - Kolom `created_at` menyimpan waktu rekaman dibuat.
    - Kolom `updated_at` menyimpan waktu rekaman terakhir diperbarui.

5. Pada File Migrasi, terdapat fungsi $table->id(); Tipe data apa yang dihasilkan dari fungsi tersebut?

    Jawab :
    
    Fungsi `$table->id();` dalam file migrasi Laravel menghasilkan kolom dengan tipe data integer yang bertambah secara otomatis (auto-increment), yang bertindak sebagai primary key untuk tabel yang dibuat dengan migrasi tersebut.

6. Apa bedanya hasil migrasi pada table m_level, antara menggunakan $table->id(); dengan menggunakan $table->id('level_id'); ?

    Jawab :
    
    Dengan menggunakan $table->id();, Laravel secara otomatis memberikan nama id, sementara dengan $table->id('level_id');, dapat menentukan nama kolom primary key yaitu level_id.

7. Pada migration, Fungsi ->unique() digunakan untuk apa?

    Jawab :
    
    Digunakan dalam file migrasi Laravel untuk menetapkan bahwa nilai dalam sebuah kolom harus unik di dalam tabel, sehingga mencegah duplikasi data dalam kolom tersebut.

8. Pada Praktikum 2.2 - Tahap 2, kenapa kolom level_id pada tabel m_user
menggunakan $tabel->unsignedBigInteger('level_id'), sedangkan kolom level_id pada tabel m_level menggunakan $tabel->id('level_id') ?

    Jawab :
    
    Kolom `level_id` pada tabel `m_user` menggunakan `$table->unsignedBigInteger('level_id')` karena digunakan untuk kunci asing (foreign key). Sedangkan tabel m_level menggunakan $tabel->id('level_id') untuk primary key.

9. Pada Praktikum 3 - Tahap 6, apa tujuan dari Class Hash? dan apa maksud dari kode program Hash::make('1234');?

    Jawab :
    
    Class `Hash` dalam Laravel digunakan untuk mengacak dan memverifikasi kata sandi pengguna. `Hash::make('1234');` menghasilkan nilai teracak dari string `'1234'` yang dapat digunakan sebagai kata sandi terenkripsi sebelum disimpan dalam database.


10. Pada Praktikum 4 - Tahap 3/5/7, pada query builder terdapat tanda tanya (?), apa kegunaan dari tanda tanya (?) tersebut?

    Jawab :
    
    Tanda tanya ? dalam query builder digunakan untuk menandai tempat di mana nilai parameter akan digunakan saat query dieksekusi.

11. Pada Praktikum 6 - Tahap 3, apa tujuan penulisan kode protected $table = ‘m_user’; dan protected $primaryKey = ‘user_id’; ?
    
    Jawab :
    
    Properti `$table` digunakan untuk menentukan nama tabel terkait dengan model, sedangkan properti `$primaryKey` digunakan untuk menentukan nama kolom primary key dari tabel tersebut. Dengan menentukan properti ini Laravel dapat menghubungkan model dengan tabel yang benar dalam database dengan mudah.

12. Menurut kalian, lebih mudah menggunakan mana dalam melakukan operasi CRUD ke database (DB Façade / Query Builder / Eloquent ORM) ? jelaskan
    
    Jawab : 
    
    Menggunakan DB Façade, karena dalam Laravel lebih mudah karena menyediakan sintaks yang sederhana dan tidak memerlukan penggunaan model. Bisa menulis query SQL secara langsung.