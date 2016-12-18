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
			$table->date('hannophoso');
			$table->string('soluongcantuyen');
			$table->integer('gioitinh');
			$table->integer('dotuoibatdau');
			$table->integer('dotuoiketthuc');
			$table->integer('chieucao');
			$table->integer('cannang');
			$table->integer('trinhdo');
			$table->integer('tinhtranghonnhan');
			$table->integer('nghetuyen');
			$table->integer('ngoaingu');
			$table->integer('thoigianhopdong');

			$table->integer('loaihinhthoigian');
			$table->string('luongthuclinh');
			$table->string('luonghopdong');
			$table->integer('tangca');

			$table->date('thoigiansotuyen');
			$table->date('thoigianthituyen');

			$table->string('dukienxuatcanh');

			$table->string('tencongty');
			$table->string('diachi');
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