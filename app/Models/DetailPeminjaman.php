<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    use HasFactory;

    protected $table      = 'detail_peminjaman';
    protected $primaryKey = 'detail_id';
    protected $fillable   = [
        'pinjam_id',
        'nama_barang',
        'jumlah',
        'keterangan',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanFasilitas::class, 'pinjam_id');
    }
}
