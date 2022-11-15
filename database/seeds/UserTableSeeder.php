<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'nwenikyaw';
        $user->email = 'nnk@gmail.com';
        $user->password =  bcrypt ('nnk12345');
        $user->save();
    }
}
