<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offersp4', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->float('price')->default(0);
            $table->integer('existence')->default(0);
            $table->boolean('vigence')->default(false);
            $table->timestamps();

            $table->bigInteger('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('productsp4');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offersp4');
    }
}
