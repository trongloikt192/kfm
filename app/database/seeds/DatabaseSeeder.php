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
		$this->call('FeedbacksTableSeeder');
		$this->call('SettingsTableSeeder');
		$this->call('TagsTableSeeder');
		$this->call('DocumentsTableSeeder');
		$this->call('PagesTableSeeder');
		$this->call('PostsTableSeeder');
		
		$this->call('ThrottleTableSeeder');
		$this->call('ProfilesTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('PermissionsTableSeeder');
		$this->call('PermissionRoleTableSeeder');
		$this->call('UsersTableSeeder');
	}

}
