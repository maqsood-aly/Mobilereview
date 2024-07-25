<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batteries extends Model
{
    use HasFactory;
    protected $table = 'batteries';
    protected $fillable = ['product_id', 'capacity'];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    
}
