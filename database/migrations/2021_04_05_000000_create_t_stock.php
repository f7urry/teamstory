<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTStock extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('t_stock', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('barcode');
            $table->integer('warehouse_id');
			$table->integer('item_id');
            $table->integer('qty')->nullable();
            $table->integer('item_register_id')->nullable();
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
		Schema::drop('t_stock');
	}

}
