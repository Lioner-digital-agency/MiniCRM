<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Teszt Admin',
            'email' => 'teszt.admin@lioner.hu',
            'password' => bcrypt('123456789'),
            'created_at' => '2022-01-11 13:46:50',
            'updated_at' => '2022-01-11 13:46:50',
        ]);
    }
}
