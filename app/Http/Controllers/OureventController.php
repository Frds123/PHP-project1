<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ourevent;
use Illuminate\Http\Request;

class OureventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(3);

        return view('frontend.event', compact('events'));
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
     * @param  \App\Models\Ourevent  $ourevent
     * @return \Illuminate\Http\Response
     */
    public function show(Ourevent $ourevent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ourevent  $ourevent
     * @return \Illuminate\Http\Response
     */
    public function edit(Ourevent $ourevent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ourevent  $ourevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ourevent $ourevent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ourevent  $ourevent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ourevent $ourevent)
    {
        //
    }
}