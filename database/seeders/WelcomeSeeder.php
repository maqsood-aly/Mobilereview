<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Welcome;


class WelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Welcome::create([
            'welcome_section' => ' <h1 class="card-title">Welcome to Mobile Reviews Pakistan</h1>
            <p>Your ultimate source for in-depth mobile phone reviews, comparisons, and buying guides. Discover the best
                smartphones available in Pakistan and make informed decisions with our expert insights.</p>',
         
         ]);
    }
}
