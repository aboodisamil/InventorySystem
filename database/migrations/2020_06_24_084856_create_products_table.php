<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->bigInteger('category_id')->unsigned();
//            $table->bigInteger('product_location_id')->unsigned();
            $table->integer('num_of_box');
            $table->integer('num_of_package_in_box');
            $table->integer('num_of_Piece_in_package');
            $table->integer('price_by_piece');
            $table->integer('price_by_package');
            $table->string('manufacturer');
            $table->bigInteger('unit_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
            $table->foreign('unit_id')->on('units')->references('id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
