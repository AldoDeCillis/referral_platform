<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    public function run() :void
    {
        User::factory()->create([
            'name' => 'Admin',
            'surname' => 'Admin',
            'email' => 'admin@admin.it',
            'phone' => '+393333333333',
            'password' => bcrypt('p@$$w0rd'),
            'crm_status' => 'seller',
        ]);
        User::factory(5)->create();
    }
}
