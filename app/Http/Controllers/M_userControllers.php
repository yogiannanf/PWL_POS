<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\UserModel;
use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Hash;

class M_userControllers extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('m_user.index');
    }

    public function create()
    {
        $levels = LevelModel::all();
        return view('m_user.create', ['levels' => $levels]);
    }

    public function store(Request $request)
    {
        $levels = LevelModel::all();

        $validated = $request->validate([
            'nama' => 'bail|required|max:100',
            'level_id' => 'bail|required',
            'username' => 'bail|required|max:20',
            'password' => 'bail|required|max:255',

        ]);

        UserModel::create([
            'nama' => $request->nama,
            'level_id' => $request->levelId,
            'username' => $request->username,
            'password' => Hash::make('$request->password')
        ]);

        return redirect('/level');
    }

    public function edit($id)
    {
        $m_user = UserModel::find($id);
        $levels = LevelModel::all();
        return view('m_user.edit', compact('m_user', 'levels'));
    }

    public function update(Request $request, $id)
    {
        $m_user = UserModel::find($id);

        $m_user->nama = $request->nama;
        $m_user->level_id = $request->levelId;
        $m_user->username = $request -> username;
        $m_user->password = Hash::make('$request->password');
        $m_user->level_id = $request->level_id;

        $m_user->save();

        return redirect('/m_user');
    }

    public function delete($id)
    {
        $m_user = UserModel::find($id);
        if (!$m_user) {
            abort(404);
        }

        $m_user->delete();

        return redirect('/m_user')->with('success', 'User berhasil dihapus');
    }

    public function getLevel(){
        $levels = LevelModel::all();
        return view('user', ['levels' => $levels]);
    }
}