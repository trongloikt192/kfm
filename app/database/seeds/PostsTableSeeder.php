<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('posts')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Post::create([
				'title' => $faker->sentence(10),
				'content_vi' => $faker->text(500),
				'content_en' => $faker->text(500),
				'slug' => $faker->slug,
				'image' => $faker->imageUrl(640, 480),
				'description' => $faker->paragraph(3),
				'status' => false,
				'user_id' => $faker->numberBetween(1, 10),
				'category_id' => $faker->numberBetween(1, 10)
			]);
		}
	}

}