<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::all();
        return view('admin.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       try {
        Notice::create([
            'title' => $request->title
       ]);

       return redirect()->route('notices.index')->withMessage("Notice Created!");
       } catch (\Throwable $th) {
        return redirect()->back()->withInput()->withErrors($th->getMessage());
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('frontend.index', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {

        return view('admin.notices.edit', compact('notice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice)
    {
        try {
           $notice->update([
            'title'=> $request->title
           ]);

           return redirect()->route('notices.index')->withMessage('Notice Updated !');

        } catch (\Throwable $th)  {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        try {

            $notice->delete();
            return redirect()->route('notices.index')->withMessage('Notice Deleted !');

        } catch (\Throwable $th)  {
            return redirect()->back()->withInput()->withErrors($th->getMessage());
        }
    }
}