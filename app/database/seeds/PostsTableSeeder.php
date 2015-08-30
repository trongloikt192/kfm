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
				'title' => $faker->sentences(1),
				'content_vi' => $faker->text(500),
				'content_en' => $faker->text(500),
				'slug' => $faker->slug,
				'image' => $faker->imageUrl(640, 480),
				'description' => $faker->sentences(2),
				'status' => $faker->numberBetween(0, 1),
				'user_id' => $faker->numberBetween(1, 10),
				'category_id' => $faker->numberBetween(1, 10)
			]);
		}
	}

}