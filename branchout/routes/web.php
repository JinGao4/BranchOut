<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\DonationController;
use App\Models\User;
use App\Models\Campaign;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    $companies = User::where('role', 'c')
        ->where('isVerified', true)
        ->get();

        $recentCampaigns = Campaign::latest()->take(4)->get();

        return view('dashboard', compact('companies', 'recentCampaigns'));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create');
    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/campaigns/{campaign}/edit', [CampaignController::class, 'edit'])->name('campaigns.edit');
    Route::put('/campaigns/{campaign}', [CampaignController::class, 'update'])->name('campaigns.update');
    Route::delete('/campaigns/{campaign}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
    Route::get('/campaigns/{id}', [CampaignController::class, 'show'])->name('campaigns.show');
    Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
    Route::get('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('companies.show');
    Route::post('/campaigns/{campaign}/donate', [DonationController::class, 'store'])->name('campaigns.donate');
    Route::post('/campaigns/{campaign}/donate/stripe', [DonationController::class, 'donateWithStripe'])->name('campaigns.donate.stripe');
    Route::get('/donation/success/{campaign}', [DonationController::class, 'donationSuccess'])->name('donate.success');
    
});

require __DIR__.'/auth.php';
