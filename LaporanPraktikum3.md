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

<img src = img/prak2_no1.png>

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

<img src = img/prak2.2_no4a.png>

<img src = img/prak2.2_no4b.png>

<img src = img/prak2.2_no4c.png>

<img src = img/prak2.2_no4d.png>

<img src = img/prak2.2_no4e.png>

<img src = img/prak2.2_no4f.png>

<img src = img/prak2.2_no4g.png>

<img src = img/prak2.2_no4h.png>

<img src = img/prak2.2_no4i.png>

<img src = img/prak2.2_no4j.png>

<img src = img/prak2.2_no4k.png>

<img src = img/prak2.2_no4l.png>

5. Jika semua file migrasi sudah di buat dan dijalankan maka bisa kita lihat tampilan
designer pada phpMyAdmin seperti berikut

<img src = img/prak2.2_no5.png>

### **C. SEEDER**:
### **Praktikum 3 – Membuat file seeder**:

1. Kita akan membuat file seeder untuk table m_level dengan mengetikkan perintah