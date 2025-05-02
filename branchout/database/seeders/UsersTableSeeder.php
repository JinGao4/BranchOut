<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'a',
            'image_url' => 'images/users/alice.jpg',
            'company_email' => 'alice@branchout.org',
            'company_phone' => 1234567890,
            'isVerified' => true,
            'about' => 'Project leader and software architect.',
            'description' => 'Alice has over 10 years of experience leading software development teams.',
        ]);

        User::create([
            'name' => 'Bob Smith',
            'email' => 'bob@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'c',
            'image_url' => 'images/users/bob.jpg',
            'company_email' => 'bob@branchout.org',
            'company_phone' => 9876543210,
            'isVerified' => false,
            'about' => 'Campaign strategist.',
            'description' => 'Bob manages fundraising campaigns and social outreach programs.',
        ]);

        User::create([
            'name' => 'Charlie Davis',
            'email' => 'charlie@example.com',
            'email_verified_at' => null,
            'password' => Hash::make('password123'),
            'role' => 'u',
            'image_url' => null,
            'company_email' => null,
            'company_phone' => null,
            'isVerified' => false,
            'about' => 'Just a regular user.',
            'description' => 'Charlie recently joined to support environmental campaigns.',
        ]);
    }
}
