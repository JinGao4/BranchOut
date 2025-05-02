<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            // Change amount to integer (store in cents)
            $table->integer('amount')->change();

            // Add campaign relationship
            $table->foreignId('campaign_id')->nullable()->constrained()->onDelete('set null');

            // Add Stripe payment intent tracking
            $table->string('stripe_payment_intent_id')->nullable()->unique()->after('amount');
        });
    }

    public function down(): void
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->float('amount')->change();
            $table->dropForeign(['campaign_id']);
            $table->dropColumn(['campaign_id', 'stripe_payment_intent_id']);
        });
    }
};
