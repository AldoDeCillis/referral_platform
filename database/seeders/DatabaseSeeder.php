<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $seeders = [
            CitySeeder::class,
        ];
        if (User::count() == 0) {
            $seeders[] = UserSeeder::class;
        }
        $this->call($seeders);
    }
}
