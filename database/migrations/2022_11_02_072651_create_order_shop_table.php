<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shop', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('total');
            $table->string('status')->nullable();
            $table->string('bukti')->nullable();
            $table->string('id_detail')->nullable();
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
        Schema::table('order_shop', function (Blueprint $table) {
            //
        });
    }
}
