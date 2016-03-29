<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartMentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('departments', function($table)
		{
			$table->increments('id');
			$table->string('name',50);
			//Tao truong created_at va update_at cho bang nay
			$table->timestamps();
		});

		//tao moi user Admin de quan li luc dau
		$department = new Department();

		$department->name = "Không có phòng ban";

		$department->save();
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('departments');
	}
}