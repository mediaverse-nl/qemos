<?php

use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_role')->insert(array(
            [
                'user_id' => 1,
                'role_id' => 3,
            ],
        ));

        factory(App\UserRole::class, 50)->create();
    }
}
