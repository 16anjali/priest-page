<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Priest;
use Illuminate\Http\Request;

class PriestController extends Controller
{
    public function edit()
    {
        $priest = Priest::first();
        return view('admin.priest.edit', compact('priest'));
    }

    public function update(Request $request)
    {
        $priest = Priest::first();

        $data = $request->validate([
            'name'                 => 'required|string|max:255',
            'title'                => 'required|string|max:255',
            'short_bio'            => 'required|string|max:500',
            'bio'                  => 'required|string',
            'youtube_channel_id'   => 'nullable|string|max:100',
            'youtube_channel_name' => 'nullable|string|max:255',
            'youtube_subscribers'  => 'nullable|integer|min:0',
            'phone'                => 'nullable|string|max:20',
            'email'                => 'nullable|email|max:255',
            'location'             => 'nullable|string|max:255',
            'facebook_url'         => 'nullable|url|max:500',
            'instagram_url'        => 'nullable|url|max:500',
            'youtube_url'          => 'nullable|url|max:500',
        ]);

        $priest->update($data);

        return redirect()->route('admin.priest.edit')
                         ->with('success', 'Profile updated successfully!');
    }
}
