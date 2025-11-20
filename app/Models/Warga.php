<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Warga extends Model
{
    use HasFactory;

    protected $table      = 'warga';
    protected $primaryKey = 'warga_id';
    protected $fillable   = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email',
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
    return $query;
}


    public function peminjaman()
    {
        return $this->hasMany(PeminjamanFasilitas::class, 'warga_id');
    }

    public function petugas()
    {
        return $this->hasMany(PetugasFasilitas::class, 'petugas_warga_id');
    }
}
