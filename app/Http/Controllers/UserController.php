<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::findor(20, ['username', 'nama'], function(){
            abort(404);
        });

        return view('user', ['data' => $user]);

        /** 2.1 nomor 4
        * $user = UserModel::where('level_id', 1)->first();
        * return view('user', ['data' => $user]);
        */

        /** 2.1 nomor 1
        * $user = UserModel::find(1);
        * return view('user', ['data' => $user]);
        */

    // tambah data user dengan Eloquent Model
    /**$data = [
        'level_id' => 2,
        'username' => 'manager_tiga',
        'nama' => 'Manager 3',
        'password' => Hash::make('12345')

        //Jobsheet3
        //'nama' => 'Pelanggan Pertama'
        // 'username' => 'customer-1',
        // 'nama' => 'Pelanggan',
        // 'password' => Hash::make('12345'),
        // 'level_id' => 4
    ];
    UserModel::create($data);
    */

    //jobsheet3
    //UserModel::where('username', 'customer-1')->update($data); //update data user
    //UserModel::insert($data); //tambahkan data ke tabel m_user

    //coba akses model UserModel
    $user = UserModel::all();//ambil semua data dari tabel m_user
    return view('user', ['data' => $user]);
    }
}