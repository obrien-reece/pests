<?php

namespace App\Http\Controllers;

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
    dd($request->description);
        // Validate the form data
        $request->validate([
            'description' => 'required|string',
            'image_1' => 'required|image|max:2048', // Max file size: 2MB
            'image_2' => 'nullable|image|max:2048',
            'image_3' => 'nullable|image|max:2048',
        ]);

        // Store the uploaded images
        $imagePaths = [];
        foreach (['image_1', 'image_2', 'image_3'] as $imageName) {
            if ($request->hasFile($imageName)) {
                $imagePath = $request->file($imageName)->store('pest_data_images', 'public');
                $imagePaths[$imageName] = $imagePath;
            }
        }

        // Create a new PestInfo instance
        $pestInfo = new PestInfo();
        $pestInfo->pest_id = $request->pest_id;
        $pestInfo->description = $request->description;
        $pestInfo->image_1 = $imagePaths['image_1'] ?? null;
        $pestInfo->image_2 = $imagePaths['image_2'] ?? null;
        $pestInfo->image_3 = $imagePaths['image_3'] ?? null;
        $pestInfo->save();

        // Redirect back with a success message
        // return redirect()->back()->with('success', 'Pest information has been successfully added.');
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
