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
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }
    
    //   $user = UserModel :: create([
    //     'username' => 'manager11',
    //     'nama' => 'Manager11',
    //     'password' => Hash::make('12345'),
    //     'level_id' => 2,
    // ]);

    //     $user->username = 'manager12';

        // $user->isDirty(); // true
        // $user->isDirty('username'); // true
        // $user->isDirty('nama'); // false
        // $user->isDirty(['nama', 'username']); // true

        // $user->isClean(); // false
        // $user->isClean('username'); // false
        // $user->isClean('nama'); // true
        // $user->isClean(['nama', 'username']); // false
        
        // $user->save();

        // $user->isDirty(); // false
        // $user->isClean(); // true
        // dd($user->wasChanged(['nama', 'username'])); // true
        //dd($user->isDirty());

    // public function index()
    // {
    //     $user = UserModel::firstOrCreate(
    //         [
    //             'username' => 'manager33',
    //             'nama' => 'Manager Tiga Tiga',
    //             'password' => Hash::make('12345'),
    //             'level_id' => 2
    //         ],
    //     );
    //     $user->save();
        
    //     /*$user = UserModel::where('level_id', 2)->count();
    //     //dd($user);
    //     //$user = UserModel::where('username', 'manager9')->firstOrFail();
    //     return view('user', ['data' => $user]);
    //     */

    //     /* $user = UserModel::findOrFail(1);
    //     return view('user', ['data' => $user]);
    //     */

    //     /** 2.1 nomor 10
    //     *$user = UserModel::findor(20, ['username', 'nama'], function(){
    //     *    abort(404);
    //     *});

    //     *return view('user', ['data' => $user]);
    //     */

    //     /** 2.1 nomor 4
    //     * $user = UserModel::where('level_id', 1)->first();
    //     * return view('user', ['data' => $user]);
    //     */

    //     /** 2.1 nomor 1
    //     * $user = UserModel::find(1);
    //     * return view('user', ['data' => $user]);
    //     */

    // // tambah data user dengan Eloquent Model
    // /**$data = [
    //     'level_id' => 2,
    //     'username' => 'manager_tiga',
    //     'nama' => 'Manager 3',
    //     'password' => Hash::make('12345')

    //     //Jobsheet3
    //     //'nama' => 'Pelanggan Pertama'
    //     // 'username' => 'customer-1',
    //     // 'nama' => 'Pelanggan',
    //     // 'password' => Hash::make('12345'),
    //     // 'level_id' => 4
    // ];
    // UserModel::create($data);
    // */

    // //jobsheet3
    // //UserModel::where('username', 'customer-1')->update($data); //update data user
    // //UserModel::insert($data); //tambahkan data ke tabel m_user

    // //coba akses model UserModel
    // //$user = UserModel::all();//ambil semua data dari tabel m_user
    // return view('user', ['data' => $user]);
    // }
    
    //}
}