<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            'tax'             => '21',
            'global_discount' => '0',
        ]);
    }
}
