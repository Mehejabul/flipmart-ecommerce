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
        Schema::create('cupons', function (Blueprint $table) {
            $table->bigIncrements('cupon_id');
            $table->string('cupon_title',100)->nullable();
            $table->string('cupon_code',50)->nullable();
            $table->date('cupon_starting')->nullable();
            $table->date('cupon_ending')->nullable();
            $table->string('cupon_remarks',250)->nullable();
            $table->integer('cupon_creator')->nullable();
            $table->integer('cupon_editor')->nullable();
            $table->string('cupon_slug')->uniqid();
            $table->integer('cupon_status')->default(1);
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
        Schema::dropIfExists('cupons');
    }
};
