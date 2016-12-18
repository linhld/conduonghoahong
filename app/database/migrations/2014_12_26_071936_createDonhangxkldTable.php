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
			$table->date('hannophoso')->nullable();
			$table->string('soluongcantuyen')->nullable();
			$table->integer('gioitinh')->nullable();
			$table->integer('dotuoibatdau')->nullable();
			$table->integer('dotuoiketthuc')->nullable();
			$table->integer('chieucao')->nullable();
			$table->integer('cannang')->nullable();
			$table->integer('trinhdo')->nullable();
			$table->integer('tinhtranghonnhan')->nullable();
			$table->integer('nghetuyen')->nullable();
			$table->integer('ngoaingu')->nullable();
			$table->integer('thoigianhopdong')->nullable();

			$table->integer('loaihinhthoigian')->nullable();
			$table->string('luongthuclinh')->nullable();
			$table->string('luonghopdong')->nullable();
			$table->integer('tangca')->nullable();

			$table->date('thoigiansotuyen')->nullable();
			$table->date('thoigianthituyen')->nullable();
			$table->string('hannophoso')->nullable();

			$table->string('dukienxuatcanh')->nullable();

			$table->string('tencongty')->nullable();
			$table->string('diachi')->nullable();
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