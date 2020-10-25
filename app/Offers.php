<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [
        'price',
        'existence',
        'vigence'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
