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
        Schema::create('sallon_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sallon_id')->nullable();
            $table->foreign('sallon_id')->references('id')->on('sallons')->onDelete('cascade');
            $table->string('image');
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
        Schema::dropIfExists('sallon_images');
    }
};
