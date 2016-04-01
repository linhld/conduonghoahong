<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentTypesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('document_types', function($table)
		{
			$table->increments('id');
			$table->string('name');
		});

		DB::table('document_types')->insert(array(
												array('name' => 'Chưa phân loại'),
												array('name' => 'Luật'),
												array('name' => 'Pháp lệnh'),
												array('name' => 'Nghị định'),
												array('name' => 'Chỉ thị'),
												array('name' => 'Thông tư'),
												array('name' => 'Thông báo')
											));
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('document_types');
	}
}