<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['brand_name' => 'Nike'],
            ['brand_name' => 'Adidas'],
            ['brand_name' => 'Ananas'],
            ['brand_name' => 'Vans'],
            ['brand_name' => 'Balenciaga'],
            ['brand_name' => 'Puma'],
            ['brand_name' => 'Jordan']

        ]);

    }
}
