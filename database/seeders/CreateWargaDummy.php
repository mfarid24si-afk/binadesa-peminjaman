<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
    $faker = \Faker\Factory::create('id_ID');

foreach (range(1, 100) as $index) {
    DB::table('warga')->insert([
        'no_ktp'        => $faker->numerify(str_repeat('#', 16)),
        'nama'          => $faker->name,
        'jenis_kelamin' => $faker->randomElement(['L', 'P']),
        'agama'         => $faker->randomElement([
            'Islam','Kristen','Katolik','Hindu','Buddha','Konghucu'
        ]),
        'pekerjaan'     => $faker->jobTitle,
        'telp'          => $faker->phoneNumber,
        'email'         => $faker->unique()->safeEmail,
    ]);
}

}
}
