<?php

use Illuminate\Database\Seeder;

use App\Role;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'id' => 1,
            'role' => 'admin',
            'active' => 1,
            'created_at' => Carbon::now()
        ], [
            'id' => 2,
            'role' => 'user',
            'active' => 1,
            'created_at' => Carbon::now()
        ]];

        Role::insert($data);
    }
}
