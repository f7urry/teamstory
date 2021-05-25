<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRLedgerSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('r_ledger_item');
        Schema::create('r_ledger_summary', function (Blueprint $table) {
            $table->id();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();            
            $table->string('barcode', 100)->nullable();
            $table->integer('item_id')->nullable();
            $table->string('item_name', 100)->nullable();
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
        Schema::dropIfExists('r_ledger_summary');
    }
}
