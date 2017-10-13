<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Location::class, 5)->create();
    }
}
