<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'fasilitas_desa';
    protected $primaryKey = 'peminjam_id'; // huruf kecil "primaryKey"
    public $incrementing = true;
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'phone',
        'barang',
    ];
}