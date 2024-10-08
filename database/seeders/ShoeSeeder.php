<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Thêm bản ghi
        for ($i = 0; $i < 20; $i++) {
            DB::table('shoes')->insert([
                'shoe_name' => fake()->text(30),
                'thumbnail' => fake()->imageUrl(1),
                'description' => fake()->text(100),
                'price' => fake()->randomFloat(0, 150000, 700000),
                'view' => fake()->numberBetween(0, 100),
                'specification' => fake()->text(100),

                'brand_id' => rand(1, 7),
                
            ]);
        }
    }
}
