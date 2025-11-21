<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PembayaranFasilitas extends Model
{
    use HasFactory;

    protected $table      = 'pembayaran_fasilitas';
    protected $primaryKey = 'bayar_id';
    protected $fillable   = [
        'pinjam_id',
        'tanggal',
        'jumlah',
        'metode',
        'keterangan',
    ];
    public function scopeFilter($query, $request, array $filterableColumns)
{
    foreach ($filterableColumns as $column) {
        if ($request->filled($column)) {
            $query->where($column, $request->input($column));
        }
    }
    return $query;
}

public function scopeSearch($query, $request, array $columns)
{
    if ($request->filled('search')) {
        $query->where(function($q) use ($request, $columns) {
            foreach ($columns as $column) {
                $q->orWhere($column, 'LIKE', '%' . $request->search . '%');
            }
        });
    }
    
}

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanFasilitas::class, 'pinjam_id');
    }
}
