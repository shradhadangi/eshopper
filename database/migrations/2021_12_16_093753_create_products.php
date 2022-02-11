<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducts extends Migration
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
            $table->integer('category_id');
            $table->integer('subcat_id');
            $table->string('name');
            $table->string('sku_id');
            $table->string('price');
            $table->text('short_description')->nullable();
            $table->text('delivery_detail')->nullable();
            $table->text('shipping_detail')->nullable();
            $table->text('size_guide')->nullable();
            $table->mediumText('product_description')->nullable();
            $table->text('cms')->nullable();
            $table->string('image');
            $table->text('size')->nullable();
            $table->text('colors')->nullable();
            $table->string('status')->default('Enabled');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('products');
    }
}
