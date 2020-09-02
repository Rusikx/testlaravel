<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('users'))
        {
            User::firstOrCreate(
                [
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                ],
                [
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
