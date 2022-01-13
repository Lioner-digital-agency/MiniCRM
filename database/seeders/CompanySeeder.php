<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Lioner Digitális Ügynökség Bt.',
            'email' => 'info@lioner.hu',
            'logo_path' => 'https://lioner.hu/img/lioner_logo.png',
            'website' => 'https://lioner.hu/',
        ]);

        DB::table('companies')->insert([
            'name' => 'CityRoom',
            'email' => 'hello@cityroom.hu',
            'logo_path' => 'https://cityroom.hu/img/karacsony/logo_szoveg_karacsony.png',
            'website' => 'https://cityroom.hu/',
        ]);
    }
}
