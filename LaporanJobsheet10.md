# **Laporan Praktikum JOBSHEET 10 RESTFUL API**
---

## Nama  : Yogianna Nur Febrianti
## Kelas : TI 2F
## Absen : 27

### **Praktikum 1 – Membuat RESTful API Register**:

1. Sebelum memulai membuat REST API, terlebih dahulu download aplikasi Postman di https://www.postman.com/downloads. Aplikasi ini akan digunakan untuk mengerjakan semua tahap praktikum pada Jobsheet ini.

2. Lakukan instalasi JWT dengan mengetikkan perintah berikut:
composer require tymon/jwt-auth:2.1.1 Pastikan Anda terkoneksi dengan internet.

<img src = public/img10/praktikum1_no2.png>

3. Setelah berhasil menginstall JWT, lanjutkan dengan publish konfigurasi file dengan
perintah berikut:
php artisan vendor:publish --
provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

<img src = public/img10/praktikum1_no3.png>

4. Jika perintah di atas berhasil, maka kita akan mendapatkan 1 file baru yaitu config/jwt.php. Pada file ini dapat dilakukan konfigurasi jika memang diperlukan.

5. Setelah itu jalankan peintah berikut untuk membuat secret key JWT. php artisan jwt:secret
Jika berhasil, maka pada file .env akan ditambahkan sebuah baris berisi nilai key JWT_SECRET.

<img src = public/img10/praktikum1_no5.png>

6. Selanjutnya lakukan konfigurasi guard API. Buka config/auth.php. Ubah bagian ‘guards’ menjadi seperti berikut.

```php
'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
    ],
```

7. Kita akan menambahkan kode di model UserModel, ubah kode seperti berikut

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserModel extends Authenticatable implements JWTSubject
{

    public function getJWTIdentifier()
   {
    return $this->getKey();
   }

   public function getJWTCustomClaims()
   {
    return [];
   }

    protected $table = 'm_user';
    protected $primaryKey = "user_id";
```

8. Berikutnya kita akan membuat controller untuk register dengan menjalankan peintah
berikut.
php artisan make:controller Api/RegisterController
Jika berhasil maka akan ada tambahan controller pada folder Api dengan nama
RegisterController.

<img src = public/img10/praktikum1_no8.png>

9. Buka file tersebut, dan ubah kode menjadi seperti berikut.

```php
<?php

namespace App\Http\Controllers\Api;

use App\Models\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required'
        ]);

        //if validations fails
        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
        ]);

        //return response JSON user is created
        if($user){
            return response()->json([
                'succes' => true,
                'user' => $user,
            ], 201);
        }

        //return JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}
```

10. Selanjutnya buka routes/api.php, ubah semua kode menjadi seperti berikut.

```php
<?php

use App\Http\Controllers\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
```

11. Jika sudah, kita akan melakukan uji coba REST API melalui aplikasi Postman. Buka aplikasi Postman, isi URL localhost/PWL_POS/public/api/register serta method POST. Klik Send. 

<img src = public/img10/praktikum1_no11.png>

12. Sekarang kita coba masukkan data. Klik tab Body dan pilih form-data. Isikan key sesuai dengan kolom data, serta isikan data registrasi menggunakan nilai yang Anda inginkan.

<img src = public/img10/praktikum1_no12.png>

### **Praktikum 2 – Membuat RESTful API Login**:

1. Kita buat file controller dengan nama LoginController.
php artisan make:controller Api/LoginController
Jika berhasil maka akan ada tambahan controller pada folder Api dengan nama LoginController.

<img src = public/img10/praktikum2_no1.png>

2. Buka file tersebut, dan ubah kode menjadi seperti berikut.

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        
        //set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        //if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //get credentials from request
        $credentials = $request->only('username', 'password');

        //if auth failed
        if(!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Username atau Password Anda salah'
            ], 401);
        }

        //if auth success
        return response()->json([
            'success' => true,
            'user'    => auth()->guard('api')->user(),
            'token'   => $token
        ], 200);
    }
}
```

3. Berikutnya tambahkan route baru pada file api.php yaitu /login dan /user.

```php
use App\Http\Controllers\Api\LoginController;

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
```

4. Jika sudah, kita akan melakukan uji coba REST API melalui aplikasi Postman. Buka aplikasi Postman, isi URL localhost/PWL_POS/public/api/login serta method POST. Klik Send.

<img src = public/img10/praktikum2_no4.png>

Jika berhasil akan muncul error validasi

5. Selanjutnya, isikan username dan password sesuai dengan data user yang ada pada database. Klik tab Body dan pilih form-data. Isikan key sesuai dengan kolom data, serta isikan data user. Klik tombol Send, jika berhasil maka akan keluar tampilan seperti berikut. Copy nilai token yang diperoleh pada saat login karena akan diperlukan pada saat logout.

<img src = public/img10/praktikum2_no5.png>

6. Percobaan yang untuk data yang salah

<img src = public/img10/praktikum2_no6.png>

7. Coba kembali melakukan login dengan data yang benar. Sekarang mari kita coba menampilkan data user yang sedang login menggunakan URL
localhost/PWL_POS/public/api/user dan method GET. Jelaskan hasil dari percobaan tersebut.

<img src = public/img10/praktikum2_no7.png>

### **Praktikum 3 – Membuat RESTful API Logout**:

1. Tambahkan kode berikut pada file .env
    JWT_SHOW_BLACKLIST_EXCEPTION=true

2. Buat Controller baru dengan nama LogoutController.
    php artisan make:controller Api/LogoutController

<img src = public/img10/praktikum3_no2.png>

3. Buka file tersebut dan ubah kode menjadi seperti berikut.

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        //remove token
        $removeToken = JWTAuth::invalidate(JWTAuth::getToken());

        if($removeToken) {
            //return response JSON
            return response()->json([
                'success' => true,
                'message' => 'Logout Berhasil!',
            ]);
        }
    }
}
```

4. Lalu kita tambahkan routes pada api.php

```php 
use App\Http\Controllers\Api\LogoutController;

Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');
```

5. Jika sudah, kita akan melakukan uji coba REST API melalui aplikasi Postman. Buka
aplikasi Postman, isi URL localhost/PWL_POS/public/api/logout serta method POST. 

6. Isi token pada tab Authorization, pilih Type yaitu Bearer Token. Isikan token yang didapat saat login. Jika sudah klik Send.

<img src = public/img10/praktikum3_no6.png>

### **Praktikum 4 – Implementasi CRUD dalam RESTful API**:

Pada praktikum ini kita akan menggunakan tabel m_level untuk dimodifikasi menggunakan RESTful API.

1. Pertama, buat controller untuk mengolah API pada data level.
php artisan make:controller Api/LevelController

<img src = public/img10/praktikum4_no1.png>

2. Setelah berhasil, buka file tersebut dan tuliskan kode seperti berikut yang berisi fungsi CRUDnya.

```php
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LevelModel;
use Monolog\Level;

class LevelController extends Controller
{
    public function index()
    {
        return LevelModel::all();
    }

    public function store(Request $request)
    {
        $level = LevelModel::create($request->all());
        return response()->json($level, 201);
    }

    public function show(LevelModel $level)
    {
        return LevelModel::find($level);
    }

    public function update(Request $request, LevelModel $level)
    {
        $level->update($request->all());
        return LevelModel::find($level);
    }

    public function destroy(LevelModel $user)
    {
        $user->delete();
       
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
```

3. Kemudian kita lengkapi routes pada api.php.

```php
use App\Http\Controllers\Api\LevelController;

Route::get('levels', [LevelController::class, 'index']);
Route::post('levels', [LevelController::class, 'store']);
Route::get('levels/{level}', [LevelController::class, 'show']);
Route::put('levels/{level}', [LevelController::class, 'update']);
Route::delete('levels/{level}', [LevelController::class, 'destroy']);
```

4. Jika sudah. Lakukan uji coba API mulai dari fungsi untuk menampilkan data. Gunakan URL: localhost/PWL_POS-main/public/api/levels dan method GET. 

<img src = public/img10/praktikum4_no4.png>

5. Kemudian, lakukan percobaan penambahan data dengan URL : localhost/PWL_POSmain/public/api/levels dan method POST seperti di bawah ini. 

<img src = public/img10/praktikum4_no5.png>

6. Berikutnya lakukan percobaan menampilkan detail data. Jelaskan 

<img src = public/img10/praktikum4_no6.png>

Method GET digunakan untuk mengambil data dari server. Dalam kasus ini, user ingin mengambil detail data level dengan ID tertentu. Jika request berhasil, user akan mendapatkan respons JSON yang berisi detail data level dengan ID yang Anda tentukan. Respons JSON ini mungkin berisi informasi seperti nama level, kode level, tanggal dibuat, dan tanggal diperbarui.

7. Jika sudah, kita coba untuk melakukan edit data menggunakan localhost/PWL_POSmain/public/api/levels/{id} dan method PUT. Isikan data yang ingin diubah pada tab Param. Jelaskan

<img src = public/img10/praktikum4_no7.png>

Method PUT digunakan untuk memperbarui data yang ada di server. Dalam kasus ini, user ingin memperbarui data level dengan ID tertentu. Jika request berhasil, user akan mendapatkan respons JSON yang menunjukkan bahwa data level telah diubah. Respons JSON ini mungkin berisi informasi tentang level yang baru diubah, seperti ID level, nama level, dan detail lainnya.

8. Terakhir lakukan percobaan hapus data. Jelaskan

<img src = public/img10/praktikum4_no8.png>

### **TUGAS**:

Implementasikan CRUD API pada tabel lainnya yaitu tabel m_user, m_kategori, dan m_barang.

**CRUD API pada tabel m_user**:

**CRUD API pada tabel m_kategori**:

**CRUD API pada tabel m_barang**: