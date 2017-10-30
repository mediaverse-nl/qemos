<?php

use Illuminate\Database\Seeder;

class IngredientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Ingredients')->insert(array(
            [
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Tomaat',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Sla',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Rund',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Spinazie',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Uien',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Boerenkool',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Asperges',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Zout',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Suiker',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Bloemkool',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Bleekselderij',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Venkel',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Gegrilde ham',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Beenham',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Rauwe ham',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Chorizo',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Salami',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Snijworst',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Cervelaatworst',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Karbonade',
            ],[
                'location_id' => array_random(\App\Location::pluck('id')->toArray()),
                'ingredient' => 'Hamlap',
            ],
        ));
    }
}
