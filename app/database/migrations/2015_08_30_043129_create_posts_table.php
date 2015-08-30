<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('content_vi');
			$table->text('content_en');
			$table->string('slug');
			$table->string('image');
			$table->text('description');
			$table->string('status', 50);
			$table->integer('user_id')->unsigned()->index();
			$table->integer('category_id')->unsigned()->index();
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
		Schema::drop('posts');
	}

}
