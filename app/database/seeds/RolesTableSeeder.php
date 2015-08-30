<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('roles')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Role::create([
				'name' => $faker->name,
				'description' => $faker->sentences(2)
			]);
		}
	}

}