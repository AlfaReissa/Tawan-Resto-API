<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCartCacheMobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_cart_cache_mobiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_resto')->nullable();
            $table->unsignedBigInteger('id_menu')->nullable();
            $table->longText('notes')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_resto')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_menu')->references('id')->on('food_menus')->onDelete('cascade');
            $table->unique(['id_user', 'id_menu',]);
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
        Schema::dropIfExists('food_cart_cache_mobiles');
    }
}
