<?php

use Illuminate\Database\Seeder;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'firstname' => 'Admin',
                'lastname' => 'Central Manager',
                'role_id' => 1,
                'email' => 'admin@gmail.com',
                'created_at' => Carbon::now(),
                'password' => Hash::make('123456'),
                'status' => 1,
            ]
        ];

        User::insert($data);
    }
}
