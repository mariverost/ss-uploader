<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class SeedUsersTableTableSeeder extends Seeder {

	public function run()
	{
		DB::table('ssup_users')->truncate();

		$users = [
            [
                'first_name' => 'Mario',
                'last_name' => 'Riveros',
                'email' => 'mariverost@gmail.com',
                'password' => Hash::make('mariverost')
            ],
            [
				'first_name' => 'Eric',
                'last_name' => 'Lam',
                'email' => 'eric@voiq.com',
                'password' => Hash::make('eric')
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
	}

}
