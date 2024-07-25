<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pro extends Model
{
    use HasFactory;
    protected $table = 'pros';
    protected $fillable = ['product_id', 'pro'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
