<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\view;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /*public function index(KategoriDataTable $dataTable)
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

        // return $dataTable->render('kategori.index');
    }*/


    /**
    * Show the form to create a new post.
    */
    public function create()
    {
        return view('kategori.create');
    }

    /*
    * Store a new post
    */
    public function store(Request $request): RedirectResponse 
    {

        $validated = $request->validate([
            'kategori_kode' => 'bail|required|max:100',
            'kategori_nama' => 'required|max:1000',
        ]);


        // $validated = $request->validate([
        //     'kategori_kode' => 'required|max:100',
        //     'kategori_nama' => 'required|max:1000',
        // ]);

        // $validated = $request->validate([
        //     'kategori_kode' => 'required',
        //     'kategori_nama' => 'required',
        // ]);
        // KategoriModel::create([
        //     'kategori_kode' => $request->kodeKategori,
        //     'kategori_nama' => $request->namaKategori,
        // ]);

        //The post is valid

        return redirect('/kategori');
    }

    

    // //JS 5 no 3
    // function edit($id) {
    //     // $kategori =KategoriModel::find($id);
    //     // return view('kategori.edit', ['data' => $kategori]);
    //     // js 5 no 4
    //     return view('kategori.edit', ['data' => KategoriModel::find($id)]);
    // }

    // public function update(Request $request, $id)
    // {
    //     $kategori = KategoriModel::find($id);
    //     $kategori->kategori_kode = $request->kategori_kode;
    //     $kategori->kategori_nama = $request->kategori_nama;

    //     $kategori->save();
    //     return redirect('/kategori');
    // }
    // //--
    // //js 5 no 4
    // function destroy($id) {
    //     KategoriModel::find($id)->delete();

    //     return redirect('/kategori');
    // }
}