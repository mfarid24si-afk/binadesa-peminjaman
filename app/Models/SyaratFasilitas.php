<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SyaratFasilitas extends Model
{
    use HasFactory;

    protected $table = 'syarat_fasilitas';
    protected $primaryKey = 'syarat_id';
    protected $fillable = [
        'fasilitas_id',
        'nama_syarat',
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

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }
}
