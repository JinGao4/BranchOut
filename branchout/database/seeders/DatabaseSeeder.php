<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UsersTableSeeder::class);

        $this->call(CampaignsTableSeeder::class);

        $this->call(DonationsTableSeeder::class);

        $this->call(UserLikeTableSeeder::class);

        $this->call(UserFavouriteTableSeeder::class);

        $this->call(CompanyUserSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
