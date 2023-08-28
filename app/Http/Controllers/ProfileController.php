<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\Relationalinfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProfileRequest;
use App\Models\Faculty;
use App\Models\Nominee;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
// use PDF;
use Illuminate\Database\QueryException;

class ProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
    }

    public function show(Profile $profile)
    {

        $nominee = Nominee::find(Auth::user()->id);
        $relations = Relationalinfo::where('user_id', Auth::user()->id)
                                     ->where('relation', 'Spouse')->get();
        $children = Relationalinfo::where('user_id', Auth::user()->id)
                                    ->where('relation', 'Child')->get();

        $child_count = Relationalinfo::where('user_id', Auth::user()->id)
                                    ->where('relation', 'Child')->count();
        return view('admin.profiles.show', compact('profile', 'relations', 'children', 'child_count', 'nominee'));

    }

    public function edit()
    {
        $faculties = Faculty::all();
        $user = auth()->user();
        return view('admin.profiles.edit', compact('user', 'faculties'));
    }

    public function update(ProfileRequest $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'profile_pic' =>'image|mimes:jpg,png,jpeg|max:286|dimensions:min_width=100,min_height=100,max_width=286,max_height=240',
                'mobile_no'=>'required|min:11'
            ]);

            $user = auth()->user();

            if ($request->hasFile('profile_pic')) {
                $this->unlink($request->profile_pic);
                $picture = $this->uploadFile($request->profile_pic, $user->id);
            }

            // User::create([
            //     'faculty_id' => $request->faculty_id
            // ]);

            $data = [
                'full_name' => $request->full_name,
                'mobile_no' => $request->mobile_no,
                'blood_group' => $request->blood_group,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'marital_status' => $request->marital_status,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'profession' => $request->profession,
                'designation' => $request->designation,
                'organization' => $request->organization,
                'office_address' => $request->office_address,
                'office_add_ps' => $request->office_add_ps,
                'office_district' => $request->office_district,
                'office_add_zip' => $request->office_add_zip,
                'academic_regi_no' => $request->academic_regi_no,
                'academic_hall_of_residence' => $request->academic_hall_of_residence,
                'academic_postgraduate_from' => $request->academic_postgraduate_from,
                'present_address' => $request->present_address,
                'present_add_ps' => $request->present_add_ps,
                'present_district' => $request->present_district,
                'present_add_zip' => $request->present_add_zip,
                'permanent_address' => $request->permanent_address,
                'permanent_add_ps' => $request->permanent_add_ps,
                'permanent_district' => $request->permanent_district,
                'permanent_add_zip' => $request->permanent_add_zip,
            ];

            if (isset($picture)) {
                $data['profile_pic'] = $picture;
            }

            $user->profile->update($data);

            $user->update([
                'name' => $request->full_name,
                'email' => $request->email,
                'faculty_id' => $request->faculty_id
        ]);

            if($user->status == 1){
                return redirect()->route('profiles.show', $user->profile->id)->withMessage('Successfully Updated!');
            } else{
                return redirect()->route('profiles.edit')->withMessage('Successfully Updated!. PlS contact admin to approve your account');
            }

        } catch (QueryException | Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }


    public function destroy(Profile $profile)
    {
        //
    }

    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/profile/');
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
        $pathToUpload = storage_path().'/app/public/profile/';
        if ($file != '' && file_exists($pathToUpload. $file)) {
            @unlink($pathToUpload. $file);
        }
    }

    public function downloadPdf()
    {
        $user = User::all();
        $profile = Profile::all();
        $nominee = Nominee::find(Auth::user()->id);
         $pdf = Pdf::loadView('admin.profiles.pdf', compact('user','profile', 'nominee'));
        return $pdf->download('profiles.pdf');
    }

}