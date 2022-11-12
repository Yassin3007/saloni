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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('type');
            $table->string('code');
            $table->tinyInteger('is_owner');
            $table->tinyInteger('is_active');
            $table->integer('points')->default(0);
            $table->tinyInteger('write')->default(0);
            $table->unsignedBigInteger('invitor_id')->nullable();
            $table->foreign('invitor_id')->references('id')->on('users')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
