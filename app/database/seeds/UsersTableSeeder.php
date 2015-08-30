<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			User::create([
				'username' => $faker->lastName,
				'password' => Hash::make('password'),
				'first_name' => $faker->firstName(null),
				'last_name' => $faker->lastName,
				'email' => $faker->freeEmail,
				'address' => $faker->address,
				'phone_number' => $faker->phoneNumber,
				'activated' => $faker->boolean,
				'activation_code' => $faker->ipv4
			]);
		}
	}

}