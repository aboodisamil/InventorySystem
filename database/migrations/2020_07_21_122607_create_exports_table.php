<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exports', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('store_id')->unsigned()->nullable();
            $table->bigInteger('customer_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->dateTime('dateTime')->nullable();
            $table->string('notes')->nullable();
            $table->string('status')->default('2');
            $table->bigInteger('total_price')->default(0);
            $table->timestamps();
            $table->foreign('store_id')->on('stores')->references('id')->cascadeOnDelete();
            $table->foreign('customer_id')->on('customers')->references('id')->cascadeOnDelete();
            $table->foreign('user_id')->on('users')->references('id')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('exports');
    }
}
