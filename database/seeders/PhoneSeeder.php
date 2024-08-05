<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('phones')->insert([
                'title' => $faker->text(25),
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg',
                'price' => $faker->randomFloat(2, 3000000, 40000000),
                'quantity' => $faker->numberBetween(50, 1000),
                'description' => $faker->text('50'),
                'cate_id' => rand(1, 3)
            ]);
        }
    }
}
