<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Teacher',
            'role_id' => 1,
            'email' => 'teacher@larns.edu',
            'email_verified_at' => now(),
            'password' => bcrypt('larns13'),
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'Student',
            'role_id' => 2,
            'email' => 'student@larns.edu',
            'email_verified_at' => now(),
            'password' => bcrypt('larns13'),
            'remember_token' => Str::random(10),
        ]);
    }
}
