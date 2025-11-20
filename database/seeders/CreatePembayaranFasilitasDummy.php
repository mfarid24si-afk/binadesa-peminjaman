<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreatePembayaranFasilitasDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = \Faker\Factory::create('id_ID');

    foreach (range(1, 99) as $i) {

        DB::table('pembayaran_fasilitas')->insert([
            'pinjam_id'  => $faker->numberBetween(1, 80),   // asumsi 80 data peminjaman
            'tanggal'    => $faker->date('Y-m-d'),
            'jumlah'     => $faker->numberBetween(20000, 500000),
            'metode'     => $faker->randomElement([
                'cash',
                'transfer',
                'qris'
            ]),
            'keterangan' => $faker->optional()->sentence(5),
        ]);
    }
}

}
