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
        DB::table('number')->insert(['section' => 'card']);
        DB::table('number')->insert(['section' => 'vital1']);
        DB::table('number')->insert(['section' => 'vital2']);
        DB::table('number')->insert(['section' => 'vital3']);
        DB::table('number')->insert(['section' => 'pedia']);
        DB::table('number')->insert(['section' => 'im']);
        DB::table('number')->insert(['section' => 'surgery']);
        DB::table('number')->insert(['section' => 'ob']);
        DB::table('number')->insert(['section' => 'dental']);
        DB::table('number')->insert(['section' => 'bite']);
    }
}
