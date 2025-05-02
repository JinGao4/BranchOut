@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center text-center">
        <div class="col-md-10">
            <div class="card bg-light text-dark shadow">
                <div class="card-body">
                    <h2 class="fw-bold mb-3">
                        We’ve partnered with Stripe to bring you easy and secure donations.
                    </h2>
                    <p class="fs-5 mb-4">
                        Support meaningful causes by donating to the companies and campaigns listed below. Your contribution makes a difference.
                    </p>
                    <img src="{{ asset('images/stripe.png') }}" alt="Stripe Logo" class="img-fluid" style="max-height: 80px;">
                </div>
            </div>
        </div>
    </div>

    <h2 class="fw-bold mt-5 text-center">
                        Check out our verified company campaigns!
                    </h2>

<!-- Scrolling Logos -->
<div class="row mt-2">
    <div class="col">
        <div class="logo-carousel-wrapper">
            <div class="logo-carousel-static">
                @for ($i = 0; $i < 100; $i++)
                    @foreach ($companies as $company)
                        @php
                            $logoMap = [
                                'WWF' => 'wwflogo.png',
                                'Patagonia' => 'pata.png',
                                'Ørsted' => 'ors.png',
                                'The National Conservation' => 'tnc.png',
                                'Greenpeace' => 'gp.png',
                            ];
                            $filename = $logoMap[$company->name] ?? null;
                        @endphp

                        @if ($filename)
                            <a href="{{ route('companies.show', $company->id) }}" title="{{ $company->name }}">
                                <img src="{{ asset('images/' . $filename) }}" alt="{{ $company->name }}">
                            </a>
                        @endif
                    @endforeach
                @endfor
            </div>
        </div>
    </div>
</div>
@if($recentCampaigns->count())
    <div class="mt-5">
        <h3 class="fw-bold text-center mb-4">Recently Updated Campaigns</h3>
        <div class="row justify-content-center">
            @foreach($recentCampaigns as $campaign)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset($campaign->image_url) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Campaign Image">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $campaign->title }}</h5>
                            <p class="text-muted small">{{ Str::limit($campaign->about, 80) }}</p>
                            <p class="fw-bold mb-1">Goal: €{{ number_format($campaign->goal, 2) }}</p>
                            <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-outline-success mt-auto">View Campaign</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif



<style>
.logo-carousel-wrapper {
    overflow: hidden;
    padding: 1rem 0;
    position: relative;
}

.logo-carousel-static {
    display: inline-block;
    white-space: nowrap;
    animation: slow-scroll 800s linear infinite;
}

.logo-carousel-static a {
    text-decoration: none;
    color: inherit;
}

.logo-carousel-static a img {
    height: 60px;
    margin: 0 2rem;
    object-fit: contain;
    display: inline-block;
}

.logo-carousel-static a:last-child img {
    margin-right: 6rem;
}

@keyframes slow-scroll {
    0% {
        transform: translateX(0%);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* Fading edges */
.logo-carousel-wrapper::before,
.logo-carousel-wrapper::after {
    content: "";
    position: absolute;
    top: 0;
    width: 80px;
    height: 100%;
    z-index: 1;
    pointer-events: none;
}

.logo-carousel-wrapper::before {
    left: 0;
    background: linear-gradient(to right, #F8FAFC 0%, transparent 100%);
}

.logo-carousel-wrapper::after {
    right: 0;
    background: linear-gradient(to left, #F8FAFC 0%, transparent 100%);
}

</style>
</script>


@endsection