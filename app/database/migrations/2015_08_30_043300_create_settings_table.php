<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company');
            $table->string('logo');
            $table->string('sologan');
            $table->text('silde_images');
            $table->text('description');
            $table->string('map_position');
            $table->string('email_1', 50);
            $table->string('email_2', 50);
            $table->string('address', 100);
            $table->string('phone_number_1', 20);
            $table->string('phone_number_2', 20);
            $table->string('hotline_1', 20);
            $table->string('hotline_2', 20);
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
		Schema::drop('settings');
	}

}
