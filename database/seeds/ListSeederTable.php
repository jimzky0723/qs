<?php

use Illuminate\Database\Seeder;

class ListSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'profession' => 'programmer',
            'fname' => 'Jimmy',
            'lname' => 'Lomocso',
            'access' => 'admin',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'status' => 1
        ]);
    }
}
