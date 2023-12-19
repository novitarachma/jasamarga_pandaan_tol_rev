<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Spatie\Permission\Models\Role;
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
        $admin = User::create([
            'name' => 'Admin',
            'username' => '11111',
            'email' => 'admin@jpt.id',
            'password' => bcrypt('11111'),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'username' => '10054',
            'email' => 'user@jpt.id',
            'password' => bcrypt('10054'),
        ]);

        $user->assignRole('user');
    }
}