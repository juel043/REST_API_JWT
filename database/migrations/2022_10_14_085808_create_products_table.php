<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
   
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('location_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcatagory_id');
            $table->string('sku');
            $table->integer('price');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
  
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
