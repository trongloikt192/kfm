<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Category::create([
				'name' => $faker->name,
                'description' => $faker->text(50),
                'parent_id' => $faker->numberBetween(0,3)
			]);
		}
	}

}