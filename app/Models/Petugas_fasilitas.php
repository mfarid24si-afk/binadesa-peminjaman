<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas_fasilitas extends Model
{
    use HasFactory;

    protected $table = 'petugas_fasilitas';
    protected $primaryKey = 'petugas_id';
    protected $fillable = [
        'fasilitas_id',
        'petugas_warga_id',
        'peran',
    ];

    // Relasi ke fasilitas umum
    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id', 'fasilitas_id');
    }

    // Relasi ke warga (sebagai petugas)
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'petugas_warga_id', 'warga_id');
    }
}
