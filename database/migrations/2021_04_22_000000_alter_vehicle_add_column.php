<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehicleAddColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('m_vehicle', function(Blueprint $table)
		{
            $table->string('unique_code',100)->nullable();
		});
        Schema::table('t_vehicle_booking', function(Blueprint $table)
		{
            $table->integer('odometer_start')->nullable();
            $table->integer('odometer_end')->nullable();

            $table->dateTime('date_from')->nullable()->change();
            $table->dateTime('date_to')->nullable()->change();
            $table->dateTime('date_start')->nullable()->change();
            $table->dateTime('date_end')->nullable()->change();
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
            $table->dropColumn("unique_code");
        });
        Schema::table('t_vehicle_booking',function(Blueprint $table){
            $table->dropColumn("odometer_start");
            $table->dropColumn("odometer_end");

            $table->date('date_from')->nullable()->change();
            $table->date('date_to')->nullable()->change();
            $table->date('date_start')->nullable()->change();
            $table->date('date_end')->nullable()->change();
        });
	}

}
