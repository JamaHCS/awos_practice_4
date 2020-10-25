<?php

namespace App;

use App\Offers;
use App\TypeProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'type_product_id'
    ];

    protected $hidden = [];

    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class);
    }

    public function offer()
    {
        return $this->hasOne(Offers::class);
    }
}
