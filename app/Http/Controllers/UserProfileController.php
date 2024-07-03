<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
  public function create()
  {
    $profile = UserProfile::where('user_id', Auth::id())->first();

    if (!$profile) {
      $profile = new UserProfile();
      $profile->user_id = Auth::id();
      $profile->professional_title = '-';
      $profile->save();
    }

    return view('pages.dashboard.user-profile.create', compact('profile'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'professional_title' => 'required|string|max:255',
      'name' => 'required|string|max:255',
      'website_url' => 'nullable|url',
      'facebook_url' => 'nullable|url',
      'linkedin_url' => 'nullable|url',
      'profile_image' => 'nullable|image|max:2048|mimes:jpeg,png,jpg',
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
      $profileData['image'] = $profileImage;
    }

    try {

      User::where('id', Auth::id())->update(['name' => $request->name]);

      UserProfile::where('user_id', Auth::id())->update($profileData);

      return redirect()->back()->with('success', 'Profile updated successfully.');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', $e->getMessage());
    }
  }
}
