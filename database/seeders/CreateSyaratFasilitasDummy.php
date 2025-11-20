<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreateSyaratFasilitasDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        foreach (range(1, 100) as $i) {

            DB::table('syarat_fasilitas')->insert([
                'fasilitas_id' => $faker->numberBetween(1, 50), // sesuaikan jumlah fasilitas
                'nama_syarat'  => $faker->randomElement([
                    'KTP Asli',
                    'Surat Permohonan',
                    'Proposal Kegiatan',
                    'Fotokopi KK',
                    'Formulir Pengajuan',
                    'Surat Pernyataan',
                ]),
                'deskripsi'    => $faker->randomElement([
                    'Berhasil Dipinjam',
                    'Tidak Berhasil Dipinjam',
                    'Masih Ada yang kurang'
                ]),
            ]);
        }
    }
}
