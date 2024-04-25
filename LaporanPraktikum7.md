# **Laporan Praktikum JOBSHEET 07 PWL – LARAVEL STARTER CODE**
---

## Nama  : Yogianna Nur Febrianti
## Kelas : TI 2F
## Absen : 27

### **Praktikum 2 – Penerapan Layouting:**

 <img src = public/img7/A2_no6.png>

### **Praktikum 3 – Implementasi jQuery Datatable di AdminLTE :**

- menu Data User..!!!

<img src = public/img7/D3_no8.png>

- form tambah data user

<img src = public/img7/D3_no12.png>

- user di browser, dan coba untuk mengetikkan id yang salah contoh http://localhost/PWL_POS/public/user/100

<img src = public/img7/D3_no16.png>

- Edit data user di browser

<img src = public/img7/D3_no20.png>

<img src = public/img7/D3_no20.1.png>

- Browser untuk menghapus salah satu data user

<img src = public/img7/D3_no21.png>

### **Praktikum 4 – Implementasi Filtering Datatables :**

- Browser dengan akses menu user

<img src = public/img7/E4_no7.png>

### **PERTANYAAN**

Jawablah pertanyaan berikut sesuai pemahaman materi di atas

1. Apa perbedaan frontend template dengan backend template?

    Jawab :
    
    - Frontend difokuskan untuk desain halaman atau bagaimana menampilkan sebuah informasi yang menarik dengan berbagai elemen yang menyusunnya, biasanya difokuskan untuk halaman seperti homepage. 

    - Backend difokuskan untuk pemetaan data, jadi bagaimana template tersebut bisa digunakan untuk operasi pada data tersebut, biasanya berbentuk dashboard yang menampilkan seluruh rangkuman data.

2. Apakah layouting itu penting dalam membangun sebuah website?

    Jawab :

    Ya, karena jika menggunakan layouting, ketika kita menggabungan beberapa elemen pada website bisa tertata dengan rapih dan sebagai developer untuk melakukan maintenance pun lebih mudah karena sudah terstruktur.

3. Jelaskan fungsi dari komponen laravel blade berikut : @include(), @extend(), @section(), @push(), @yield(), dan @stack()

    Jawab:

    - @include() : include digunakan untuk memasukkan file blade.php ke dalam satu halaman, sehingga tidak perlu menulis kode program yang banyak cukup dituliskan ke dalam satu file dan gunakan fungsi include agar bisa digunakan pada halaman yang lain.

    - @extends() : digunakan untuk menentukan bahwa suatu halaman menggunakan layout blade tertentu sebagai kerangka dasarnya. Biasanya digunakan untuk menghubungkan antara layout utama dengan halaman-halaman spesifik.

    - @section() : digunakan untuk menampilkan konten yang telah ditentukan area nya pada fungsi @yield. Misalnya, konten bagian header, konten bagian footer, dsb. 

    - @push() : digunakan untuk menambahkan konten ke dalam sebuah stack (tumpukan) yang dapat ditumpuk dan digunakan nanti. Berguna untuk menambahkan kode ke bagian tertentu dari layout tanpa perlu mengubah file yang memperluas layout. 

    - @yield() : digunakan untuk menampilkan konten dari sebuah section yang telah didefinisikan. Digunakan di layout blade untuk menampilkan konten yang ditentukan oleh halaman blade yang memperluas layout. 

    - @stack() : digunakan untuk menampilkan konten yang telah ditambahkan ke dalam sebuah stack. Digunakan di layout blade untuk menampilkan konten yang telah ditambahkan oleh halaman blade yang memperluas layout melalui @push().

4. Apa fungsi dan tujuan dari variable $activeMenu ?

    Jawab:  

    variabel $activeMenu untuk menentukan halaman menu yang sedang aktif.