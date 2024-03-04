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

    public function submitsteptwo(Request $request){

      $farmer = Farm::where('farmer_id', Auth::id());

      $farmer->update([
        'pest' => $request->input('pest'),
        'pest_frequency' => $request->input('pest_frequency'),
        'crop_name' => $request->input('crop_name'),
        'farm_size' => $request->input('farm_size'),
      ]);

      return redirect()->route('farmer.quiz.stepthree.pesthistory');

    }

    public function stepthree(){
      return view('content.pages.farmerquiz.stepthree');
    }

    public function submitsstepthree(Request $request){

      $farmer = Farm::where('farmer_id', Auth::id());

      $farmer->update([
        'production_years' => $request->input('production_years'),
        'farming_type' => $request->input('farming_type'),
      ]);

      return redirect()->route('farmer.quiz.farmersanswers');

    }

    public function farmersanswers(){
      $farmerdetails = Farm::where('farmer_id', Auth::id())->first();

      return view('content.pages.farmerquiz.answers', [
        'farmerdetails' => $farmerdetails
      ]);
    }

    public function confirmfarmersanswers(Request $request){
        $originalFarm = Farm::where('farmer_id', Auth::id())->first();

        $updatedFarm = [
            'farm_size' => $request->input('farm_size'),
            'farm_name' => $request->input('farm_name'),
            'farm_location' => $request->input('farm_location'),
            'crop_name' => $request->input('crop_name'),
            'pest_frequency' => $request->input('pest_frequency'),
            'pest' => $request->input('pest'),
            'crop_names' => $request->input('crop_names'),
            'production_years' => $request->input('production_years'),
            'farming_type' => $request->input('farming_type'),
        ];

        foreach ($updatedFarm as $key => $value) {
            if ($originalFarm->$key != $value) {
                $originalFarm->$key = $value;
            }
        }

        if ($originalFarm->isDirty()) {
            $originalFarm->save();
        }

        return redirect()->route('dashboard-analytics');
    }

}
