<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Farm;
use App\Models\Pest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Analytics extends Controller
{
  public function index()
  {

    $farmerdetails = Farm::where('farmer_id', Auth::id())->first();

    $apiKey = '78f094461d237e30fcdc15725beae581';
    $city = $farmerdetails->farm_location;
    $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");
    $weatherData = $response->json();

    // Ensure weather data is retrieved successfully
    if ($weatherData) {
      // Extract temperature and humidity from the weather data
      $temperature = $weatherData['main']['temp'];
      $humidity = $weatherData['main']['humidity'];

    }

    // Fetch pests based on temperature and humidity categories
    $pests = Pest::where('temperature_threshold_celsius', '<=', $temperature)
                  ->get();

    return view('content.dashboard.dashboards-analytics', [
      'farmerdetails' => $farmerdetails,
      'weatherData' => $weatherData,
      'pests' => $pests,
    ]);
  }
}
