<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
            'role_id' => Role::ID_ADMIN,
        ]);
        User::create([
            'name' => 'Moderator',
            'email' => 'moderator@email.com',
            'password' => Hash::make('moderator'),
            'role_id' => Role::ID_MODERATOR,
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => Hash::make('user'),
            'role_id' => Role::ID_USER,
        ]);
    }
}
