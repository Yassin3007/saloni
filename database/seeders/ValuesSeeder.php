<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            \App\Models\Value::create([
                'tax_1'=>0,
                'tax_2'=>0,
                'tax_3'=>0,
                'tax_4'=>0,
                'level_1'=>10,
                'level_2'=>20,
                'level_3'=>30,
                'level_4'=>40,
                'referral'=>5,
                'loyalty'=>5
            ]);
    }
}
