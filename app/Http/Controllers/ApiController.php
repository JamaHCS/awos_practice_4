<?php

namespace App\Http\Controllers;

use App\Offers;
use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Offer as OffersRequest;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('consults');
        // $this->middleware('guest');
    }

    public function index()
    {
        $offers = Offers::all();



        foreach ($offers as $offer) {
            $offer->product = $offer->product()->get()[0];
            $offer->product->type = TypeProduct::find($offer->product->type_product_id);
        }

        // $offers['token'] = Session::token();

        return response()->json($offers);
    }

    public function show($id)
    {
        $offer = Offers::find($id);
        $offer->product = $offer->product()->get()[0];
        $offer->product->type = TypeProduct::find($offer->product->type_product_id);

        return response()->json($offer);
    }

    public function store(Request $request)
    {
        $offer = Offers::create($request->all());

        return response()->json($offer, 201);
    }

    public function update(Request $request, $id)
    {
        $offer = Offers::find($id);

        $product_id = (isset($request->product_id)) ? $request->product_id : $offer->product_id;
        $price = (isset($request->price)) ? $request->price : $offer->price;
        $existence = (isset($request->existence)) ? $request->existence : $offer->existence;

        $offer->update([
            'product_id' => $product_id,
            'price' => $price,
            'existence' => $existence
        ]);

        return response()->json($offer, 201);
    }

    public function destroy($id)
    {
        $offer = Offers::find($id);
        $offer->delete();

        return response()->json(null, 204);
    }

    public function products()
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->type = TypeProduct::find($product->type_product_id);
        }

        return response()->json($products);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $product->type = TypeProduct::find($product->type_product_id);

        return response()->json($product);
    }

    public function getType(Product $product)
    {
        $typeProduct = $product->typeProduct()->get();
        return response()->json($typeProduct);
    }

    public function switchVigence($id)
    {
        // dd($request);
        $offer = Offers::find($id);
        $offer->update(['vigence' => !$offer->vigence]);

        return response()->json($offer, 201);
    }
}
