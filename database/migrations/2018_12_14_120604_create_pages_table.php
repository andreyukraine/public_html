<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name_ua');
            $table->text('url');
            $table->text('name_ru');
            $table->text('name_en');
            $table->text('title');
            $table->text('active');
            $table->text('desc');
            $table->text('meta');
            $table->text('keywords_ua');
            $table->text('keywords_ru');
            $table->text('keywords_en');
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
        Schema::dropIfExists('pages');
    }
}
