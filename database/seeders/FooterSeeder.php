<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Footer::create(['data' => '<div class="container-fluid">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>About Us</h5>
                <p>We provide in-depth reviews and analysis of the latest mobile phones to help you make informed decisions.</p>
            
            </div>
            
            <!-- Contact Information Section -->
            <div class="col-lg-4 col-md-12 mb-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li>Email: <a href="mailto:info@mobilereviews.com" class="text-secondary">info@mobilereviews.com</a></li>
                </ul>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Copyright Notice -->
            <div class="col-12 text-center">
                <p>&copy; 2024 Mobile Reviews. All rights reserved.</p>
                <p><a href="/privacy-policy" class="text-secondary">Privacy Policy</a> | <a href="/terms-of-service" class="text-secondary">Terms of Service</a></p>
            </div>
        </div>
    </div>']);
    }
}
