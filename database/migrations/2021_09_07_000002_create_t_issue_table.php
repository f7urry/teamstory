<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTIssueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_issue', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->integer('history_count')->default(0);
            $table->integer('project_id');
            $table->integer('created_by');
            $table->integer('updated_by');
			$table->string('subject')->nullable();
			$table->text('description')->nullable();
			$table->date('due_date')->nullable();
			$table->string('attachment_1')->nullable();
			$table->string('attachment_2')->nullable();
			$table->string('attachment_3')->nullable();
			$table->string('attachment_4')->nullable();
			$table->string('attachment_5')->nullable();
            $table->string('status')->default("WAITING");
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('t_issue');
	}

}
