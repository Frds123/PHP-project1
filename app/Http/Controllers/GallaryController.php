<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use App\Models\Image;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GallaryController extends Controller
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
        //  dd($gallaries);
        return view('admin.galleries.index', compact('gallaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'image' => 'required',
        // ]);
        if ($request->hasFile('gallery_pic')) {
            $this->unlink($request->gallery_pic);
            $picture = $this->uploadFile($request->gallery_pic,  $request->id);
        }

        // if ($file = $request->file('gallery_pic')) {
        //     $fileName = date('YmdHi') . time() . '.' . $file->getClientOriginalExtension();
        //     $file->move(storage_path('app/public/gallaries'), $fileName);
        // }

        $data = [
            'image' => $picture,
            'uploaded_by' => Auth::id()
        ];

        $gallery = new Gallary();
        $gallery->is_show_slider = $request->is_show_slider ?? 0;

        $gallery->save();

        $image = $gallery->image();

        $image->create($data);
        //  Gallary::image()->create($data);
        // $image = Image::find('ima');
        // dd($image);
        return redirect()->route('galleries.index')->withMessage('Gallery Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallary $gallary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallary $gallary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallary $gallary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($gallary)
    {
        //  dd($gallary);

        try {
            $regallary = Gallary::find($gallary);

            $image_path = public_path("\storage\gallaries\\") . $regallary->image;

            // dd($image_path);

            Image::where('imageable_id', '=',  $regallary->id)->delete();
            if (File::exists($image_path)) {
                File::delete($image_path);
            } else {
                $regallary->delete();
                //abort(404);
            }

            $regallary->delete();


            return redirect()->route('galleries.index')->withMessage('Image Deleted !');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/gallaries/');
        if (!File::exists($folder)) {
            $folderCreate = File::makeDirectory($folder, 0775, true, true);
            if (!isset($folderCreate))
                throw new \Exception("Could not permission for creating folder on storage path.", 1);
        }
        $timestamp = str_replace([' ', ':', '-'], '', now());
        $file_name = $timestamp . '_' . $name . '.' . $file->getClientOriginalExtension();
        $file->move($folder, $file_name);

        return $file_name;
    }
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/gallaries/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}