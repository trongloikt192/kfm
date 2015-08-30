<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('customers')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Customer::create([
				'name' => $faker->company,
				'delegate' => $faker->name,
				'logo' => $faker->imageUrl(640, 480),
				'domain' => $faker->domainName,
				'email' => $faker->freeEmail,
				'address' => $faker->address,
				'phone_number' => $faker->phoneNumber,
				'business_scope' => $faker->catchPhrase
			]);
		}
	}

}