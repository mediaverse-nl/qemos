<?php

use Illuminate\Database\Seeder;

class UserLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\UserLocation::class, 20)->create();
    }
}
