<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FeedbackTableSeeder extends Seeder {

	public function run()
	{

		DB::table('feedback')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Feedback::create([
				'full_name' => $faker->name,
				'email' => $faker->freeEmail,
				'company' => $faker->company,
				'phone_number' => $faker->phoneNumber,
				'content' => $faker->text(200)
			]);
		}
	}

}