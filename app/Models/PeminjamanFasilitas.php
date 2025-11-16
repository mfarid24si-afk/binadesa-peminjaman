<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanFasilitas extends Model
{
    use HasFactory;

    protected $table      = 'peminjaman_fasilitas';
    protected $primaryKey = 'pinjam_id';
    protected $fillable   = [
        'fasilitas_id',
        'warga_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'tujuan',
        'status',
        'total_biaya',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(PembayaranFasilitas::class, 'pinjam_id');
    }
}
