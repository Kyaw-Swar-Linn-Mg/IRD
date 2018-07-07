<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => "Admin",
                'email' => "admin@gmail.com",
                'password' => bcrypt('p@ssw0rd'),
                'role' =>"admin"
            ]
        );

        DB::table('users')->insert(
            [
                'name' => "User",
                'email' => "user@gmail.com",
                'password' => bcrypt('p@ssw0rd'),
                'role' =>"user"
            ]
        );
    }
}
