<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRoleAccessPermissionTable extends Migration {
	public function up()
	{
		Schema::create('sys_role_access_permission', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('role_access_id');
			$table->integer('module_id');
            $table->integer("is_read");
            $table->integer("is_create");
            $table->integer("is_delete");
            $table->integer("is_update");
            $table->integer("status");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
            $table->integer("created_by")->nullable();
		});
	}

	public function down()
	{
		Schema::drop('sys_role_access');
	}

}
