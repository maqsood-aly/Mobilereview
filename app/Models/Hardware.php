<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','soc','cpu','gpu','ram','storage'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
