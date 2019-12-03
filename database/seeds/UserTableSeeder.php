<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =  User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        // $user->roles()->attach(Role::whereName('admin')->first());
    }
}
