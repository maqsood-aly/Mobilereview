<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            ['name' => 'Samsung Galaxy J6', 'brand_id' => 1, 'base_model' => 'Samsung Galaxy J'],
            ['name' => 'Samsung Galaxy J6+', 'brand_id' => 1, 'base_model' => 'Samsung Galaxy J'],
            ['name' => 'Samsung Galaxy J8', 'brand_id' => 1, 'base_model' => 'Samsung Galaxy J'],
            ['name' => 'iPhone 15', 'brand_id' => 1, 'base_model' => 'iPhone 15'],
            ['name' => 'iPhone 15 Pro', 'brand_id' => 1, 'base_model' => 'iPhone 15'],
            ['name' => 'iPhone 15 Pro Max', 'brand_id' => 1, 'base_model' => 'iPhone 15'],
            ['name' => 'iPhone 15 Pro Ultra', 'brand_id' => 1, 'base_model' => 'iPhone 15'],
            ['name' => 'Google Pixel 6', 'brand_id' => 1, 'base_model' => 'Google Pixel 6'],
            ['name' => 'Google Pixel 6 Pro', 'brand_id' => 1, 'base_model' => 'Google Pixel 6'],
            ['name' => 'Google Pixel 6a', 'brand_id' => 1, 'base_model' => 'Google Pixel 6'],
        ];

        DB::table('models')->insert($models);
    }
}
