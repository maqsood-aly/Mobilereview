<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricelistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pricelist')->insert([
            ['price' => 10000],
            ['price' => 20000],
            ['price' => 30000],
            ['price' => 40000],
            ['price' => 50000],
            ['price' => 60000],
            ['price' => 70000],
            ['price' => 80000],
            ['price' => 90000],
            ['price' => 100000],
        ]);        
    }
}
