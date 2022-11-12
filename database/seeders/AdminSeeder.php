<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            \App\Models\Admin::create([
                'name'=>"ADMIN",

                'email'=>"admin@admin.com",

                'password'=>bcrypt('password')
            ]);
    }
}
