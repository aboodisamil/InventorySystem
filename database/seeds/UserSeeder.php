<?php

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
        $user = \App\User::create([
            'name' => 'المدير العام',
            'email' => 'super_admin@gmail.com',
            'password' => bcrypt('12345678'),
            'phone' => '0569211707',
            'address' => 'gaza',
        ]);

      $user->attachRole('super_admin');

    }
}
