<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

class Warga extends Model
{
     use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id';
    protected $fillable = [
        'no_ktp', 'nama', 'jenis_kelamin', 'agama', 'pekerjaan', 'telp', 'email'
    ];

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanFasilitas::class, 'warga_id');
    }

    public function petugas()
    {
        return $this->hasMany(PetugasFasilitas::class, 'petugas_warga_id');
    }
}

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'ref_table', 'ref_id', 'file_url', 'caption', 'mime_type', 'sort_order'
    ];
}

class FasilitasUmum extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_umum';
    protected $primaryKey = 'fasilitas_id';
    protected $fillable = [
        'nama', 'jenis', 'alamat', 'rt', 'rw', 'kapasitas', 'deskripsi'
    ];

    public function syarat()
    {
        return $this->hasMany(SyaratFasilitas::class, 'fasilitas_id');
    }

    public function petugas()
    {
        return $this->hasMany(PetugasFasilitas::class, 'fasilitas_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(PeminjamanFasilitas::class, 'fasilitas_id');
    }
}

class PeminjamanFasilitas extends Model
{
    use HasFactory;

    protected $table = 'peminjaman_fasilitas';
    protected $primaryKey = 'pinjam_id';
    protected $fillable = [
        'fasilitas_id', 'warga_id', 'tanggal_mulai', 'tanggal_selesai', 'tujuan', 'status', 'total_biaya'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function pembayaran()
    {
        return $this->hasMany(PembayaranFasilitas::class, 'pinjam_id');
    }
}

class PembayaranFasilitas extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_fasilitas';
    protected $primaryKey = 'bayar_id';
    protected $fillable = [
        'pinjam_id', 'tanggal', 'jumlah', 'metode', 'keterangan'
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanFasilitas::class, 'pinjam_id');
    }
}

class SyaratFasilitas extends Model
{
    use HasFactory;

    protected $table = 'syarat_fasilitas';
    protected $primaryKey = 'syarat_id';
    protected $fillable = [
        'fasilitas_id', 'nama_syarat', 'deskripsi'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }
}

class PetugasFasilitas extends Model
{
    use HasFactory;

    protected $table = 'petugas_fasilitas';
    protected $primaryKey = 'petugas_id';
    protected $fillable = [
        'fasilitas_id', 'petugas_warga_id', 'peran'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'petugas_warga_id');
    }
}

