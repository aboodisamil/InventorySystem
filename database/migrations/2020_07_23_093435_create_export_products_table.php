<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_imports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('export_id')->unsigned();
            $table->bigInteger('import_id')->unsigned();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('status')->default('2');
            $table->integer('spent_quantity')->default(0);
            $table->timestamps();
            $table->foreign('export_id')->on('exports')->references('id')->cascadeOnDelete();
            $table->foreign('import_id')->on('imports')->references('id')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('export_products');
    }
}
