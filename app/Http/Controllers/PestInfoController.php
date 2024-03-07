<?php

namespace App\Http\Controllers;

use App\Models\PestInfo;
use Illuminate\Http\Request;

class PestInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('content.pages.upload-pests');
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
