<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Analytics extends Controller
{
  public function index()
  {

    $farmerdetails = Farm::where('farmer_id', Auth::id())->first();

    return view('content.dashboard.dashboards-analytics', [
      'farmerdetails' => $farmerdetails
    ]);
  }
}
