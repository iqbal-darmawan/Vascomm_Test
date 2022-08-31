<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        collect(
            [
                [
                    'name' => 'Iqbal Darmawan',
                    'email' => 'iqbal@gmail.com',
                    'password' => Hash::make('password'),
                    'email_verified_at' => Carbon::now(),
                    'is_approved' => 1,
                    'is_admin' => 1,
                ],
                [
                    'name' => 'Vascomm',
                    'email' => 'vascomm@gmail.com',
                    'password' => Hash::make('password'),
                    'email_verified_at' => Carbon::now(),
                    'is_approved' => 1,
                    'is_admin' => 1,
                ],
            ]
        )->each(function($user){
            User::create($user);
        });
    }
}
