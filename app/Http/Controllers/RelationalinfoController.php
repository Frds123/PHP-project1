<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Relationalinfo;
use App\Models\Relationinfo;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelationalinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $relations = Relationalinfo::where('user_id', Auth::user()->id)->get();
        return view('admin.relationalinfos.index', compact('relations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $relations = Relationalinfo::where('user_id', Auth::user()->id)->get();
        if($relations->isEmpty()){
            $user = User::find(Auth::user()->id);
            return view('admin.relationalinfos.create', compact('user', 'relations'));
        }else{
            $relations = Relationalinfo::where('user_id', Auth::user()->id)
                                     ->where('relation', 'Spouse')->get();
            $children = Relationalinfo::where('user_id', Auth::user()->id)
                                        ->where('relation', 'Child')->get();
            $spouse = $relations[0];

            $user = User::find(Auth::user()->id);
        return view('admin.relationalinfos.create', compact('user', 'spouse', 'children', 'relations'));
        }
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

            DB::beginTransaction();

            auth()->user()->relationalinfo()->delete();

            auth()->user()->relationalinfo()->create([
                'name' => $request->spouse_name,
                'gender' => $request->spouse_gender,
                'relation' => 'Spouse',
                'dob' => '2022-11-02'
            ]);

            $formattedChildData = [];
            for ($i = 0, $max = count($request->children); $i < $max; $i++) {
                $formattedChildData[$i]['name'] = $request->children[$i];
                $formattedChildData[$i]['gender'] = $request->gender[$i];
                $formattedChildData[$i]['dob'] = $request->dob[$i];
                $formattedChildData[$i]['relation'] = 'Child';
            }
            
            auth()->user()->relationalinfo()->createMany($formattedChildData);

            DB::commit();
            return redirect()->route('profiles.show', Auth::user()->id)->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    public function show($id)
    {
        // $relationalinfos = Relationalinfo::get();
        // if($relationalinfos == null){
        //     $user = User::find(Auth::user()->id);
        //     dd($user);
        //     return view('admin.relationalinfos.create', compact('user'));
        // }else{
        //     $relationalinfo_user_id =$relationalinfos[0]->user_id;
        //     $relationalinfo = $relationalinfos[0];
        //     if($relationalinfo_user_id == auth()->user()->id){
        //         $user = User::find($relationalinfo->user_id);
        //         return View::make('admin.relationalinfos.show')->with(['user'=> $user,'relationalinfo'=>$relationalinfo]);
        //     }else{
        //         $user = User::find(Auth::user()->id);
        //         return view('admin.relationalinfos.create', compact('user'));
        //     }
        // }
    }

    public function edit(Relationalinfo $relationalinfo)
    {
        $relations = Relationalinfo::where('user_id', Auth::user()->id)
                                     ->where('relation', 'Spouse')->get();
        $children = Relationalinfo::where('user_id', Auth::user()->id)
                                    ->where('relation', 'Child')->get();
        $spouse = $relations[0];
        return view('admin.relationalinfos.edit', compact('spouse', 'children'));
    }


    public function destroy(Relationalinfo $relationinfo)
    {
        //
    }
}
