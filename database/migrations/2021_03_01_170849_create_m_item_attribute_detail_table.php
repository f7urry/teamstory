<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemAttributeDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_item_attribute_detail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('item_attribute_id')->nullable();
			$table->string('attribute_code')->nullable();
			$table->string('attribute_value')->nullable();
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
		Schema::drop('m_item_attribute_detail');
	}

}
