<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Models\Pest;
use App\Models\PestInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $farmerdetails = Farm::where('farmer_id', Auth::id())->first();

        $apiKey = '78f094461d237e30fcdc15725beae581';
        $city = $farmerdetails->farm_location;
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric");
        $weatherData = $response->json();

        // Ensure weather data is retrieved successfully
        if($weatherData) {
          // Extract temperature and humidity from the weather data
          $temperature = $weatherData['main']['temp'];
          $humidity = $weatherData['main']['humidity'];

        }

        // Fetch pests based on temperature and humidity categories
        $pests = Pest::where('temperature_threshold_celsius', '<=', $temperature)->get();

        return view('content.pages.pests.index', [
          'pests' => $pests,
          'farmerdetails' => $farmerdetails,
          'weatherData' => $weatherData
        ]);
  }

  /**
     * Show the form for creating a new resource.
     */
  public function create()
  {
    //
  }

  /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
  {
    //
  }

  /**
     * Display the specified resource.
     */
  public function show($id)
  {
    $pest = PestInfo::where('pest_id', $id)->first();
    return view('content.pages.pests.show', [
      'pest' => $pest
    ]);
  }

  /**
     * Show the form for editing the specified resource.
     */
  public function edit(Pest $pest)
  {
    //
  }

  /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, Pest $pest)
  {
    //
  }

  /**
     * Remove the specified resource from storage.
     */
  public function destroy(Pest $pest)
  {
    //
  }
}
