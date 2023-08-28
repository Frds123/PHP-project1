<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\WelfareReport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportWelfareReport;
use Illuminate\Support\Facades\Auth;

class WelfareReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 1){
            $payments = Payment::latest()->get();
            $reunionClass = ReunionReport::class;
            return view('admin.welfarereports.index', compact('payments', 'reunionClass'));
        }else{
            $payments = Payment::where('user_id', Auth::user()->id)->get();
            $reunionClass = ReunionReport::class;
            return view('admin.welfarereports.index', compact('payments', 'reunionClass'));
        }
    }

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
     * @param  \App\Models\WelfareReport  $welfareReport
     * @return \Illuminate\Http\Response
     */
    public function show(WelfareReport $welfareReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WelfareReport  $welfareReport
     * @return \Illuminate\Http\Response
     */
    public function edit(WelfareReport $welfareReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WelfareReport  $welfareReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WelfareReport $welfareReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WelfareReport  $welfareReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(WelfareReport $welfareReport)
    {
        //
    }

    public function exportWelfareReports(Request $request)
    {
        return Excel::download(new ExportWelfareReport, 'welfarereport.xlsx');
    }    
}
