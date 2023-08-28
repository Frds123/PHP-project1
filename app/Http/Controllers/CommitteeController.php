<?php

namespace App\Http\Controllers;

use App\Models\CommitteeResulation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Exception;



class CommitteeController extends Controller
{

    public function index()
    {
        $committees = CommitteeResulation::all();
        // dd($committees);
        return view('admin.committee.index', compact('committees'));
    }
    public function index_frontend()
    {
        $committees = CommitteeResulation::all();
        return view('frontend.committee', compact('committees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.committee.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:pdf|max:3000',
        ]);
        try {

            if ($file = $request->file('image')) {
                $fileName = date('YmdHi') . time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/committee'), $fileName);
            }

            $data = [
                'image' => $fileName,
                'uploaded_by' => Auth::id()
            ];

            $committee = new CommitteeResulation();
            $committee->committee_name = $request->committee_name ?? '';
            // $committee->committee_name = $request->committee_name ?? '';
            $committee->save();

            $image = $committee->image();
            $image->create($data);
            return redirect()->route('committee.index')->withMessage('Committee Created !');;
        } catch (QueryException | Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(CommitteeResulation $committee)
    {
        return view('admin.committee.show', compact('committee'));
    }

    public function show_frontend(CommitteeResulation $committee)
    {
        return view('frontend.committee-details', compact('committee'));
    }


    public function edit(CommitteeResulation $committee)
    {
        return view('admin.committee.edit', compact('committee'));
    }


    public function update(Request $request, CommitteeResulation $committee)
    {
        $request->validate([
            'image' => 'required|mimes:pdf|max:3000',
        ]);

        try {
            if ($request->file('image')) {
                $file  = $request->file('image');
                $fileName = date('YmdHi') . time() . '.' . $file->getClientOriginalExtension();
                $file->move(storage_path('app/public/committee'), $fileName);
            }

            $imageData = [
                'image' => $fileName ?? $committee->image->image,
                'uploaded_by' => Auth::id()
            ];

            $data = $request->except('image');
            $committee->update($data);

            $image = $committee->image();
            $image->update($imageData);
            return redirect()->route('committee.index')->withMessage('Event Update !');;
        } catch (QueryException $e) {
            dd($e->getMessage());
        }
    }


    public function destroy(CommitteeResulation $committee)
    {
        try {

            $committee->delete();
        return redirect()->route('committee.index')->withMessage('Committee deleted!.');

        } catch (QueryException $e)  {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
}

}