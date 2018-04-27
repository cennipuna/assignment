<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = array(
            array(
                'name' => 'Nipuna',
                'email' => 'nipunaarikaster@gmail.com',
                'password' => Hash::make('123123'),
                'remember_token' => '',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'name' => 'Michiel',
                'email' => 'michiel@sweepbright.com',
                'password' => Hash::make('123123'),
                'remember_token' => '',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        );
        DB::table('users')->insert($users);
    }
}
