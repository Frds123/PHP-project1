<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\SingleEvent;
use Illuminate\Http\Request;

class SingleEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
     * @param  \App\Models\SingleEvent  $singleEvent
     * @return \Illuminate\Http\Response
     */
    public function show(Event $singleEvent)
    {

        $events = Event::find($singleEvent);
        return view('frontend.single-event', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SingleEvent  $singleEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(SingleEvent $singleEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SingleEvent  $singleEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SingleEvent $singleEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SingleEvent  $singleEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(SingleEvent $singleEvent)
    {
        //
    }
}