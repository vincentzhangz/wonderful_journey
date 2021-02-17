<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "admin";
        $user->email = "admin@admin.com";
        $user->phone = "1234567890";
        $user->role = "admin";
        $user->password = bcrypt("admin123");
        $user->save();
    }
}
