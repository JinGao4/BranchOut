<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Donation;


class DonationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donation::create([
            'amount' => '200',
            'comment' => 'I love the rainforest.',
            'user_id' => '1',
        ]);

        Donation::create([
            'amount' => '500',
            'comment' => 'I love the the planet.',
            'user_id' => '1',
        ]);
    }
}
