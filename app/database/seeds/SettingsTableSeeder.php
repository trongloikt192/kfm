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
				'email' => $faker->freeEmail,
				'address' => $faker->address,
				'phone_number' => $faker->phoneNumber
			]);
		}
	}

}