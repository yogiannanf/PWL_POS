<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        // $data = [
        //     'kategori_id' => 2,
        //     'kategori_kode' => 'MNR',
        //     'kategori_nama' => 'Minuman Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama'=>'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' .$row.' baris';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'YN002')->where('kategori_nama', 'Furniture ruang tamu')->delete();
        // return 'Delete data berhasil. Jumlah data yang diupdate: ' .$row.' baris';

        // $rows = DB::table('m_kategori')
        // ->whereIn('kategori_kode', ['YN002', 'YN003', 'YN004', 'YN005'])
        // ->whereIn('kategori_nama', ['Furniture kamar tidur', 'Furniture ruang makan', 'Furniture dapur', 'Furniture ruang kerja'])
        // ->delete();

        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $rows . ' baris';


        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);

        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request){
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
}