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
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->float('tax_1')->default('0');
            $table->float('tax_2')->default('0');
            $table->float('tax_3')->default('0');
            $table->float('tax_4')->default('0');
            $table->integer('level_1')->default('10');
            $table->integer('level_2')->default('20');
            $table->integer('level_3')->default('30');
            $table->integer('level_4')->default('40');
            $table->integer('loyalty')->default('5');
            $table->integer('referral')->default('5');
            $table->text('about')->nullable();
            $table->text('privacy')->nullable();

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
        Schema::dropIfExists('values');
    }
};
