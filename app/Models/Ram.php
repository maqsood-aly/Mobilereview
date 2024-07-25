<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Ram extends Model
{
    use HasFactory;
    protected $table = 'rams';
    protected $fillable = ['size'];

       public function products()
    {
        return $this->hasMany(Product::class);
    }
}
