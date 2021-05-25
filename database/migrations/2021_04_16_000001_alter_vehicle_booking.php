<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehicleBooking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('t_vehicle_booking', function(Blueprint $table)
		{
            $table->string('request_by',255)->nullable();
            $table->string('destination',100)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('t_vehicle_booking',function(Blueprint $table){
            $table->dropColumn("request_by");
            $table->dropColumn("destination");

        });
	}

}
