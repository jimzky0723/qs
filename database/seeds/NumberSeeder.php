<?php

use Illuminate\Database\Seeder;

class NumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('number')->insert(
            [
                'section' => 'card'
            ],[
                'section' => 'vital1'
            ],[
                'section' => 'vital2'
            ],[
                'section' => 'vital3'
            ],[
                'section' => 'pedia'
            ],[
                'section' => 'im'
            ],[
                'section' => 'surgery'
            ],[
                'section' => 'ob'
            ],[
                'section' => 'dental'
            ],[
                'section' => 'bite'
            ]
        );
    }
}
