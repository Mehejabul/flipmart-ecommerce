<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name',200);
            $table->integer('pro_cate_id');
            $table->integer('brand_id');
            $table->string('product_price');
            $table->string('product_discount_price')->nullable();
            $table->string('product_unit');
            $table->string('product_quantity');
            $table->longText('product_details')->nullable();
            $table->longText('product_description')->nullable();
            $table->string('product_image',50)->nullable();
            $table->text('product_gallery')->nullable();
            $table->integer('product_feature')->default(0);
            $table->integer('product_order')->nullable();
            $table->integer('product_creator');
            $table->integer('product_editor')->nullable();
            $table->string('product_slug')->nullable();
            $table->integer('product_status')->default(1);
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
};
