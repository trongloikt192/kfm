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
				'company_name' => $faker->company,
				'logo' => $faker->imageUrl(640, 480),
				'sologan' => $faker->sentence(10),
				'silde_images' => '',
				'map_position' => '{latitude: "'. $faker->latitude .'", longitude: "'. $faker->longitude .'"}',
				'email' => $faker->freeEmail,
				'address' => $faker->address,
				'phone_number' => $faker->phoneNumber
			]);
		}
	}

}