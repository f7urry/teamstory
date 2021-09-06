<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSysUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sys_users', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('username')->nullable();
			$table->string('name')->nullable();
			$table->string('email')->nullable()->unique('users_email_unique');
			$table->dateTime('email_verified_at')->nullable();
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->string('avatar')->nullable()->default('/assets/app/img/user.png');
			$table->integer('status')->nullable()->default(0);
			$table->timestamps();
			$table->string('api_token')->nullable();
			$table->integer('level')->nullable()->default(10);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sys_users');
	}

}
