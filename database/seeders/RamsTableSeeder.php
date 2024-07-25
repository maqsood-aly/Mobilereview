<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rams')->insert([
            ['size' => '4GB'],
            ['size' => '8GB'],
            ['size' => '16GB'],
            // Add more RAM entries as needed
        ]);
    }
}
