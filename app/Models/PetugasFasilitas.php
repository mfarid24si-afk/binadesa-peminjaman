<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class PetugasFasilitas extends Model
{
    use HasFactory;

    protected $table      = 'petugas_fasilitas';
    protected $primaryKey = 'petugas_id';
    protected $fillable   = [
        'fasilitas_id',
        'petugas_warga_id',
        'peran',
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

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'petugas_warga_id');
    }
}
