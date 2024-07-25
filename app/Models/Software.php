<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'operating_system','ui'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
