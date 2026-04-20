<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@politeknikbosowa.ac.id',
                'password' => bcrypt('dipsilalaasep'),
                'role_id' => 1, // Assuming the super_admin role has ID 1
            ],
        ]);
    }
}
