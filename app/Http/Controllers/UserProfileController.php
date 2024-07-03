<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function create()
    {
        $profile = UserProfile::where('user_id', Auth::id())->first();
        return view('pages.dashboard.user-profile.create', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'professional_title' => 'required|string|max:255',
            'website_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        $profileData = [
            'user_id' => Auth::id(),
            'professional_title' => $request->professional_title,
            'website_url' => $request->website_url,
            'facebook_url' => $request->facebook_url,
            'linkedin_url' => $request->linkedin_url,
        ];

        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image')->store('profile_images', 'public');
            $profileData['profile_image'] = $profileImage;
        }

        UserProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $profileData
        );

        return redirect()->route('dashboard.home')->with('success', 'Profile created/updated successfully.');
    }
}
