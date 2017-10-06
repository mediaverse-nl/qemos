<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            [
//                'id' => 1,
                'email' => 'def-lol-lol@hotmail.com',
                'password' => Hash::make('asdasd'),
                'name' => 'deveron reniers',
            ],[
//                'id' => 2,
                'email' => 'admin@hotmail.com',
                'password' => Hash::make('asdasd'),
                'name' => 'admin account',
            ],
        ));

        factory(App\User::class, 10)->create();
    }
}
