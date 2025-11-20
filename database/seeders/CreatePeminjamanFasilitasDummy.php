<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreatePeminjamanFasilitasDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = \Faker\Factory::create('id_ID');

    foreach (range(1, 99) as $i) {

        $tanggalMulai   = $faker->dateTimeBetween('-3 months', 'now');
        $tanggalSelesai = (clone $tanggalMulai)->modify('+'.rand(1,3).' days');

        DB::table('peminjaman_fasilitas')->insert([
            'fasilitas_id'     => $faker->numberBetween(1, 20),   // asumsi punya 20 fasilitas
            'warga_id'         => $faker->numberBetween(1, 50),   // asumsi ada 50 warga
            'tanggal_mulai'    => $tanggalMulai->format('Y-m-d'),
            'tanggal_selesai'  => $tanggalSelesai->format('Y-m-d'),
            'tujuan'           => $faker->sentence(6),
            'status'           => $faker->randomElement([
                'pending',
                'disetujui',
                'ditolak',
                'selesai'
            ]),
            'total_biaya'      => $faker->numberBetween(0, 300000),
        ]);
    }
}

}
