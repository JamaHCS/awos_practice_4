<?php

namespace App\Http\Controllers;

use App\Offers;
use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $offers = Offers::all();

        return view('index', compact('offers'));
    }

    public function create()
    {
        $products = Product::all();
        return view('create', compact('products'));
    }

    public function store(Request $request)
    {
        // dd($request);
        if ($request->product_id == "Selecciona...") {
            return back()->with('status', 'Datos invalidos');
        }

        $offer = Offers::create($request->all());
        return redirect()->route('index');
    }

    public function edit($id)
    {
        $offers = Offers::find($id);
        // dd($offers);
        $products = Product::all();
        return view('edit', compact('offers', 'products'));
    }

    public function update(Request $request, $offers)
    {
        if ($request->product_id == "Selecciona...") {
            return back()->with('status', 'Datos invalidos');
        }

        $offers = Offers::find($offers);
        $offers->update($request->all());

        if (!isset($request->all()['vigence'])) {
            $offers->update(['vigence' => 0]);
        }

        return redirect()->route('index');
    }

    public function destroy($offers)
    {
        $offers = Offers::find($offers);
        // dd($offers);
        $offers->delete();

        return back();
    }

    public function getType(Product $product)
    {
        $typeProduct = $product->typeProduct()->get();
        return json_encode($typeProduct);
    }
}
