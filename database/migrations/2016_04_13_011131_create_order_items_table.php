<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id', false, true);
            $table->integer('item_id', false, true);
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function(Blueprint $table)
        {
            $table->dropForeign('order_items_item_id_foreign');
            $table->dropForeign('order_items_order_id_foreign');
        });
        Schema::drop('order_items');
    }
}
