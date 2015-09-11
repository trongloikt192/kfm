<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ContactsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('contacts')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Contact::create([
				'full_name' => $faker->name,
				'email' => $faker->freeEmail,
				'phone_number' => $faker->phoneNumber,
				'company' => $faker->company,
				'content' => $faker->text(200),
				'status' => $faker->numberBetween(0,1)
			]);
		}
	}

}