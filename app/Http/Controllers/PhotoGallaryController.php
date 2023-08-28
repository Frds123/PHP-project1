<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Models\PhotoGallary;
use Illuminate\Http\Request;

class PhotoGallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $gallaries = Gallary::all()->paginate(6);
        $gallaries = Gallary::all();
        // dd($gallaries);
        return view('frontend.gallary', compact('gallaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoGallary $photoGallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallary $photoGallary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallary $photoGallary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoGallary  $photoGallary
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhotoGallary $photoGallary)
    {
        //
    }
}