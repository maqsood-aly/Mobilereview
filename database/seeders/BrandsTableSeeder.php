<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            ['name' => 'Brand A'],
            ['name' => 'Brand B'],
            ['name' => 'Brand C'],
            // Add more brand entries as needed
        ]);
    }
}
