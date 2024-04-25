<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{

    //menampilkan halaman awal 
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Kategori',
            'list' => ['Home', 'Kategori']
        ];

        $page = (object) [
            'title' => 'Daftar kategori  yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori'; //set menu yg sedang aktif

        $kategori = KategoriModel::all(); //ambil data untuk filter 

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    // Ambil data dalam bentuk json untuk datatables
    // Ambil data dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        // Ambil semua data kategori
        $kategoris = KategoriModel::query();

        // Filter data berdasarkan kategori_id jika parameter dikirim
        if ($request->filled('kategori_id')) {
            $kategoris->where('kategori_id', $request->kategori_id);
        }

        // Ambil data dalam bentuk json dengan kolom index dan aksi
        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {
                $btn = '<a href="' . url('/kategori/' . $kategori->kategori_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/kategori/' . $kategori->kategori_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/kategori/' . $kategori->kategori_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    //menampilkan halaman form tambah 
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah kategori Baru'
        ];

        $kategori = KategoriModel::all(); //ambil data untuk ditampilkan di form
        $activeMenu = 'kategori'; //set menu yang sedang aktif

        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    //menyimpan data  baru
    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10', // harus diisi berupa string dan maksimal 10karakter
            'kategori_nama' => 'required|min:1', //harus diisi dan minimal 5 karakter
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil disimpan');
    }
    //menampilkan detail 
    public function show(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Kategori'
        ];

        $activeMenu = 'kategori'; //set menu yang sedang aktif

        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    //menampilkan halaman form edit 

    public function edit(string $id)
    {
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];

        $page = (object) [
            'title' => 'Kategori barang'
        ];

        $activeMenu = 'kategori';

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori,  'activeMenu' => $activeMenu]);
    }

    //menyimpan perubahan data
    public function update(Request $request, string $id)
    {

        $request->validate([
            'kategori_kode' => 'required|string|max:10', //nama harus diisi berupa string dan maksimal 10karakter
            'kategori_nama' => 'required|min:1', //password harus diisi dan minimal 5 karakter
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    //menghapus data 
    public function destroy(string $id)
    {
        $check = KategoriModel::find($id);
        if (!$check) { //untuk mengecek apakah data dengan id yang dimaksud ada atau tidak
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }
        try {
            KategoriModel::destroy($id); //hapus data 
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            //jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    /*
    public function index(KategoriDataTable $dataTable)
    {
        /* $data = [
             'kategori_kode' => 'SNK',
             'kategori_nama' => 'Snack/Makanan Ringan',
             'created_at' => now()
        ];
         DB::table('m_kategori')->insert($data);
        return 'Insert data baru berhasil';

        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);

        return $dataTable->render('kategori.index'); 
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
{
    // Aturan validasi untuk data yang dikirimkan
    $validated = $request->validate([
        'kategori_kode' => 'required|unique:m_kategori|max:255',
        'kategori_nama' => 'required',
    ]);

    // Store the post
    KategoriModel::create($validated);

    return redirect('/kategori')->with('success', 'Data kategori berhasil ditambahkan.');
}

    /*public function store(Request $request) {
        $validated = $request->validateWithBag('post', [
            'kategori_kode' => ['required', 'unique:posts', 'max:255'],
            'kategori_nama' => ['required'],
        ]);
        return redirect('/kategori');
    }*/

    /*public function store(Request $request)
    {
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    public function edit($id)
    {
    $kategori = KategoriModel::find($id);
    return view('kategori.edit', ['data' => $kategori]);
    }

    public function edit_simpan($id, Request $request)
    {
    $kategori = KategoriModel::find($id);
    $kategori->kategori_kode = $request->kodeKategori;
    $kategori->kategori_nama = $request->namaKategori;
    $kategori->save();
    return redirect('/kategori');
    }

    public function delete($id)
    {
    $kategori = KategoriModel::find($id);
    $kategori->delete();
    return redirect('/kategori');
    }
*/
}