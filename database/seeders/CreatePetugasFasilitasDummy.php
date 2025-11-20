<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreatePetugasFasilitasDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        foreach (range(1, 99) as $i) {

            DB::table('petugas_fasilitas')->insert([
                'fasilitas_id'      => $faker->numberBetween(1, 50), // sesuaikan dengan jumlah fasilitas
                'petugas_warga_id'  => $faker->numberBetween(1, 100), // sesuaikan dengan jumlah warga
                'peran'             => $faker->randomElement([
                    'Penanggung Jawab',
                    'Operator',
                    'Petugas Kebersihan',
                    'Pengelola',
                    'Koordinator',
                ]),
            ]);
        }
    }
}
