<?php

use Illuminate\Database\Seeder;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserDatabaseSeeder extends Seeder
{
    public function run()
    {
    	\App\User::create([
    			'email' =>'testapi@gmail.com',
    			'name' => 'tuantran',
    			'password' => Hash::make('test123')
    		]);
    }
}
