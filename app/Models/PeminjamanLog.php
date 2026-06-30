<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanLog extends Model
{
    use HasFactory;

    protected $table      = 'peminjaman_log';
    protected $primaryKey = 'log_id';
    protected $fillable   = [
        'pinjam_id',
        'status',
        'keterangan',
        'created_by',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanFasilitas::class, 'pinjam_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
