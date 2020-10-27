<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $fillable = [
        'price',
        'existence',
        'vigence',
        'product_id'
    ];

    protected $hidden = [];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    protected $table = 'offersp4';
}
