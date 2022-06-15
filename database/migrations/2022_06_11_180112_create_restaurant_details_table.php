<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resto')->nullable();
            $table->foreign('id_resto')->references('id')->on('users')->onDelete('set null');
            $table->longText('resto_name')->nullable();
            $table->longText('resto_category')->nullable();
            $table->longText('resto_description')->nullable();
            $table->longText('resto_address')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->longText('thumbnail')->nullable();
            $table->longText('icon')->nullable();
            $table->boolean("is_visible")->nullable()->default(1);
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
        Schema::dropIfExists('restaurant_details');
    }
}
