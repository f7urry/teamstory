<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehicle extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('m_vehicle', function(Blueprint $table)
		{
            $table->string('color',100)->nullable();
            $table->string('manufacture_year',100)->nullable();
            $table->string('engine_number',100)->nullable();
            $table->string('vehicle_image',255)->nullable();
            $table->string('vehicle_idnumber',100)->nullable();
            $table->string('vehicle_cert',100)->nullable();
            $table->string('driver_id',100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('m_vehicle',function(Blueprint $table){
            $table->dropColumn("color");
            $table->dropColumn("manufacture_year");
            $table->dropColumn("engine_number");
            $table->dropColumn("vehicle_image");
            $table->dropColumn("vehicle_idnumber");
            $table->dropColumn("vehicle_cert");
            $table->dropColumn("driver_id");

        });
	}

}
