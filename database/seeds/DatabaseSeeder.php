<?php

use App\Offers;
use App\Product;
use App\TypeProduct;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TypeProduct::create(['description' => 'Frituras']);
        TypeProduct::create(['description' => 'Dulces']);
        TypeProduct::create(['description' => 'Cervezas']);

        Product::create(['name' => 'Ruffles picante', 'type_product_id' => 1]);
        Product::create(['name' => 'Chetos bolita', 'type_product_id' => 1]);
        Product::create(['name' => 'Dulcigomas', 'type_product_id' => 2]);
        Product::create(['name' => 'Gomitas de aro', 'type_product_id' => 2]);
        Product::create(['name' => 'Tecate Light', 'type_product_id' => 3]);
        Product::create(['name' => 'Corona', 'type_product_id' => 3]);

        Offers::create(['price' => 10, 'existence' => 100, 'vigence' => true, 'product_id' => 1]);
        Offers::create(['price' => 10, 'existence' => 100, 'vigence' => true, 'product_id' => 3]);
        Offers::create(['price' => 16, 'existence' => 100, 'vigence' => true, 'product_id' => 6]);
    }
}
