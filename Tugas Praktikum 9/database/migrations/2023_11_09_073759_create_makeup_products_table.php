<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//migration itu struktur dats
class CreateMakeupProductsTable extends Migration
{
    public function up() //fungsi yg akan terjadi ketika kita migrate
    {
        Schema::create('makeup_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');  //string itu 255
            $table->text('description'); ///ini bisa lebih banyak 
            $table->string('brand');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps(); //create update
        });
    }

    public function down()
    {
        Schema::dropIfExists('makeup_products');
    }
}
