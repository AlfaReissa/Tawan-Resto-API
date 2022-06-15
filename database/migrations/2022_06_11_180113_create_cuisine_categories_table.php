<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuisineCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuisine_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resto')->nullable();
            $table->string("name")->nullable();
            $table->string("desc")->nullable();
            $table->string("thumbnail")->nullable();
            $table->string("thumbnail2")->nullable();
            $table->foreign('id_resto')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('cuisine_categories');
    }
}
