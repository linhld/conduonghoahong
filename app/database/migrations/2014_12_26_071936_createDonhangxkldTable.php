<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangxkldTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('donhangxkld', function($table)
		{
			$table->increments('id');
			$table->integer('quocgia');
			$table->date('hannophoso');
			$table->string('tenngan');
			$table->string('mota');
			$table->string('soluongcantuyen');
			$table->integer('gioitinh');
			$table->integer('dotuoibatdau');
			$table->integer('dotuoiketthuc');
			$table->integer('chieucao');
			$table->integer('cannang');
			$table->integer('trinhdo');
			$table->integer('tinhtranghonnhan');
			$table->integer('nghetuyen');
			$table->integer('taynghe');

			$table->string('yeucaukhac');
			
			$table->integer('ngoaingu');
			$table->integer('thoigianhopdong');

			$table->string('loaihinhthoigian');
			$table->string('luongthuclinh');
			$table->string('luongcoban');
			$table->string('tangca');

			$table->string('chedokhac');

			$table->date('thoigiansotuyen');
			$table->date('thoigianthituyen');

			$table->string('hinhthucphongvan');

			$table->string('dukienxuatcanh');

			$table->string('tencongty');
			$table->string('diadiemlamviec');
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
		//
		Schema::drop('donhangxkld');
	}
}