<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use Carbon\Carbon;

use App\User;

class FakerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        foreach(range(1,10) as $index){
            $data = [
                [
                    'firstname' => $faker->name,
                    'lastname' => $faker->lastName,
                    'role_id' => 2,
                    'email' => $faker->email,
                    'password' => Hash::make('123456'),
                    'address' => $faker->address,
                    'phone' => $faker->phoneNumber,
                    'active' => 1,
                    'created_at' => Carbon::now()
                ]
            ];

            User::insert($data);
        }
    }
}
