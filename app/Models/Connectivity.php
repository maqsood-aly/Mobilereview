<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connectivity extends Model
{
    use HasFactory;
    protected $table = 'connectivity';
    protected $fillable = ['product_id', 'bluetooth', 'wifi', 'nfc', 'connectivity_2g','connectivity_3g', 'connectivity_4g', 'connectivity_5g'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
