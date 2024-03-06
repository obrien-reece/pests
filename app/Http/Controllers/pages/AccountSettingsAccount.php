<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountSettingsAccount extends Controller
{
  public function index()
  {

    $farmerdetails = User::with(['farm'])->where('id', Auth::id())->first();

    return view('content.pages.pages-account-settings-account', [
      'farmerdetails' => $farmerdetails
    ]);
  }

  public function update(Request $request)
  {
    $user = User::find(auth()->id());
    $farm = $user->farm;

    // Update user details
    $user->update([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
    ]);

    // Update farm details
    $farm->update([
      'farm_name' => $request->input('farm_name'),
      'farm_size' => $request->input('farm_size'),
      'farm_location' => $request->input('farm_location'),
      'crop_name' => $request->input('crop_name'),
      'pest' => $request->input('pest'),
      'pest_frequency' => $request->input('pest_frequency'),
      'production_years' => $request->input('production_years'),
      'farming_type' => $request->input('farming_type'),
    ]);

    return redirect()->back()->with('success', 'Profile updated successfully');
  }
}
