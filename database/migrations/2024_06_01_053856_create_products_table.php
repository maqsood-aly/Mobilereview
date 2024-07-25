<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image_url');
            $table->string('image_alt')->nullable();
            $table->string('slug');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keywords');
            $table->text('review_section');
            $table->text('overview_section');
        

            // generals
            $table->string('price'); 
            $table->date('release_date');
            $table->boolean('launched_in_pakistan'); 
            $table->string('dimensions'); 
            $table->integer('weight');
            $table->string('sim_type'); 
            $table->string('colours');

            // model and brand
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('brand_id');

            // Hardware
            $table->string('soc');
            $table->string('gpu');
            $table->string('cpu');
            $table->string('ram');
            $table->string('storage');

            // display
            $table->string('screen_size'); 
            $table->string('type');  
            $table->string('resolution');  
            $table->integer('pixel_density');  
            $table->integer('refresh_rate');  
            $table->string('quality');  
            $table->string('glass_protection');
            $table->string('display_colours');

            // Software
            $table->string('operating_system');
            $table->string('ui');

            // Cameras
            $table->integer('no_of_rear_cameras');
            $table->string('rear_cameras');
            $table->boolean('rear_flash');
            $table->boolean('periscope');
            $table->integer('no_of_front_cameras');
            $table->string('front_camera');

            // Battery
            $table->string('battery_capacity');

            // Sensors
            $table->boolean('accelerometer');
            $table->boolean('gyroscope');
            $table->boolean('compass');
            $table->boolean('fingerprint');

            // Connectivity
            $table->string('bluetooth');
            $table->string('wifi');
            $table->boolean('nfc');
            $table->boolean('_2g');
            $table->boolean('_3g');
            $table->boolean('_4g');
            $table->boolean('_5g');
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
