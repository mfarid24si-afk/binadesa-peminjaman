<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use App\Models\FasilitasUmum;
use App\Models\PetugasFasilitas;
use App\Models\PeminjamanFasilitas;
use App\Models\PembayaranFasilitas;
use App\Models\SyaratFasilitas;

class FasilitasWargaSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Insert Warga
        $w1 = Warga::create([
            'no_ktp' => '1234567890',
            'nama' => 'Budi Santoso',
            'jenis_kelamin' => 'L',
            'agama' => 'Islam',
            'pekerjaan' => 'Karyawan',
            'telp' => '0812345678',
            'email' => 'budi@example.com',
        ]);

        // 2. Insert Fasilitas
        $f1 = FasilitasUmum::create([
            'nama' => 'Balai Pertemuan',
            'jenis' => 'Gedung',
            'alamat' => 'Jl. Merpati No. 2',
            'rt' => '001',
            'rw' => '002',
            'kapasitas' => 200,
            'deskripsi' => 'Gedung serbaguna untuk warga.',
        ]);

        // 3. Insert Syarat Fasilitas
        SyaratFasilitas::create([
            'fasilitas_id' => $f1->fasilitas_id,
            'nama_syarat' => 'Fotokopi KTP',
            'deskripsi' => 'Melampirkan fotokopi KTP peminjam.',
        ]);

        // 4. Insert Petugas
        PetugasFasilitas::create([
            'fasilitas_id' => $f1->fasilitas_id,
            'petugas_warga_id' => $w1->warga_id,
            'peran' => 'Penanggung Jawab',
        ]);

        // 5. Insert Peminjaman
        $pinjam = PeminjamanFasilitas::create([
            'fasilitas_id'   => $f1->fasilitas_id,
            'warga_id'       => $w1->warga_id,
            'tanggal_mulai'  => now(),
            'tanggal_selesai'=> now()->addDays(1),
            'tujuan'         => 'Acara RT',
            'status'         => 'Disetujui',
            'total_biaya'    => 500000,
        ]);

        // 6. Insert Pembayaran (relasi ke peminjaman)
        PembayaranFasilitas::create([
            'pinjam_id' => $pinjam->pinjam_id,
            'tanggal'   => now(),
            'jumlah'    => 250000,
            'metode'    => 'Transfer',
            'keterangan'=> 'Pembayaran DP',
        ]);
    }
}
