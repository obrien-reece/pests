<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Pest;
use App\Models\PestInfo;
use Illuminate\Http\Request;

class PestInfoController extends Controller
{
  /**
     * Display a listing of the resource.
     */
  public function index(Request $request, $id)
  {
    $pest = Pest::where('id', $id)->first();
    return view('content.pages.upload-pests', [
      'pest' => $pest
    ]);
  }

  public function showpests(){
    $pests = Pest::all();
    return view('content.pages.showpests', [
      'pests' => $pests
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

    $pest_name = Pest::where('id', $request->input('pest_id'))->pluck('pest_name')[0];
    // Validate the form data

    // Store the uploaded images
    if ($request->hasFile('image_1')) {
      $file = $request->file('image_1');
      $filename = Str::of($pest_name)->snake() . '-1' . time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('pest_data_images'), $filename);
      $filePath = 'pest_data_images/' . $filename;
      $image_1 = $filePath;
    }

    if ($request->hasFile('image_2')) {
      $file = $request->file('image_2');
      $filename = Str::of($pest_name)->snake() . '-2' . time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('pest_data_images'), $filename);
      $filePath = 'pest_data_images/' . $filename;
      $image_2 = $filePath;
    }

    if ($request->hasFile('image_3')) {
      $file = $request->file('image_3');
      $filename = Str::of($pest_name)->snake() . '-3' . time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('pest_data_images'), $filename);
      $filePath = 'pest_data_images/' . $filename;
      $image_3 = $filePath;
    }


    $pestinfo = new PestInfo();
    $pestinfo->pest_id = $request->input('pest_id');
    $pestinfo->description = $request->input('description');
    $pestinfo->image_1 = $image_1;
    $pestinfo->image_2 = $image_2;
    $pestinfo->image_3 = $image_3;
    $pestinfo->save();

    // Redirect back with a success message
    return redirect()->route('showpests');
  }

  /**
     * Display the specified resource.
     */
  public function show(PestInfo $pestInfo)
  {
    //
  }

  /**
     * Show the form for editing the specified resource.
     */
  public function edit(PestInfo $pestInfo)
  {
    //
  }

  /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, PestInfo $pestInfo)
  {
    //
  }

  /**
     * Remove the specified resource from storage.
     */
  public function destroy(PestInfo $pestInfo)
  {
    //
  }
}
