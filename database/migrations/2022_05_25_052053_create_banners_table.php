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
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('banner_id');
            $table->string('banner_title',100)->nullable();
            $table->text('banner_mid_title',100)->nullable();
            $table->text('banner_subtitle')->nullable();
            $table->string('banner_button',30)->nullable();
            $table->string('banner_url',190)->nullable();
            $table->string('banner_image',50)->nullable();
            $table->integer('banner_order')->nullable();
            $table->integer('banner_publish')->default(0);
            $table->integer('banner_creator')->nullable();
            $table->integer('banner_editor')->nullable();
            $table->string('banner_slug',40)->nullable();
            $table->integer('banner_status')->default(1);
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
        Schema::dropIfExists('banners');
    }
};
