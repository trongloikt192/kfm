<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;
// use AppModel\FileAttach;

class FileAttachesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('file_attaches')->delete();
		
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			FileAttach::create([
				// 'name' => $faker->sentence(1),
				// 'link' => $faker->url
			]);
		}
	}

}