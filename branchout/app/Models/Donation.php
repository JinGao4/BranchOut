<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function campaign()
{
    return $this->belongsTo(Campaign::class);
}
protected $fillable = [
    'user_id',
    'campaign_id',
    'amount',
    'comment',
    'stripe_payment_intent_id',
];
}
