<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMItemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_item', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code')->nullable();
			$table->string('item_name')->nullable();
			$table->string('item_alias')->nullable();
			$table->string('description')->nullable();
			$table->integer('uom_id')->nullable();
			$table->decimal('sell_price', 10)->nullable();
			$table->integer('item_group_id')->nullable();
			$table->integer('is_variant')->nullable()->default(0);
			$table->integer('item_parent_id')->nullable();
			$table->string('item_type')->nullable()->default('PRODUCT');
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
		Schema::drop('m_item');
	}

}
