<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $user->name = "festus bett";
        $user->tel = "0722229862";
        $user->email = "admin@gmail.com";
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();
    }
}