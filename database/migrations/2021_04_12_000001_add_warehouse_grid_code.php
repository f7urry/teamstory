<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWarehouseGridCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('r_ledger_summary', function (Blueprint $table) {
            $table->string("grid_code")->nullable();
        });
        Schema::table('r_ledger_detail', function (Blueprint $table) {
            $table->string("grid_code")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('r_ledger_summary', function (Blueprint $table) {
            $table->dropColumn("grid_code");
        });
        Schema::table('r_ledger_detail', function (Blueprint $table) {
            $table->dropColumn("grid_code");
        });
    }
}
