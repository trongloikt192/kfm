<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class SettingsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('settings')->delete();

		$faker = Faker::create();

		foreach(range(1, 1) as $index)
		{
			Setting::create([
				'company' => $faker->company,
				'logo' => $faker->imageUrl(640, 480),
				'sologan' => $faker->sentence(10),
				'silde_images' => '{"slide_1":"db_kfm.png","slide_2":"-73.998284","slide_3":"-73.998284"}',
				'map_position' => '{"latitude": "'. $faker->latitude .'", "longitude": "'. $faker->longitude .'"}',
				'email_1' => $faker->freeEmail,
				'email_2' => $faker->freeEmail,
				'address' => $faker->address,
				'phone_number_1' => $faker->phoneNumber
				'phone_number_2' => $faker->phoneNumber
				'hotline_1' => $faker->phoneNumber
				'hotline_2' => $faker->phoneNumber
			]);
		}
	}

}