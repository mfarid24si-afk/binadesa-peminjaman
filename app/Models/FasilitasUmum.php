<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
