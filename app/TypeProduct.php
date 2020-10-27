<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $fillable = [
        'description'
    ];

    protected $hidden = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $table = 'type_productsp4';
}
