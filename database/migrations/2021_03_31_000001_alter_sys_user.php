<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterSysUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('sys_users', function (Blueprint $table) {
            $table->string('api_token', 255)->nullable();
            $table->integer('level')->nullable()->default(10);

            $table->dropColumn(['role']);
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('sys_users', function (Blueprint $table) {
            $table->dropColumn(['api_token', 'level']);
            $table->string('role')->nullable()->default('ROLE_USER');
        });
	}

}
