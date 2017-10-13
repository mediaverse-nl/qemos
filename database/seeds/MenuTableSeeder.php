<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('nl_NL');

        DB::table('menu')->insert(array(
            [
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Visgerechten',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Broodjes',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Salade',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Friet',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Vleesgerechten',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Burgers',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Tosti',
                'status' => 'online',
            ],[
                'location_id' => array_rand(\App\Location::pluck('id')->toArray()),
                'description' => $faker->realText(),
                'naam' => 'Steaks',
                'status' => 'online',
            ],
        ));
    }
}
