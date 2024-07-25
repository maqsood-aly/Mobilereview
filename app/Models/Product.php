<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'price', 'brand_id', 'model_id', 'title', 'review_title', 'review_text', 
        'overview_title', 'overview_text', 'release_date', 'launched_in_pakistan', 'dimensions', 'weight', 'sim_type', 
        'colours', 'soc', 'gpu', 'cpu', 'ram', 'storage', 'operating_system', 'ui', 'no_of_rear_cameras', 
        'rear_cameras', 'rear_flash', 'periscope', 'no_of_front_cameras', 'front_camera', 'battery_capacity', 
        'accelerometer', 'gyroscope', 'compass', 'fingerprint', 'bluetooth', 'wifi', 'nfc', '2g', '3g', '4g', '5g','status'
    ];

    // Keeping the relationships for brand and model
    public function brand() {
        return $this->belongsTo(Brand::class);
    }
    
    public function model() {
        return $this->belongsTo(Models::class);
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    // Remove relationships for fields that are directly part of the products table
    // public function ram() {
    //     return $this->belongsTo(Ram::class);
    // }

    // public function sensor() {
    //     return $this->hasOne(Sensors::class);
    // }

    // public function battery() {
    //     return $this->hasOne(Batteries::class);
    // }

    // public function camera() {
    //     return $this->hasOne(Cameras::class);
    // }

    // public function connectivity() {
    //     return $this->hasOne(Connectivity::class);
    // }

    // public function display() {
    //     return $this->hasOne(Displays::class);
    // }

    // public function hardware() {
    //     return $this->hasOne(Hardware::class);
    // }

    // public function software() {
    //     return $this->hasOne(Software::class);
    // }

    public function features() {
        return $this->belongsToMany(Feature::class, 'product_feature', 'product_id', 'feature_id');
    }

    public function review() {
        return $this->belongsTo(Review::class);
    }

    public function pros() {
        return $this->hasMany(Pro::class);
    }

    public function cons() {
        return $this->hasMany(Cons::class);
    }

    // Boot method to handle creating and updating events
    protected static function boot() {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = static::createSlug($product->name);
        });

        static::updating(function ($product) {
            $product->slug = static::createSlug($product->name);
        });
    }

    // Method to create slug
    protected static function createSlug($name) {
        // Create a slug from the name
        $slug = Str::slug($name);

        // Check if the slug already exists
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();

        // Append number to the slug if it already exists
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
