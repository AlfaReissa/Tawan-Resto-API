<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resto')->nullable();
            $table->unsignedBigInteger('id_cuisine')->nullable();
            $table->string("name")->nullable();
            $table->string("desc")->nullable();
            $table->decimal('price', $precision = 10, $scale = 2);
            $table->string("thumbnail")->nullable();
            $table->string("thumbnail2")->nullable();
            $table->foreign('id_resto')->references('id')->on('users')->onDelete('set null');
            $table->foreign('id_cuisine')->references('id')->on('cuisine_categories')->onDelete('set null');
            $table->boolean("is_visible")->nullable()->default(1);
            $table->boolean("is_available")->nullable()->default(1);
            $table->text("notes")->nullable()->default("");
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
        Schema::dropIfExists('food_menus');
    }
}
