<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMPartyAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_party_address', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('party_id')->nullable();
			$table->string('address_type')->nullable();
			$table->string('pic_name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('address')->nullable();
			$table->string('city_id')->nullable();
			$table->string('province_id')->nullable();
			$table->string('zip_code')->nullable();
			$table->integer('created_by')->nullable();
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
		Schema::drop('m_party_address');
	}

}
