<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPartyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_party', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->string('code')->nullable();
			$table->string('party_role')->nullable();
			$table->string('party_name')->nullable();
			$table->integer('address_id')->nullable();
			$table->integer('company_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->timestamps();
			$table->string('image_id')->nullable();
			$table->string('image_party')->nullable();
			$table->string('identity_number')->nullable();
			$table->date('dob')->nullable();
			$table->string('pob')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('m_party');
	}

}
