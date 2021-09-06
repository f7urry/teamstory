composer <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMGeographicTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('m_geographic', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('code')->nullable();
			$table->string('location')->nullable();
			$table->integer('parent_id')->nullable();
			$table->integer('level')->nullable();
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
		Schema::drop('m_geographic');
	}

}
