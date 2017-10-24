<?php

use Illuminate\Database\Seeder;

class PeculiarityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('peculiarity')->insert(array(
            ['value' => 'vega',],
            ['value' => 'scherp',],
            ['value' => 'zoet',],
            ['value' => 'zuur',],
            ['value' => 'glutten',],
            ['value' => 'halal',],
            ['value' => 'noot',],
        ));
    }
}
