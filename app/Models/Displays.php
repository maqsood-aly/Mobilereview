<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Displays extends Model
{
    use HasFactory;
    protected $table = 'displays';
    protected $fillable = ['product_id', 'screen_size','type', 'resolution', 'pixel_density', 'refresh_rate','quality','glass_protection','display_colors'];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
