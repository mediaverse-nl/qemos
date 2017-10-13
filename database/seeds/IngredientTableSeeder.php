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
                'ingredient' => 'Tomaat',
            ],[
                'ingredient' => 'Sla',
            ],[
                'ingredient' => 'Rund',
            ],[
                'ingredient' => 'Spinazie',
            ],[
                'ingredient' => 'Uien',
            ],[
                'ingredient' => 'Boerenkool',
            ],[
                'ingredient' => 'Asperges',
            ],[
                'ingredient' => 'Zout',
            ],[
                'ingredient' => 'Suiker',
            ],[
                'ingredient' => 'Bloemkool',
            ],[
                'ingredient' => 'Bleekselderij',
            ],[
                'ingredient' => 'Venkel',
            ],[
                'ingredient' => 'Gegrilde ham',
            ],[
                'ingredient' => 'Beenham',
            ],[
                'ingredient' => 'Rauwe ham',
            ],[
                'ingredient' => 'Chorizo',
            ],[
                'ingredient' => 'Salami',
            ],[
                'ingredient' => 'Snijworst',
            ],[
                'ingredient' => 'Cervelaatworst',
            ],[
                'ingredient' => 'Karbonade',
            ],[
                'ingredient' => 'Hamlap',
            ],
        ));
    }
}
