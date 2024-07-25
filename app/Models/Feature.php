<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Feature extends Model
{
    protected $fillable = ['product_id', 'feature_key', 'feature_value', 'feature_icon'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_feature', 'feature_id', 'product_id');
    }
    public function product_features()
    {
        return $this->hasMany(Product_feature::class, 'feature_id');
    }
}
