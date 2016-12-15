<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'RanjayD',
        'firstName' => 'Ranjay',
        'lastName' => 'Kumar',
        'email' => 'ranjayd@gmail.com',
        'password' => Hash::make('test123'),
        'phone' => '(123) 456-7890',
        'status' => 'ACTIVE',
        'remember_token' => 'N',
      ]);
      DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Jill',
        'firstName' => 'Jill',
        'lastName' => 'Harvard',
        'email' => 'jill@harvard.edu',
        'password' => Hash::make('helloworld'),
        'phone' => '(123) 456-7890',
        'status' => 'ACTIVE',
        'remember_token' => 'N',
      ]);
      DB::table('users')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Jamal',
        'firstName' => 'Jamal',
        'lastName' => 'Harvard',
        'email' => 'jamal@harvard.edu',
        'password' => Hash::make('helloworld'),
        'phone' => '(123) 456-7890',
        'status' => 'ACTIVE',
        'remember_token' => 'N',
      ]);
    }
}
