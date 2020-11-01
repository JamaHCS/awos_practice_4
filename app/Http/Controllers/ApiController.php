<?php

namespace App\Http\Controllers;

use App\Offers;
use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function offers()
    {
        $offers = Offers::all();

        foreach ($offers as $offer) {
            $offer->product = $offer->product()->get()[0];
            $offer->product->type = TypeProduct::find($offer->product->type_product_id);
        }

        return json_encode($offers);
    }

    public function offer($id)
    {
        $offer = Offers::find($id);
        $offer->product = $offer->product()->get()[0];
        $offer->product->type = TypeProduct::find($offer->product->type_product_id);

        return json_encode($offer);
    }

    public function products()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->type = TypeProduct::find($product->type_product_id);
        }
        return json_encode($products);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $product->type = TypeProduct::find($product->type_product_id);

        return json_encode($product);
    }
}
