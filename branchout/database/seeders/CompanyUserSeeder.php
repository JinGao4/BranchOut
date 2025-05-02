<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class CompanyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            [
                'name' => 'WWF',
                'email' => 'contact@wwf.org',
                'company_email' => 'company@wwf.org',
                'company_phone' => 1000000001,
                'about' => 'World Wide Fund for Nature',
                'description' => 'An international non-governmental organization working on issues regarding the conservation, research and restoration of the environment.',
                'image_url' => 'https://www.logodesignlove.com/wp-content/uploads/2011/06/wwf-panda-logo.jpg',
            ],
            [
                'name' => 'Greenpeace',
                'email' => 'contact@greenpeace.org',
                'company_email' => 'company@greenpeace.org',
                'company_phone' => 1000000002,
                'about' => 'Environmental activism',
                'description' => 'Greenpeace is a global network that uses peaceful protest and creative communication to expose global environmental problems.',
                'image_url' => 'https://www.grainepaca.org/wp-content/uploads/2018/03/greenpeace-logo.jpg',
            ],
            [
                'name' => 'The National Conservation',
                'email' => 'info@nationalconservation.org',
                'company_email' => 'company@nationalconservation.org',
                'company_phone' => 1000000003,
                'about' => 'Nature Preservation',
                'description' => 'Dedicated to conserving the lands and waters on which all life depends.',
                'image_url' => 'https://www.iwmc.org/wp-content/uploads/2021/05/44450209.jpeg',
            ],
            [
                'name' => 'Patagonia',
                'email' => 'support@patagonia.com',
                'company_email' => 'company@patagonia.com',
                'company_phone' => 1000000004,
                'about' => 'Outdoor Clothing & Gear',
                'description' => 'An American clothing company that markets and sells outdoor clothing and gear, known for its environmental activism.',
                'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTK_H6H0uB_SHkQ6HpJPmeIrC9R8HXx7XaDw&s',
            ],
            [
                'name' => 'Ørsted',
                'email' => 'info@orsted.com',
                'company_email' => 'company@orsted.com',
                'company_phone' => 1000000005,
                'about' => 'Renewable Energy Company',
                'description' => 'Danish multinational power company that develops and operates renewable energy solutions.',
                'image_url' => 'https://logowik.com/content/uploads/images/orsted2054.logowik.com.webp',
            ],
        ];

        foreach ($companies as $company) {
            User::create([
                'name' => $company['name'],
                'email' => $company['email'],
                'password' => Hash::make('password123'),
                'role' => 'c',
                'company_email' => $company['company_email'],
                'company_phone' => $company['company_phone'],
                'about' => $company['about'],
                'description' => $company['description'],
                'isVerified' => true,
                'email_verified_at' => now(),
                'image_url' => $company['image_url'],
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
