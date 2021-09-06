<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRoleAccessPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_role_access_permission', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_access_id');
			$table->integer('module_id');
			$table->integer('is_read');
			$table->integer('is_create');
			$table->integer('is_delete');
			$table->integer('is_update');
			$table->integer('status');
			$table->timestamps();
			$table->integer('created_by')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_role_access_permission');
	}

}
