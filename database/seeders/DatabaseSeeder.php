<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       
            $this->call([
                RamsTableSeeder::class,
                BrandsTableSeeder::class,
                FeaturesTableSeeder::class,
                ModelsTableSeeder::class,
                ProductsTableSeeder::class,
                ProductFeaturesTableSeeder::class,
                PricelistTableSeeder::class,
                FooterSeeder::class,
                WelcomeSeeder::class,
                UserSeeder::class
            ]);
        
        
    }
}
