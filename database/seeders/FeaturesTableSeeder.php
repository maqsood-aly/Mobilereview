<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('features')->insert([
            [
                'feature_key' => 'Display',
                'feature_value' => '6.67-inch AMOLED (~446 PPI)',
                'feature_icon' => 'fas fa-desktop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'Processor',
                'feature_value' => 'Octa-core Mediatek Dimensity 8300 Ultra',
                'feature_icon' => 'fas fa-microchip',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'RAM',
                'feature_value' => '8 GB, 12 GB',
                'feature_icon' => 'fas fa-memory',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'Storage',
                'feature_value' => '256 GB, 512 GB',
                'feature_icon' => 'fas fa-hdd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'Rear Camera(s)',
                'feature_value' => '64 MP + 8 MP + 2 MP',
                'feature_icon' => 'fas fa-camera-retro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'Front Camera(s)',
                'feature_value' => '16 MP',
                'feature_icon' => 'fas fa-camera',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'Battery',
                'feature_value' => '5000mAh',
                'feature_icon' => 'fas fa-battery-full',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'feature_key' => 'OS',
                'feature_value' => 'Android 14',
                'feature_icon' => 'fab fa-android',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}
