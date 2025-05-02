<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $campaigns = Campaign::with('user')->latest()->get();
        return view('campaigns.index', compact('campaigns'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('campaigns.create');
    }
    

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'category' => 'required',
            'goal' => 'required|numeric',
            'about' => 'required',
            'image_url' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('campaigns', 'public');
        }

        $data['user_id'] = Auth::id();
        Campaign::create($data);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created successfully!');
    }

    public function show($id)
    {
        $campaign = Campaign::withSum('donations', 'amount')->findOrFail($id);
        return view('campaigns.show', compact('campaign'));
    }

    public function edit($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('campaigns.edit', compact('campaign'));
    }
    
    public function update(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'goal' => 'required|numeric',
            'about' => 'required|string|max:255',
            'image_url' => 'nullable|url',
        ]);
    
        $campaign->update($validated);
    
        return redirect()->route('campaigns.show', $campaign->id)->with('success', 'Campaign updated successfully.');
    }

    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
    
        $campaign->delete();
    
        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted successfully.');
    }
    
}
