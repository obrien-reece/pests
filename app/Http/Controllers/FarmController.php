<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function stepone()
    {
      return view('content.pages.farmerquiz.stepone');
    }

    public function submitstepone(Request $request)
    {

      $farmer = new Farm();
      $farmer->farmer_id = Auth::id();
      $farmer->farm_name = $request->input('farm_name');
      $farmer->farm_location = $request->input('farm_location');
      $farmer->farm_size = $request->input('farm_size');
      $farmer->crop_name = $request->input('crop_name');
      $farmer->save();

      return redirect()->route('farmer.quiz.steptwo.pesthistory');

    }


    public function steptwo(){
      return view('content.pages.farmerquiz.steptwo');
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
    public function show(Farm $farmersCrops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Farm $farmersCrops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Farm $farmersCrops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Farm $farmersCrops)
    {
        //
    }
}
