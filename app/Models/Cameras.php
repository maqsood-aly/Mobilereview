<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cameras extends Model
{
    use HasFactory;
    protected $table = 'cameras';
    protected $fillable = ['product_id', 'no_of_rear_cameras', 'rear_camera_specs', 'rear_flash', 'periscope','no_of_front_cameras', 'front_camera_spec'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
