<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysRoleAccessTable extends Migration {

	public function up()
	{
		Schema::create('sys_role_access', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->integer('access_type')->default(10);
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
