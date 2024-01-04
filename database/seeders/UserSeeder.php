<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use this when you run factory for adding dummy contents to User table
        User::factory()->count(100)->create();  
        //or  User::factory(100)->create();  
        /* Create Sample Dummy Users Array
        $users = [
            [
                'name'=>'Javed Ur Rehman',
                'email'=>'javed@allphptricks.com',
                'pincode'=>'686574',
                'status'=>'1',
                'password'=> Hash::make('javed1234')
            ],
            [
                'name'=>'Syed Ahsan Kamal',
                'email'=>'ahsan@allphptricks.com',
                'pincode'=>'686584',
                'status'=>'1',
                'password'=> Hash::make('ahsan1234')
            ],
            [
                'name'=>'Abdul Muqeet',
                'email'=>'a.muqeet@allphptricks.com',
                'pincode'=>'680004',
                'status'=>'1',
                'password'=> Hash::make('muqeet1234')
            ]
        ];

        // Looping and Inserting Array's Users into User Table
        foreach($users as $user){
            User::create($user);
        }*/
    }
}
