<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username', 50)->unique();
            $table->string('password');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('email', 50)->unique();
            $table->string('address');
            $table->string('phone_number');
            $table->boolean('activated')->default(false);
            $table->string('activation_code', 32);
            $table->rememberToken();
            $table->softDeletes();
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
		Schema::drop('users');
	}

}
