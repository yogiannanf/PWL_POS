<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;
    protected $table = "t_stok";
    protected $primaryKey = "stok_id";
    protected $fillable = ['stok_id', 'barang_id', 'user_id', 'stok_tanggal', 'stok_jumlah'];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }
}