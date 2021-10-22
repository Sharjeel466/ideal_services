<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Rate;
use App\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'name'          => 'admin',
            'mobile_number' => '012345678',
            'role'          => $role->id,
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('secret'),
        ]);

        Role::create([
            'name' => 'pakistan'
        ]);

        Role::create([
            'name' => 'saudia'
        ]);

        Rate::create([
            'rate' => '100'
        ]);
    }
}
