# **Laporan Praktikum JOBSHEET 04 Model dan Eloquent ORM**
---

## Nama  : Yogianna Nur Febrianti
## Kelas : TI 2F
## Absen : 27

### **A. PROPERTI $fillable DAN $guarded**:
### **Praktikum 1 - $fillable**:

1. Buka file model dengan nama UserModel.php dan tambahkan $fillable seperti gambar di bawah ini

```php
class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     * 
     *  @var array
     */
    //protected $fillable = ['level_id', 'username', 'nama'];

    protected $fillable = ['level_id', 'username', 'nama', 'password'];
}
```

2. Buka file controller dengan nama UserController.php dan ubah script untuk menambahkan data baru seperti gambar di bawah ini

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
    $data = [
        'level_id' => 2,
        'username' => 'manager_dua',
        'nama' => 'Manager 2',
        'password' => Hash::make('12345')
    ];
    UserModel::create($data);

    $user = UserModel::all();
    return view('user', ['data' => $user]);
    }
}
```

3. Simpan kode program Langkah 1 dan 2, dan jalankan perintah web server. Kemudian jalankan link localhostPWL_POS/public/user pada browser dan amati apa yang terjadi

<img src = imgjobsheet4/prak1_no3.png>

4. Ubah file model UserModel.php seperti pada gambar di bawah ini pada bagian $fillable

```php
protected $fillable = ['level_id', 'username', 'nama'];
```

<img src = imgjobsheet4/prak1_no4.png>

5. Ubah kembali file controller UserController.php seperti pada gambar di bawah hanya bagian array pada $data

```php
    public function index()
    {
    $data = [
        'level_id' => 2,
        'username' => 'manager_tiga',
        'nama' => 'Manager 3',
        'password' => Hash::make('12345')
    ];
    UserModel::create($data);

    $user = UserModel::all();
    return view('user', ['data' => $user]);
    }
```
<img src = imgjobsheet4/prak1_no4a.png>

6. Simpan kode program Langkah 4 dan 5. Kemudian jalankan pada browser dan amati apa yang terjadi

    Jawab : 
    - kode program Langkah 4 : mendaftarkan atribut (nama kolom) 'level_id', 'username', 'nama' dan mengalami error karena di database kolom yang diinputkan  'level_id', 'username', 'nama' dan 'password' (field di password) dan kolom tidak mempunyai value.

    - kode program Langkah 5 : mendaftarkan atribut dan value kolomnya 'level_id' => 2, 'username' => 'manager_tiga', 'nama' => 'Manager 3' 'password' => Hash::make('12345') dan hasilnya data user ada penambahan data.

### **B. RETRIEVING SINGLE MODELS**:
### **Praktikum 2.1 – Retrieving Single Models**:

1. Buka file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        //2.1 nomor 1
        $user = UserModel::find(1);
        return view('user', ['data' => $user]);
    }
}
```
        
2. Buka file view dengan nama user.blade.php dan ubah script seperti gambar di bawah ini

```php
<body>
        <h1>Data User</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr>
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
            </tr>
        </table>
    </body>
```

3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan link http://localhost:8000/user pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab :

    kode mengambil data user berdasarkan ID, kode berhasil menampilkan data user dengan ID 1 di browser, dengan nama kolom ID, Username, Nama dan ID Level Pengguna, kode mengambil data user dengan ID 1 dari database menggunakan UserModel::find(1).

    <img src = imgjobsheet4/prak2.1_no3.png>

4. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        //2.1 nomor 4
        $user = UserModel::where('level_id', 1)->first();
        return view('user', ['data' => $user]);
    }
}
```

5. Simpan kode program Langkah 4. Kemudian jalankan link http://localhost:8000/user pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 
    
    Kode ini mengambil data user berdasarkan level pengguna, kode berhasil menampilkan data user pertama dengan level 1 di browser. Kode ini menggunakan first() untuk mengambil data user pertama yang ditemukan.

    <img src = imgjobsheet4/prak2.1_no5.png>

6. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
    $user = UserModel::firstWhere('level_id', 1)
    return view('user', ['data' => $user]);
    }
}
```

7. Simpan kode program Langkah 6. Kemudian jalankan link http://localhost:8000/user pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab :

    Perubahan kode pada langkah 6 tidak menghasilkan perubahan pada output karena kedua metode where('level_id', 1)->first(); dan firstWhere('level_id', 1); menghasilkan output yang sama.

    <img src = imgjobsheet4/prak2.1_no7.png>

8. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::findor(['username', 'nama'], function(){
            abort(404);
        });

        return view('user', ['data' => $user]);
    }
}
```

9. Simpan kode program Langkah 8. Kemudian jalankan link http://localhost:8000/user pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 

    Perubahan kode pada langkah 8 berhasil menampilkan username dan nama admin dan Administrator.

    <img src = imgjobsheet4/prak2.1_no9.png>

10. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        // 2.1 nomor 10
        $user = UserModel::findor(20, ['username', 'nama'], function(){
            abort(404);
        });

        return view('user', ['data' => $user]);
    }
}
```


11. Simpan kode program Langkah 10. Kemudian jalankan link http://localhost:8000/user pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab :

    Perubahan kode pada langkah 8 berhasil menampilkan pesan error 404 jika user ID tidak ditemukan.

    <img src = imgjobsheet4/prak2.1_no11.png>

### **Praktikum 2.2 – Not Found Exceptions**:

1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::findOrFail(1);
        return view('user', ['data' => $user]);
    }
}
```    

2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 

    User dengan ID 1 ada tabel yang berisi data user dengan ID 1, termasuk username, nama, dan level pengguna.

    <img src = imgjobsheet4/prak2.2_nomor2.png>

3. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::where('username', 'manager9')->firstOrFail();
        return view('user', ['data' => $user]);
    }
}
```       

4. Simpan kode program Langkah 3. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab :

    Perubahan kode pada langkah 3 mencari user dengan username "manager9", tetapi karena user dengan username "manager9" tidak ditemukan, Laravel akan secara otomatis menampilkan pesan error "Model not found".

    <img src = imgjobsheet4/prak2.2_no4.png>

### **Praktikum 2.3 – Retreiving Aggregrates**:

1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        user = UserModel::where('level_id', 2)->count();
        dd($user);
        return view('user', ['data' => $user]);
    }
}
```        

2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 

    Terjadi error di app\Http\Controllers\UserController.php line 15 karena terdapat method ’dd()’ yang berfungsi untuk menghentikan eksekusi baris ke 2

    <img src = imgjobsheet4/prak2.3_no2.png>

3. Buat agar jumlah script pada langkah 1 bisa tampil pada halaman browser, sebagai contoh bisa lihat gambar di bawah ini dan ubah script pada file view supaya bisa muncul datanya

    Jawab : 

```php UserControlle
class UserController extends Controller
{
    public function index()
    {
        user = UserModel::where('level_id', 3)->count();
        dd($user);
        return view('user', ['data' => $user]);
    }
}
``` 

``php User.blade.php
<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
        <h1>Data User</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <!-- <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
                <th>Aksi</th> -->
                <th>Jumlah Pengguna</th>
            </tr>
            <tr>
                <!-- <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td> -->
                <td>{{ $data }}</td>
            </tr>
        </table>
    </body>
</html>
```

<img src = imgjobsheet4/prak2.3_no3.png>

### **Praktikum 2.4 – Retreiving or Creating Models**:

1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
    public function index()
    {
        $user = UserModel::firstOrCreate(
            [
                'username' => 'manager',
                'nama' => 'Manager',
            ],
        );

        return view('user', ['data' => $user]);
    }
```

2. Ubah kembali file view dengan nama user.blade.php dan ubah script seperti gambar di bawah ini

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
            </tr>
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
            </tr>
        </table>
    </body>
</html>
```

3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab :

    Kode tersebut menampilkan data pengguna dengan username ‘manager’ dan nama ‘Manager’ beserta atribut yang dipilih. Jika tidak ada pengguna yang ditemukan, pengguna baru akan langsung dibuat dan disimpan ke dalam database.

    <img src = imgjobsheet4/prak2.4_no3.png>

4. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php UserControlle
class UserController extends Controller
{
    public function index()
    {
       $user = UserModel::firstOrCreate(
            [
                'username' => 'manager22',
                'nama' => 'Manager Dua Dua',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
       );
        return view('user', ['data' => $user]);
    }
}
``` 

5. Simpan kode program Langkah 4. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user serta beri penjelasan dalam laporan

    Jawab: 
    
    Perubahan kode pada langkah 4 berhasil 
    - Membuat user baru dengan username "manager22", nama "Manager Dua Dua", password "12345", dan level pengguna 2.
    - Menampilkan data user baru di tabel.
    - Menyimpan data user di database dengan password terenkripsi.

<img src = imgjobsheet4/prak2.4_no5.png>

6. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
         $user = UserModel::firstOrNew(
             [
                 'username' => 'manager',
                 'nama' => 'Manager',
             ],
         );

          return view('user', ['data' => $user]);
    }
}

```

7. Simpan kode program Langkah 6. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab :
    
    Mencari pengguna dengan username pengguna 'manager' dan nama 'Manager' dalam tabel UserModel. Apabila data sudah ada akan ditaruh ke tampilan. Jika tidak ditemukan, objek pengguna baru dibuat, tetapi tidak disimpan secara otomatis ke dalam database.

<img src = imgjobsheet4/prak2.4_no7.png>

8. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah 

```php
class UserController extends Controller
{
public function index()
    {
        $user = UserModel::firstOrCreate(
            [
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );

        return view('user', ['data' => $user]);
    }
}
```

9. Simpan kode program Langkah 8. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user serta beri penjelasan dalam
laporan

    Jawab :
    Hasil yang ditampilkan di browser dan data di tabel m_user pada phpMyAdmin berhasil ditambahkan.

<img src = imgjobsheet4/prak2.4_no11.png>

10. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
public function index()
    {
        $user = UserModel::firstOrCreate(
            [
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user->save();

        return view('user', ['data' => $user]);
    }
}
```

11. Simpan kode program Langkah 9. Kemudian jalankan pada browser dan amati apa yang terjadi dan cek juga pada phpMyAdmin pada tabel m_user serta beri penjelasan dalam
laporan

    Jawab :

    Perubahan kode pada langkah 9 berhasil:
    - Menampilkan data user baru di tabel.
    - Menyimpan data user baru di database, meskipun user tersebut sudah ada.

<img src = imgjobsheet4/prak2.4_no11.png>

### **Praktikum 2.5 – Attribute Changes**:

1. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
        UserModel::create([
                'username' => 'manager44',
                'nama' => 'Manager44',
                'password' => Hash::make('12345'),
                'level_id' => 2
        ]);

        $user->isDirty(); // true
        $user->isDirty('username'); // true
        $user->isDirty('nama'); // false
        $user->isDirty(['nama', 'username']); // true

        $user->isClean(); // false
        $user->isClean('username'); // false
        $user->isClean('nama'); // true
        $user->isClean(['nama', 'username']); // false
        
        $user->save();

        $user->isDirty(); // false
        $user->isClean(); // true
```

2. Simpan kode program Langkah 1. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 

    d($user->isDirty()), kita akan mendapatkan informasi apakah terdapat perubahan yang belum disimpan pada objek $user, yang akan dicetak pada layar

<img src = imgjobsheet4/prak2.5_no2.png>

3. Ubah file controller dengan nama UserController.php dan ubah script seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
      $user = UserModel :: create([
        'username' => 'manager11',
        'nama' => 'Manager11',
        'password' => Hash::make('12345'),
        'level_id' => 2,
    ]);

        $user->username = 'manager12';

        $user->save();

        $user->wasChanged();// true
        $user->wasChanged('username');//true
        $user->wasChanged(['username', 'level_id']);// true
        $user->wasChanged('nama');// false
        dd($user->wasChanged(['nama', 'username'])); // true
    }
}
```

4. Simpan kode program Langkah 3. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 
    
    dd($user->wasChanged(['nama', 'username'])) digunakan untuk memeriksa apakah atribut 'nama' atau 'username' telah diubah sejak model dipanggil atau disimpan terakhir kali. kode ini akan mencetak true jika salah satu dari atribut 'nama' atau 'username' terdapat perubahan apabila model dipanggil atau disimpan terakhir kali. Jika tidak data, maka akan mencetak false.

<img src = imgjobsheet4/prak2.5_no4.png>

### **Praktikum 2.6 – Create, Read, Update, Delete (CRUD)**:

1. Buka file view pada user.blade.php dan buat scritpnya menjadi seperti di bawah ini

```php
<!DOCTYPE html>
<html>
    <head>
        <title>Data User</title>
        <a href="/user/tambah">+ Tambah User</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
                <th>Aksi</th>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td><a href="/user/ubah/{{ $d->user_id }}">Ubah</a> | <a href="/user/ubah/{{ $d->user_id }}">Hapus</a></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
```

2. Buka file controller pada UserController.php dan buat scriptnya untuk read menjadi seperti di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
```

3. Simpan kode program Langkah 1 dan 2. Kemudian jalankan pada browser dan amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 
    - File View user.blade.php
    Data user diulang dengan perulangan @foreach dan ditampilkan di dalam tabel.
    Tautan "Ubah" dan "Hapus" mengarah ke URL /user/ubah/{{ $d->user_id }} dan /user/hapus/{{ $d->user_id }} (belum dibuat).    

    - File Controller UserController.php
    Fungsi index mengambil semua data user dari model UserModel menggunakan all().
    Data user dikembalikan ke view user dengan variabel data.

    Implementasi script berhasil menampilkan data user yang ada di database dalam tabel HTML. Script ini menyediakan dasar untuk menampilkan data user dan memungkinkan pengembangan lebih lanjut untuk melakukan tindakan seperti ubah dan hapus data user.

<img src = imgjobsheet4/prak2.6_no3.png>

4. Langkah berikutnya membuat create atau tambah data user dengan cara bikin file baru pada view dengan nama user_tambah.blade.php dan buat scriptnya menjadi seperti di bawah ini

<img src = imgjobsheet4/prak2.6_no4.png>

```php
    <body>
        <h1>Form Tambah Data User</h1>
        <form method="post" action="tambah_simpan"></form>

        {{ csrf_field() }}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukkan Nama">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password">
        <br>
        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level">
        <br><br>
        <input type="submit" class="btn btn-success" value="Simpan">
    </body>
```

5. Tambahkan script pada routes dengan nama file web.php. Tambahkan seperti gambar di bawah ini

```php
Route::get('user/tambah', [ControllersUserController::class, 'tambah']);
```

6. Tambahkan script pada controller dengan nama file UserController.php. Tambahkan script dalam class dan buat method baru dengan nama tambah dan diletakan di bawah method index seperti gambar di bawah ini

```php
class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }
}
```

7. Simpan kode program Langkah 4 s/d 6. Kemudian jalankan pada browser dan klik link “+ Tambah User” amati apa yang terjadi dan beri penjelasan dalam laporan

<img src = imgjobsheet4/prak2.6_no7.png>

Implementasi script berhasil menampilkan form tambah data user. Script ini menyediakan dasar untuk menambahkan data user baru.

8. Tambahkan script pada routes dengan nama file web.php. Tambahkan seperti gambar di bawah ini

```php
Route::post('/user/tambah_simpan', [ControllersUserController::class, 'tambah_simpan']);
```

9. Tambahkan script pada controller dengan nama file UserController.php. Tambahkan script dalam class dan buat method baru dengan nama tambah_simpan dan diletakan di
bawah method tambah seperti gambar di bawah ini

```php
    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }
```

10. Simpan kode program Langkah 8 dan 9. Kemudian jalankan link localhost:8000/user/tambah atau localhost/PWL_POS/public/user/tambah pada browser dan input formnya dan simpan, kemudian amati apa yang terjadi dan beri penjelasan dalam laporan

    Jawab : 

    - File Controller UserController.php
    Method tambah_simpan ditambahkan untuk:
    Menerima data request dari form.
    Menyimpan data user baru ke database menggunakan UserModel::create.
    Hash password sebelum disimpan.
    Mengalihkan kembali ke halaman user setelah data disimpan.

    - Hasil pada Browser
    Ketika form tambah data user diisi dan tombol "Simpan" diklik, data user baru akan disimpan ke database.
    Pengguna akan dialihkan ke halaman user yang menampilkan daftar user yang telah diperbarui.

<img src = imgjobsheet4/prak2.6_no10a.png>

<img src = imgjobsheet4/prak2.6_no10b.png>

11. Langkah berikutnya membuat update atau ubah data user dengan cara bikin file baru pada view dengan nama user_ubah.blade.php dan buat scriptnya menjadi seperti di bawah ini

```php
<!DOCTYPE html>
<html>
    <body>
        <h1>Form Ubah Data User</h1>
        <a href="/user">Kembali</a>
        <form method="post" action="/user/ubah_simpan/{{ $data->user_id }}">
            
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <label>Username</label>
            <input type="text" name="username" placeholder="Masukan Username" value="{{ $data->username }}">
            <br>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Masukan Nama" value="{{ $data->username }}">
            <br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukan Password" value="{{ $data->password }}">
            <br>
            <label>Level ID</label>
            <input type="number" name="level_id" placeholder="Masukan ID Level" value="{{ $data->level_id }}">
            <br><br>
            <input type="submit" class="btn btn-success" value="Ubah">

        </form>
    </body>
</html>
```

12. Tambahkan script pada routes dengan nama file web.php. Tambahkan seperti gambar di bawah ini

```php
Route::get('/user/ubah/{id}', [ControllersUserController::class, 'ubah']);
```

13. Tambahkan script pada controller dengan nama file UserController.php. Tambahkan script dalam class dan buat method baru dengan nama ubah dan diletakan di bawah
method tambah_simpan seperti gambar di bawah ini

```php
public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }
```

14. Simpan kode program Langkah 11 sd 13. Kemudian jalankan pada browser dan klik link “Ubah” amati apa yang terjadi dan beri penjelasan dalam laporan

<img src = imgjobsheet4/prak2.6_no14.png>

diubah menjadi seperti ini

<img src = imgjobsheet4/prak2.6_no14a.png>

Ketika link "Ubah" diklik, browser akan diarahkan ke halaman user_ubah.blade.php.
Halaman tersebut menampilkan formulir dengan data user yang ingin diubah.
Pengguna dapat mengisi formulir dan klik "Ubah" untuk menyimpan perubahan data user.

15. Tambahkan script pada routes dengan nama file web.php. Tambahkan seperti gambar di bawah ini

```php
Route::put('/user/ubah_simpan/{id}', [ControllersUserController::class, 'ubah_simpan']);
```

16. Tambahkan script pada controller dengan nama file UserController.php. Tambahkan script dalam class dan buat method baru dengan nama ubah_simpan dan diletakan di
bawah method ubah seperti gambar di bawah ini

```php
public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }
```

17. Simpan kode program Langkah 15 dan 16. Kemudian jalankan link localhost:8000/user/ubah/1 atau localhost/PWL_POS/public/user/ubah/1 pada browser dan ubah input formnya dan klik tombol ubah, kemudian amati apa yang terjadi dan beri penjelasan dalam laporan

Jawab : hasilnya

<img src = imgjobsheet4/prak2.6_no14b.png>

Script di atas menunjukkan cara untuk membuat form ubah data user dengan Laravel. Script ini menggunakan resource routing dan method PUT untuk memperbarui data user di database.

18. Berikut untuk langkah delete . Tambahkan script pada routes dengan nama file web.php.Tambahkan seperti gambar di bawah ini

```php
Route::get('/user/hapus/{id}', [ControllersUserController::class, 'hapus']);
```

19. Tambahkan script pada controller dengan nama file UserController.php. Tambahkan script dalam class dan buat method baru dengan nama hapus dan diletakan di bawah
method ubah_simpan seperti gambar di bawah ini

```php
public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
```

20. Simpan kode program Langkah 18 dan 19. Kemudian jalankan pada browser dan klik tombol hapus, kemudian amati apa yang terjadi dan beri penjelasan dalam laporan

Jawab : 

tabel sebelumnya

<img src = imgjobsheet4/prak2.6_no14b.png>

setelah di pilih hapus

<img src = imgjobsheet4/prak2.6_no20.png>

Script di atas menunjukkan cara untuk menghapus data user dengan Laravel. Script ini menggunakan method GET dan delete() untuk menghapus data user dari database.

- Ketika tombol "Hapus" diklik, browser akan diarahkan ke route /user/hapus/{id}.
- Method hapus akan dijalankan dan data user dengan id tersebut akan dihapus dari database.

### **Praktikum 2.7 – Relationships**:

1. Buka file model pada UserModel.php dan tambahkan scritpnya menjadi seperti di bawah ini

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'username', 'nama', 'password'];

    function level(): BelongsTo {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
}
```

2. Buka file controller pada UserController.php dan ubah method script menjadi seperti di bawah ini

```php
public function index()
    {
        $user = UserModel::with('level')->get();
        dd($user);
    }
```

- Buatlah LevelModel.php

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level';
    protected $primaryKey = 'level_id';

    protected $guarded = [];

    public function user()
    {
        return $this->hasMany(UserModel::class, 'level_id', 'level_id');
    }
}
```

3. Simpan kode program Langkah 2. Kemudian jalankan link pada browser, kemudian amati apa yang terjadi dan beri penjelasan dalam laporan

<img src = imgjobsheet4/soal3.png>