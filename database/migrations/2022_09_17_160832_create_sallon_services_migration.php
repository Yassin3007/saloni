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
        Schema::create('sallon_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sallon_id')->nullable();
            $table->foreign('sallon_id')->references('id')->on('sallons')->onDelete('cascade');
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->float('price')->nullable();
            $table->unique(['sallon_id','service_id']);
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
        Schema::dropIfExists('sallon_services');
    }
};
