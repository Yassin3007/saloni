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
        Schema::create('sallons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('owner_id')->nullable()->unique();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('rent_contract')->nullable();
            $table->string('commercial_register')->nullable();
            $table->text('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->time('open_at');
            $table->time('close_at');
            $table->time('rest_start')->nullable();
            $table->time('rest_end')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->tinyInteger('is_active');
            $table->integer('level')->nullable();
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
        Schema::dropIfExists('sallons');
    }
};
