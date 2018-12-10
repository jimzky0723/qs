<?php

use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameters')->insert([
            'description' => 'socket',
            'value' => 'ws://localhost:5001'
        ]);
    }
}
