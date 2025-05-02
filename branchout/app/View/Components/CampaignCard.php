<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Campaign;

class CampaignCard extends Component
{
    public $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function render()
    {
        return view('components.campaign-card');
    }
}
