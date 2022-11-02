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
            $table->string('pemesanan');
            $table->integer('total');
            $table->string('status');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE order_shop ADD bukti MEDIUMBLOB null");
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
