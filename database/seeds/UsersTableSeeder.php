<?php

use Illuminate\Database\Seeder;
use App\User;

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
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin123')
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user123')
        ]);
        User::create([
            'name' => 'invitado 3',
            'email' => 'invitado3@user.com',
            'password' => bcrypt('user123')
        ]);
    }
}
