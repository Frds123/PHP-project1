<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\Member;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = User::where('status', 1)->paginate(12);
        return view('frontend.member', compact('members'));
    }

    
    public function searchOption(Request $request)
    {
    if($request->search)
        {
            $searchOption = User::where('name','LIKE','%'.$request->search.'%')
            ->orwhere('email','LIKE','%'.$request->search.'%')
            ->latest()->paginate(12);
            return view('frontend.search',compact('searchOption'));
        }else{
         return redirect()->back()-with('message','Rony');
        }

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
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function facultyList($id)
    {
        $member = User::where('faculty_id', $id)->paginate(12);

        return view('frontend.faculty-member', compact('member'));
    }
}