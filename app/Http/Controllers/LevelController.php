<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;

class LevelController extends Controller
{
    public function index(LevelController $dataTable)
    {
        return $dataTable->render('level.index');
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        LevelModel::create([
            'level_kode' => $request->levelKode,
            'level_nama' => $request->levelNama,
        ]);

        return redirect('/level');
    }

    public function edit($id)
    {
        $level = LevelModel::find($id);
        return view('level.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $level = LevelModel::find($id);

        $level->level_kode = $request->levelKode;
        $level->level_nama = $request->levelNama;

        $level->save();

        return redirect('/level')->with('success', 'Level berhasil di update');
    }

    public function delete($id)
    {
        $level = LevelModel::find($id);
        if (!$level) {
            abort(404);
        }

        $level->delete();

        DB::table('/m_user')->where('level_id', $id)->update(['level_id' => null]);
        $level->delete();

        return redirect('/level')->with('success', 'User berhasil dihapus');
    }

}
    // public function index()
    // {
    //     // DB::insert('insert into m_level(level_kode, level_nama, created_at) 
    //     // values(?, ?, ?)',['CUS', 'Pelanggan', now()]);
    //     //return 'Insert data baru berhasil';
        
    //     // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
    //     // return 'Update data berhasil. Jumlah data yang diupdate: '.$row.' baris';

    //     // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
    //     // return 'Delete date berhasil. Jumlah data yang dihapus: '. $row.' baris';

    //     $data = DB::select('select * from m_level');
    //     return view('level', ['data' => $data]);
    // }
//}
