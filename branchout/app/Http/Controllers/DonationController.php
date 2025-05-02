<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Campaign;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Campaign $campaign)
{
    $validated = $request->validate([
        'amount' => 'required|numeric|min:1',
        'comment' => 'nullable|string|max:1000',
    ]);

    $campaign->donations()->create([
        'user_id' => auth()->id(),
        'amount' => $validated['amount'],
        'comment' => $validated['comment'] ?? null,
    ]);

    return back()->with('success', 'Thank you for your donation!');
}
    /**
     * Display the specified resource.
     */
    public function show(Donation $donation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donation $donation)
    {
        //
    }

    public function donateWithStripe(Request $request, Campaign $campaign)
{
    $request->validate([
        'amount' => 'required|numeric|min:1',
        'comment' => 'nullable|string|max:1000',
    ]);

    Stripe::setApiKey(config('services.stripe.secret'));

    $amountInCents = $request->amount * 100;

    $checkoutSession = StripeSession::create([

        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'eur',
                'product_data' => [
                    'name' => 'Donation to ' . $campaign->title,
                ],
                'unit_amount' => $amountInCents,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => route('donate.success', [$campaign->id]) . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('campaigns.show', $campaign),
        'metadata' => [
            'user_id' => auth()->id(),
            'campaign_id' => $campaign->id,
            'comment' => $request->comment ?? '',
        ],
    ]);

    return redirect($checkoutSession->url);
}

public function donationSuccess(Request $request, Campaign $campaign)
{
    $sessionId = $request->get('session_id');

    if (!$sessionId) {
        return redirect()->route('campaigns.show', $campaign)->with('error', 'Missing session ID.');
    }

    Stripe::setApiKey(config('services.stripe.secret'));
    $session = StripeSession::retrieve($sessionId);

    // Prevent duplicate donation
    if (Donation::where('stripe_payment_intent_id', $session->payment_intent)->exists()) {
        return redirect()->route('campaigns.show', $campaign)->with('info', 'Donation already recorded.');
    }

    Donation::create([
        'user_id' => $session->metadata->user_id,
        'campaign_id' => $session->metadata->campaign_id,
        'amount' => $session->amount_total / 100, // convert back to €
        'comment' => $session->metadata->comment ?? null,
        'stripe_payment_intent_id' => $session->payment_intent,
    ]);

    return redirect()->route('campaigns.show', $campaign)->with('success', 'Thank you for your donation!');
}
}
