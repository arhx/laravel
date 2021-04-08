<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'id' => Role::ID_ADMIN,
                'name' => 'admin',
                'title' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Role::ID_MODERATOR,
                'name' => 'moderator',
                'title' => 'Moderator',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => Role::ID_USER,
                'name' => 'user',
                'title' => 'User',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
