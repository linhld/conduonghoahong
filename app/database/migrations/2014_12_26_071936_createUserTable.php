<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
			$table->increments('id');
			$table->string('username',50);
			$table->string('password', 100);
			$table->integer('role');
			//RememberToken dung de ghi nho thong tin
			//Giup user lan sau vao co the dang nhap luon
			$table->rememberToken();
			//Tao truong created_at va update_at cho bang nay
			$table->timestamps();
		});
		//tao moi user Admin de quan li luc dau
		$user = new User();

		$user->username = "admin";
		$user->password = Hash::make("admin");
		$user->role = Config::get("user.role")["admin"];

		$user->save();
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('users');
	}
}