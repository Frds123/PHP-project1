<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\ReunionReport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportReunionReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReunionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == 1) {
            $payments = Payment::latest()->get();
            $reunionClass = ReunionReport::class;
            return view('admin.reunionreports.index', compact('payments', 'reunionClass'));
        } else {
            $payments = Payment::where('user_id', Auth::user()->id)->get();
            $reunionClass = ReunionReport::class;
            return view('admin.reunionreports.index', compact('payments', 'reunionClass'));
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
     * @param  \App\Models\ReunionReport  $reunionReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReunionReport $reunionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReunionReport  $reunionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReunionReport $reunionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReunionReport  $reunionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReunionReport $reunionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReunionReport  $reunionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReunionReport $reunionReport)
    {
        //
    }

    public function exportReunionReports(Request $request)
    {
        return Excel::download(new ExportReunionReport, 'reunionreport.xlsx');
    }
}