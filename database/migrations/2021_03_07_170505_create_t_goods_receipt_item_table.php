<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodsReceiptItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_goods_receipt_item', function (Blueprint $table) {
            $table->id();
            $table->string("barcode")->nullable();
            $table->unsignedBigInteger('goods_receipt_id');
            $table->unsignedBigInteger('item_id');
            $table->decimal('quantity', 10)->nullable();
            $table->unsignedBigInteger('uom_id');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_goods_receipt_item');
    }
}
