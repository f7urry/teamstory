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
			$table->string('party_role')->nullable();
			$table->string('party_name')->nullable();
			$table->string('company_name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('zip_code')->nullable();
			$table->bigInteger('country_id')->nullable();
			$table->bigInteger('city_id')->nullable();
			$table->integer('user_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
