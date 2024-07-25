<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_feature')->insert([
            [
                'product_id' => 1,
                'feature_id' => 1,
            ],
        ]);
    }
}

