<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRLedgerItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_ledger_item', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->integer('item_id')->nullable();
            $table->string('item_name', 100)->nullable();
            $table->integer('reference_id')->nullable();
            $table->string('reference_no', 100)->nullable();
            $table->string('reference_type', 100)->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->string('warehouse_name', 100)->nullable();
            $table->integer('qty_in')->nullable();
            $table->integer('qty_out')->nullable();
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
        Schema::dropIfExists('t_goods_issue');
    }
}
