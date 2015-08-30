<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class LinksTableSeeder extends Seeder {

	public function run()
	{
		DB::table('links')->delete();

        $faker = Faker::create();

        foreach(range(1, 20) as $index)
        {
            Link::create([
                'name' => $faker->name,
                'link' => $faker->domainName,
                'description' => $faker->sentence(1)
            ]);
        }
	}

}