<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Analytics extends Controller
{
  public function index()
  {

    $farmerdetails = Farm::where('farmer_id', Auth::id())->first();

    $city = $farmerdetails->farm_location;

    $apiKey = '78f094461d237e30fcdc15725beae581';

    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");

    $weatherData = $response->json();

    return view('content.dashboard.dashboards-analytics', [
      'farmerdetails' => $farmerdetails,
      'weatherData' => $weatherData,
    ]);
  }
}
