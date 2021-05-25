<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysModuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_module', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('path');
            $table->string('fa_icon');
            $table->string('group_id');
            $table->integer('is_menu')->default(1);
            $table->integer("status")->nullable();
            $table->integer('menu_index')->default(0);
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent();
            $table->integer("created_by")->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_module');
	}

}
