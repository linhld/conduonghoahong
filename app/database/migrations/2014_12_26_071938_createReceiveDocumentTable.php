<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiveDocumentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('receive_documents', function($table)
		{
			$table->increments('id');
			$table->string('document_code');
			$table->string('from_department');
			$table->string('from_staff');
			$table->string('title');
			$table->text('content');
			$table->string('short_content');
			$table->datetime('time_send');
			$table->datetime('time_receive');

			$table->integer('to_department')->default(0);
			$table->integer('to_staff')->default(0);

			$table->integer('document_type')->default(0);
			//Tao truong created_at va update_at cho bang nay
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
		Schema::drop('receive_documents');
	}
}