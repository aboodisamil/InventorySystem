<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->unsigned();
            $table->string('quantity');
            $table->integer('num_of_box');
            $table->string('manufacturer');
            $table->integer('num_of_package_in_box');
            $table->integer('num_of_Piece_in_package');
            $table->integer('price_by_piece');
            $table->integer('price_by_package');
            $table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('product_id')->on('products')->references('id')->cascadeOnDelete();
            $table->foreign('category_id')->on('categories')->references('id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imports');
    }
}
