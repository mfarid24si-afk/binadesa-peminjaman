<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class CreateMediaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $faker = \Faker\Factory::create();

    foreach (range(1, 100) as $index) {
        DB::table('media')->insert([
            'ref_table'  => $faker->randomElement(['warga', 'peminjaman', 'petugas']),
            'ref_id'     => $faker->numberBetween(1, 50),
            'file_url'   => $faker->imageUrl(640, 480, 'business', true),
            'caption'    => $faker->sentence(5),
            'mime_type'  => $faker->randomElement([
                'image',
                'jpeg',
                'png',
                'application',
                'pdf',
                'video',
                'mp4',
            ]),
            'sort_order' => $faker->numberBetween(1, 10),
        ]);
    }
}

}
