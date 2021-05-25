<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTGoodsIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_goods_issue', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->nullable();
            $table->string('reference_type', 50)->nullable();
            $table->date('date')->nullable();
            $table->unsignedBigInteger('warehouse_id')->nullable();
            $table->string('notes', 255)->nullable();
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
