<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('company', 50);
			$table->string('business_scope', 50);
            $table->string('delegate');
            $table->string('logo', 50);
            $table->string('domain', 50);
            $table->string('email', 50);
            $table->string('address');
            $table->string('phone_number');
            $table->string('description', 32);
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
		Schema::drop('customers');
	}

}
