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
            'name' => 'Javier',
            'email' => 'xavier@xavier.com',
            'password' => bcrypt('xavier'),
            'admin' => true
        ]);
    }
}
