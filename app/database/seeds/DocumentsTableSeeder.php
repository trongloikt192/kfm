<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DocumentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('documents')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Document::create([
				'name' => $faker->sentence(10),
				'description' => $faker->text(200),
				'link' => $faker->url
			]);
		}
	}

}