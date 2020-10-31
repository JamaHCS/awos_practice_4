<?php

namespace App\Http\Controllers;

use App\Offers;
use App\Product;
use App\TypeProduct;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offers::all();

        return view('index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        if ($request->product_id == "Selecciona...") {
            return back()->with('status', 'Datos invalidos');
        }

        $offer = Offers::create($request->all());
        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offers = Offers::find($id);
        // dd($offers);
        $products = Product::all();
        return view('edit', compact('offers', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Request  $request
     * @param  \App\Offers
     * $offers = Offers::find($offers); $of
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offers  $offers
     * @return \Illuminate\Http\Response
     */
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
