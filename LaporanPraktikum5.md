# **Laporan Praktikum JOBSHEET 05 Blade View, Web Templating(AdminLTE), Datatables**
---

## Nama  : Yogianna Nur Febrianti
## Kelas : TI 2F
## Absen : 27

### **Praktikum 1 – Integrasi Laravel dengan AdminLte3**:

1. Dalam root folder project lakukan command berikut, untuk mendefinisikan requirement project.

<img src = imgjobsheet5/prak1_no1.png>

2. Melakukan instalasi requirement project di atas dengan command berikut:

<img src = imgjobsheet5/prak1_no2.png>

Perintah diatas akan menginstall :
- AdminLTE distribution files dan dependensinya (Bootstrap, jQuery,
etc.) dalam folder public/vendor
- Konfigurasi package di file config/adminlte.php
- Paket translasi di folder lang/vendor/adminlte/
- Dalam composer.json akan otomatis ditambahkan require untuk laraveladminlte

<img src = imgjobsheet5/prak1_no2a.png>

3. Buat file resources/views/layout/app.blade.php

<img src = imgjobsheet5/prak1_no3.png>

```php
@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

                @hasSection('content_header_subtitle')
                    <small class="text-dark">
                        <i class="fas fa-xs fa-angle-right text-muted"></i>
                        @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
    <a href="{{ config('app.company_url', '#') }}">
        {{ config('app.company_name', 'My company') }}
        </a>
        </strong>
@stop
       
{{-- Add common Javascript/Jquery code --}}
       
@push('js')
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });
    
</script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
<style type="text/css">

    {{-- You can add AdminLTE customizations here --}}
    /*
    .card-header {
    border-bottom: none;
    }
    .card-title {
    font-weight: 600;
    }
    */
</style>
@endpush   
```

4. Edit resources/views/welcome.blade.php, kemudian replace seluruh kodenya dengan kode berikut

```php
@extends('layout.app')

{{-- Customize layput sectioms --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}

@section('content_body')
    <p>Welcome to this beautiful admin panel.</p>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush
```

Untuk menggunakan blade template ini cukup dengan extend AdminLTE layout dengan cara @extends('adminlte::page'). Template yields di beberapa bagian terklasifikasi dalam 2 yield:
• main: Biasa digunakan untuk extending the layout.
• misc: untuk kasus yang tidak biasa, atau hanya situasi tertentu.

5. Kembali ke browser, menuju ke halaman awal.

<img src = imgjobsheet5/prak1_no5.png>

### **Praktikum 2 – Integrasi dengan DataTables**:

### **Praktikum 3 – Membuat form kemudian menyimpan data dalam database**:

### **Tugas Praktikum**:

1. Tambahkan button Add di halam manage kategori, yang mengarah ke create kategori baru

2. Tambahkan menu untuk halaman manage kategori, di daftar menu navbar

3. Tambahkan action edit di datatables dan buat halaman edit serta controllernya

4. Tambahkan action delete di datatables serta controllernya