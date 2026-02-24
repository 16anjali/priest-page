<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BhandaraEvent;
use Illuminate\Http\Request;

class BhandaraController extends Controller
{
    public function index()
    {
        $events = BhandaraEvent::orderBy('event_date', 'desc')->get();
        return view('admin.bhandara.index', compact('events'));
    }

    public function create()
    {
        return view('admin.bhandara.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable|date_format:H:i',
            'location'    => 'required|string|max:255',
            'address'     => 'nullable|string|max:500',
            'is_active'   => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $data['is_active']   = $request->boolean('is_active', true);
        $data['is_featured'] = $request->boolean('is_featured', false);

        BhandaraEvent::create($data);

        return redirect()->route('admin.bhandara.index')
                         ->with('success', 'Bhandara event added successfully!');
    }

    public function edit(BhandaraEvent $bhandara)
    {
        return view('admin.bhandara.edit', compact('bhandara'));
    }

    public function update(Request $request, BhandaraEvent $bhandara)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'event_date'  => 'required|date',
            'event_time'  => 'nullable|date_format:H:i',
            'location'    => 'required|string|max:255',
            'address'     => 'nullable|string|max:500',
            'is_active'   => 'boolean',
            'is_featured' => 'boolean',
        ]);

        $data['is_active']   = $request->boolean('is_active');
        $data['is_featured'] = $request->boolean('is_featured');

        $bhandara->update($data);

        return redirect()->route('admin.bhandara.index')
                         ->with('success', 'Bhandara event updated successfully!');
    }

    public function destroy(BhandaraEvent $bhandara)
    {
        $bhandara->delete();
        return redirect()->route('admin.bhandara.index')
                         ->with('success', 'Event deleted.');
    }
}
