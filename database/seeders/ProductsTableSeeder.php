<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert product into the products table
        $product = Product::create([
            'name' => 'Samsung Galaxy J6',
            'image_url' => 'samsung.jpg',
            'price' => 99.99,
            'slug' => Str::slug('Samsung Galaxy J6'),
            'meta_title' => 'Samsung Galaxy J6 Review and Price in Pakistan',
            'meta_description' => 'A powerful smartphone from Samsung.',
            'meta_keywords' => 'samsung galaxy j6',
            'review_section' => 'The Samsung Galaxy J6 offers an excellent balance of performance, features, and design. The display is vibrant and the camera setup allows for versatile photography. The phone\'s performance is smooth, thanks to the sufficient RAM and powerful processor.',
            'overview_section' => 'The Samsung Galaxy J6 is a solid entry in the Galaxy series, offering reliable technology and a sleek design. With a vibrant display and a powerful processor, this phone is designed for both productivity and entertainment.',
            'release_date' => '2024-01-11',
            'launched_in_pakistan' => true,
            'dimensions' => '6.32 x 2.93 x 0.33',
            'weight' => 186,
            'sim_type' => 'Dual (Nano-SIM)',
            'colours' => 'Yellow, Black, Gray',
            'model_id' => 1, 
            'brand_id' => 1, 
            'created_at' => now(),
            'updated_at' => now(),

            // display
            'screen_size' => 6.67,
            'type' => 'AMOLED',
            'resolution' => '2400 x 1080',
            'pixel_density' => 395,
            'refresh_rate' => 120,
            'quality' => 'HDR10+',
            'glass_protection' => 'Gorilla Glass Victus',
            'display_colours' => '16M',  
            
            // Hardware
            'soc' => 'Mediatek Dimensity 8300 Ultra',
            'gpu' => 'Mali MC6',
            'cpu' => 'Octa-core',
            'ram' => '8 GB',
            'storage' => '256 GB',

            // Software
            'operating_system' => 'Android 14',
            'ui' => 'HyperOS',

            // Cameras
            'no_of_rear_cameras' => 3,
            'rear_cameras' => '64 MP (f/1.7) + 8 MP (f/2.2) + 2 MP (f/2.4)',
            'rear_flash' => true,
            'periscope' => true,
            'no_of_front_cameras' => 1,
            'front_camera' => '16 MP (f/2.4)',

            // Battery
            'battery_capacity' => '5000 mAh',

            // Sensors
            'accelerometer' => true,
            'gyroscope' => true,
            'compass' => true,
            'fingerprint' => true,

            // Connectivity
            'bluetooth' => '5.4',
            'wifi' => 'Wi-Fi 802.11 a/b/g/n/ac/6',
            'nfc' => true,
            '_2g' => true,
            '_3g' => true,
            '_4g' => true,
            '_5g' => true,
            'status'=> 'draft',
        ]);

        // Add pros to the product
        $product->pros()->createMany([
            ['pro' => 'High quality'],
            ['pro' => 'Affordable']
        ]);

        // Add cons to the product
        $product->cons()->createMany([
            ['con' => 'Limited availability'],
            ['con' => 'No warranty']
        ]);
    }
}
