<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FaqTableSeeder extends Seeder {

	public function run()
	{
		DB::table('faq')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Faq::create([
				'title' => $faker->paragraph(1),
				'content' => $faker->text(200),
				'reply_content' => $faker->text(200),
				'full_name' => $faker->name,
				'address' => $faker->address,
				'company' => $faker->company,
				'competence' => $faker->catchPhrase,
				'phone_number' => $faker->phoneNumber,
				'email' => $faker->freeEmail,
				'status' => $faker->numberBetween(0,1)
			]);
		}
	}

}