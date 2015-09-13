<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PagesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('pages')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Page::create([
				'title' => $faker->sentence(10),
				'slug' => $faker->slug,
				'content' => $faker->text(200)
			]);
		}
	}

}