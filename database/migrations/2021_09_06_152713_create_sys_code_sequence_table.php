<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysCodeSequenceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_code_sequence', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('year')->nullable();
			$table->integer('month')->nullable();
			$table->string('prefix')->nullable();
			$table->integer('seq_number')->default(0);
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
		Schema::drop('sys_code_sequence');
	}

}
