<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreateFasilitasUmumDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = \Faker\Factory::create('id_ID');

    foreach (range(1, 100) as $i) {
        DB::table('fasilitas_umum')->insert([
            'nama'       => $faker->randomElement([
                'Balai Desa',
                'Lapangan Serbaguna',
                'Gedung Serbaguna',
                'Posyandu',
                'Perpustakaan Desa',
                'Ruang Rapat Desa',
            ]),
            'jenis'      => $faker->randomElement([
                'Bangunan',
                'Lapangan',
                'Ruangan',
                'Pelayanan Umum',
            ]),
            'alamat'     => $faker->address,
            'rt'         => $faker->numberBetween(1, 10),
            'rw'         => $faker->numberBetween(1, 10),
            'kapasitas'  => $faker->numberBetween(10, 500),
            'deskripsi'  => $faker->randomElement([
                'Samping gang lobak',
                'Depan posyandu',
                'Sebelah lapangan',
                'Atap warna merah',
                'Di dekat balai desa',
                'Seberang sungai'
            ]),
        ]);
    }
}

}
