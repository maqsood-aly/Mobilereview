<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = ['review_text'];


    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
