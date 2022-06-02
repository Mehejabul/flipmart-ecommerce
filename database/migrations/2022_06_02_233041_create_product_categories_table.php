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
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('pro_cate_id');
            $table->string('pro_cate_name');
            $table->integer('pro_cate_parent')->nullable();
            $table->string('pro_cate_icon',50)->nullable();
            $table->string('pro_cate_image',50)->nullable();
            $table->integer('pro_cate_order')->nullable();
            $table->integer('pro_cate_creator');
            $table->integer('pro_cate_editor');
            $table->string('pro_cate_slug');
            $table->integer('pro_cate_status')->default(1);
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
        Schema::dropIfExists('product_categories');
    }
};
