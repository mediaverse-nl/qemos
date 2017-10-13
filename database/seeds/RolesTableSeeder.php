<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert(array(
            [
                'role' => 'support',
            ],[
                'role' => 'staff',
            ],[
                'role' => 'manager',
            ],
        ));
    }
}
