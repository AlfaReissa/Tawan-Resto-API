<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_invoices', function (Blueprint $table) {
            $table->id();
            $table->string("address")->nullable();
            $table->float("lat")->nullable();
            $table->float("long")->nullable();
            $table->string("photo_payment_path")->nullable();
            $table->longText("notes")->nullable();
            $table->text("status")->nullable();
            $table->longText("metode_bayar")->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_resto')->nullable();
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
        Schema::dropIfExists('food_invoices');
    }
}
