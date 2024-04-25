<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Level User',
            'list' => ['Home', 'Level']
        ];
        $page = (object)[
            'title' => 'Daftar level user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level';       //set menu yang sedang aktif
        $level = LevelModel::all(); //ambil data level untuk filter level
        $activeMenu = 'level';          //set menu yang sedang aktif
        $level = LevelModel::all();     //ambil data level untuk filter level
        return view('level.index', [
            'breadcrumb' => $breadcrumb, 'page' => $page,
            'level' => $level, 'activeMenu' => $activeMenu
        ]);
    }
    public function list(Request $request)
    {
        $level = LevelModel::select('level_id', 'level_kode', 'level_nama');


        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $level->where('level_id', $request->level_id);
        }

        return DataTables::of($level)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()                      // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($level) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" 
                        onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];
        $page = (object)[
            'title' => 'Tambah level baru'
        ];

        // $level = LevelModel::all(); //ambil data level untuk ditampilkan di form
        $activeMenu = 'level'; //set menu yang sedang aktif
        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    //menampilkan detail level
    public function show(string $id)
    {
        $level = LevelModel::find($id);
        $breadcrumb = (object)[
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];
        $page = (object)[
            'title' => 'Detail level'
        ];
        $activeMenu = 'level'; //set menu yang sedang aktif
        return view('level.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function edit(String $id)
    {
        $level = LevelModel::find($id);
        // $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list'  => ['Home', 'Level', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit level'
        ];
        $activeMenu = 'level'; //set menu yang sedang aktif
        return view('level.edit', [
            'breadcrumb' => $breadcrumb, 'page' => $page,
            'level' => $level, 'activeMenu' => $activeMenu
        ]);
    }
    // Menyimpan perubahan data level
    public function update(Request $request, string $id)
    {
        $request->validate([
            'levelKode' => 'required|string|min:3|max:5|unique:m_level,level_kode,' . $id . ',level_id',
            'levelNama' => 'required|string|max:100',
        ]);
        LevelModel::find($id)->update([
            'level_kode' => $request->levelKode,
            'level_nama' => $request->levelNama,
        ]);
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }
    // Menghapus data level
    public function destroy(string $id)
    {
        $check = LevelModel::find($id);
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }
        try {
            LevelModel::destroy($id);
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}