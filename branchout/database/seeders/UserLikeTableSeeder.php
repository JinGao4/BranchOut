<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Campaign;

class UserLikeTableSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::find(1);
        $campaign = Campaign::find(1);

        $user->favouriteCampaigns()->attach($campaign->id);
    }
}
