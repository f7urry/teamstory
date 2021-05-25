<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDriver extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('m_party', function(Blueprint $table)
		{
            $table->string('image_id',255)->nullable();
            $table->string('image_party',255)->nullable();
            $table->string('identity_number',255)->nullable();
            $table->date('dob')->nullable();
            $table->string('pob',255)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('m_party',function(Blueprint $table){
            $table->dropColumn("image_id");
            $table->dropColumn("image_party");
            $table->dropColumn("identity_number");
            $table->dropColumn("dob");
            $table->dropColumn("pob");
        });
	}

}
