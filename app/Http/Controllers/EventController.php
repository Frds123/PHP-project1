<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //    dd($request->all());


        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg|max:1116|dimensions:min_width=100,min_height=100,max_width=1116,max_height=742'
            ]);


            if ($file = $request->file('image')) {
                $fileName = date('YmdHi') . time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/events'), $fileName);
            }

            $data = [
                'image' => $fileName,
                'uploaded_by' => Auth::id()
            ];

            $event = new Event();
            $event->title = $request->title ?? '';
            $event->description = $request->description ?? '';
            $event->event_start_date = $request->event_start_date ?? '';
            $event->event_end_date = $request->event_end_date ?? '';
            $event->title = $request->title ?? '';
            $event->save();

            $image = $event->image();
            $image->create($data);
            return redirect()->route('events.index')->withMessage('Event Created !');;
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:1116|dimensions:min_width=100,min_height=100,max_width=1116,max_height=742',
        ]);

        try {
            if ($request->file('image')) {
                $file  = $request->file('image');
                $fileName = date('YmdHi') . time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/events'), $fileName);
            }

            $imageData = [
                'image' => $fileName ?? $event->image->image,
                'uploaded_by' => Auth::id()
            ];

            $data = $request->except('image');
            $event->update($data);

            $image = $event->image();
            $image->update($imageData);
            return redirect()->route('events.index')->withMessage('Event Update !');;
        } catch (QueryException $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        try {

            $event->delete();
            return redirect()->back()->withMessage('Event Deleted !');
        } catch (\Throwable $th) {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }
}