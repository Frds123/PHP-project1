<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NomineeController extends Controller
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
        // $user = User::find(Auth::user()->id);
        // return view('admin.nominees.create', compact('user'));
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
            $request->validate([
                'nominee_picture' => 'image|mimes:jpg,png,jpeg|max:3000|dimensions:min_width=100,min_height=100,max_width=400,max_height=250',
                'phone_no'=>['required','digits:11']
            ]);

            if ($request->hasFile('nominee_picture')) {
                $this->unlink($request->nominee_picture);
                $picture = $this->uploadFile($request->nominee_picture, Auth::user()->id);
            }

            Nominee::create([
                'user_id' => auth()->user()->id,
                'name' => $request->nominee_name,
                'relation' => $request->relation,
                'fathers_name' => $request->nominee_father_name,
                'mothers_name' => $request->nominee_mother_name,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'percentage' => $request->percentage,
                'gender' => $request->nominee_gender,
                'date_of_birth' => $request->nominee_dob,
                'phone_no' => $request->nominee_phone_no,
            ]);

            if (isset($picture)) {
                $data['nominee_picture'] = $picture;
            }

            return redirect()->route('admin.index')->withMessage('Successfully Created!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function show(Nominee $nominee)
    {
        // dd($nominee);
        return View('admin.nominees.show')->with(['nominee'=>$nominee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function edit(Nominee $nominee)
    {
        return View('admin.nominees.edit')->with(['nominee'=>$nominee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nominee $nominee)
    {
        $user = auth()->user();

        try {
            if ($request->hasFile('nominee_picture')) {
                $this->unlink($request->nominee_picture);
                $picture = $this->uploadFile($request->nominee_picture, Auth::user()->id);
            }

            $nominee->update([
                'user_id' => auth()->user()->id,
                'name' => $request->nominee_name,
                'relation' => $request->relation,
                'fathers_name' => $request->nominee_father_name,
                'mothers_name' => $request->nominee_mother_name,
                'present_address' => $request->present_address,
                'permanent_address' => $request->permanent_address,
                'percentage' => $request->percentage,
                'gender' => $request->nominee_gender,
                'date_of_birth' => $request->nominee_dob,
                'phone_no' => $request->nominee_phone_no,
            ]);

            if (isset($picture)) {
                $nominee['nominee_picture'] = $picture;
            }

            $nominee->update();

            return redirect()->route('profiles.show', $user->profile->id)->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nominee  $nominee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nominee $nominee)
    {
        //
    }


    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/nominee/');
        if (!File::exists($folder)) {
            $folderCreate = File::makeDirectory($folder, 0775, true, true);
            if (!isset($folderCreate))
                throw new \Exception("Could not permission for creating folder on storage path.", 1);
        }
        $timestamp = str_replace([' ', ':', '-'], '', now());
        $file_name = $timestamp .'_'.$name. '.' .$file->getClientOriginalExtension();
        $file->move($folder, $file_name);

        return $file_name;
    }
    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/nominee/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }
}