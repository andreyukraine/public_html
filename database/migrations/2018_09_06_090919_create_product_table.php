<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('active')->default(false);
            $table->text('sku')->nullable();
            $table->text('barcode');
            $table->text('name');
            $table->text('url');
            $table->text('meta')->nullable();
            $table->text('title')->nullable();
            $table->text('price')->nullable();
            $table->text('images');
            $table->text('desc')->nullable();
            $table->text('composition')->nullable();
            $table->text('dose')->nullable();
            $table->text('prev_desc')->nullable();
            $table->text('sort')->default(500);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
