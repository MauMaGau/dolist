<?php

class UsersTableSeeder extends Seeder {

	public function run()
    {
        DB::table('users')->delete();

        User::create([
            'email' => 'dttownsend@gmail.com',
            'password' => Hash::make('password')
        ]);
    }

}