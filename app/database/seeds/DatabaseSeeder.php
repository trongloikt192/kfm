<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('LinksTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('CustomersTableSeeder');
		$this->call('FaqTableSeeder');
		$this->call('ContactsTableSeeder');
		$this->call('FeedbackTableSeeder');
		// $this->call('RolesTableSeeder');
		$this->call('SettingsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('UsersTableSeeder');
		$this->call('FileAttachesTableSeeder');
		// $this->call('PagesTableSeeder');
		// $this->call('PostsTableSeeder');
		
	}

}
