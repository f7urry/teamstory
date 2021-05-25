<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGoodsGridCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_goods_issue', function (Blueprint $table) {
            $table->string("grid_code")->nullable()->after("warehouse_id");
        });
        Schema::table('t_goods_receipt', function (Blueprint $table) {
            $table->string("grid_code")->nullable()->after("warehouse_id");
        });
        Schema::table('t_stock', function (Blueprint $table) {
            $table->string("grid_code")->nullable()->after("warehouse_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('t_goods_issue', function (Blueprint $table) {
            $table->dropColumn("grid_code");
        });
        Schema::table('t_goods_receipt', function (Blueprint $table) {
            $table->dropColumn("grid_code");
        });
        Schema::table('t_stock', function (Blueprint $table) {
            $table->dropColumn("grid_code");
        });
    }
}
