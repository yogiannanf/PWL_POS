<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PenjualanDetailModel;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        return PenjualanDetailModel::all();
    }

    public function store(Request $request)
    {
        $transaksi = PenjualanDetailModel::create($request->all());
        return response()->json($transaksi, 201);
    }

    public function show(PenjualanDetailModel $transaksi)
    {
        $transaksiWithImage = PenjualanDetailModel::with(['barang' => function ($query) {
            $query->select('barang_id', 'image'); // 'id' harus disertakan jika digunakan sebagai kunci relasi
        }])->find($transaksi->detail_id);

        return response()->json([
            'detail_id' => $transaksiWithImage->detail_id,
            'penjualan_id' => $transaksiWithImage->penjualan_id,
            'barang_id' => $transaksiWithImage->barang_id,
            'harga' => $transaksiWithImage->harga,
            'jumlah' => $transaksiWithImage->jumlah,
            'created_at' => $transaksiWithImage->created_at,
            'updated_at' => $transaksiWithImage->updated_at,
            'barang_image' => $transaksiWithImage->barang->image
        ]);
    }

    public function update(Request $request, PenjualanDetailModel $transaksi)
    {
        $transaksi->update($request->all());
        return PenjualanDetailModel::find($transaksi);
    }

    public function destroy(PenjualanDetailModel $transaksi)
    {
        $transaksi->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}