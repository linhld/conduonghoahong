<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutDocumentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('out_documents', function($table)
		{
			$table->increments('id');
			//so cong van den
			$table->string('document_receive_code');
			//so cong van di
			$table->string('document_out_code');
			$table->string('from_department');
			$table->string('from_staff');
			$table->string('to_department');
			$table->string('to_staff');
			$table->string('title');
			$table->text('content');
			$table->string('short_content');
			$table->date('time_send');

			$table->integer('document_type')->default(0);
			$table->integer('status')->default(0);

			$table->integer('send_by');
			$table->integer('send_by_department');
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
		Schema::drop('out_documents');
	}
}