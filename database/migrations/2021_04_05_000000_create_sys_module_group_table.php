<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysModuleGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_module_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
            $table->string('parent_id')->nullable();
            $table->string('fa_icon')->nullable();
            $table->string('group_name')->nullable();
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
		Schema::drop('sys_module_group');
	}

}
