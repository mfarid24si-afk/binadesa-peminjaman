<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas_umum extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_umum';
    protected $primaryKey = 'fasilitas_id';
    protected $fillable = [
        'nama',
        'jenis',
        'alamat',
        'rt',
        'rw',
        'kapasitas',
        'deskripsi',
    ];
}
