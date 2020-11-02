<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class TypeProduct extends Model
{
    protected $fillable = [
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected $hidden = ['created_at', 'updated_at'];


    protected $table = 'type_productsp4';
}
