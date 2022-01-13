<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'company_id' => 1,
            'first_name' => 'Kristóf',
            'last_name' => 'Köblös',
            'email' => 'koblos.kristof@lioner.hu',
            'phone' => '+36 30 880 1543',
        ]);

        DB::table('employees')->insert([
            'company_id' => 1,
            'first_name' => 'Kristóf',
            'last_name' => 'Ádám',
            'email' => 'adam.kristof@lioner.hu',
            'phone' => '+36 70-430 8133',
        ]);

        DB::table('employees')->insert([
            'company_id' => 1,
            'first_name' => 'Péter',
            'last_name' => 'Farkas',
            'email' => 'farkas.peter@lioner.hu',
            'phone' => '36 70-430 8133',
        ]);
    }
}
