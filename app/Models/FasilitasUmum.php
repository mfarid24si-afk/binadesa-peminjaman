<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasUmum extends Model
{
    use HasFactory;

    protected $table      = 'fasilitas_umum';
    protected $primaryKey = 'fasilitas_id';
    protected $fillable   = [
        'nama',
        'jenis',
        'alamat',
        'rt',
        'rw',
        'kapasitas',
        'deskripsi',
    ];

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanFasilitas::class, 'fasilitas_id');
    }

    public function syarat()
    {
        return $this->hasMany(SyaratFasilitas::class, 'fasilitas_id');
    }

    public function petugas()
    {
        return $this->hasMany(PetugasFasilitas::class, 'fasilitas_id');
    }
}
