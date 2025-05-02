<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Campaign;


class UserFavouriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
            $user = User::find(1);
            $campaign = Campaign::find(1);
    
            $user->likedCampaigns()->attach($campaign->id);
        
    }
}
