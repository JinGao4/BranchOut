<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Campaign;

class CampaignsTableSeeder extends Seeder
{

    public function run(): void
    {
        Campaign::create([
            'title' => 'Save the Rainforest',
            'description' => 'A campaign to protect the Amazon rainforest from deforestation.',
            'category' => 'Environment',
            'goal' => 10000.00,
            'about' => 'This campaign raises funds to support NGOs working in Brazil.',
            'image_url' => 'https://onetreeplanted.org/cdn/shop/files/Amazon-Rainforests-Amazonia-South-America.jpg?v=1739422746',
            'user_id' => 1, 
        ]);

        Campaign::create([
            'title' => 'Education for All',
            'description' => 'Helping underprivileged kids get access to quality education.',
            'category' => 'Education',
            'goal' => 5000.00,
            'about' => 'Funds go to building rural classrooms and buying supplies.',
            'image_url' => 'https://lh6.googleusercontent.com/proxy/tVRIzpHjTL7F9abQ1IF7eXPmtkbWugeBRpPNA-xosFjNg0H1Er3xDhPQRp4cFK4JYV4MEG4cHV_oOPtaeq1L0EtuRoiD5eN85HJiP7KDuUuh8mVRce-z6IEqs9A_PtauiMyMOXB9pl7QYnSq',
            'user_id' => 1,
        ]);
    }
}
