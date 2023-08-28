<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\ReunionReport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\QueryException;

class PaymentController extends Controller
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
            return view('admin.payment.index', compact('payments', 'reunionClass'));
        }else{
            $payments = Payment::where('user_id', Auth::user()->id)->get();
            $reunionClass = ReunionReport::class;
            return view('admin.payment.index', compact('payments', 'reunionClass'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $payable_amount = 4500;
        $relationalInfo = auth()->user()->relationalinfo;
        $childrens = [];
        $spouseOrHusbands = [];
        foreach($relationalInfo as $relative ){
            if($relative->relation == 'Child') {
                $childrens[] = $relative;
            }
        }
        foreach($relationalInfo as $partner ){
            if($partner->relation == 'Spouse') {
                $spouseOrHusbands[] = $partner;
            }
        }
        return view('admin.payment.create', compact('relationalInfo', 'spouseOrHusbands', 'childrens'));
    }

    public function store(Request $request)
    {
        // dd($request);
        try{
            // Value Set of Reunion
            if (array_key_exists('spouseOrHusbands', $request->all())) {
                $spouseArray = [];
                $childrenArray = [];
                if (count($request->spouseOrHusbands)) {
                    foreach ($request->spouseOrHusbands as $spouseOrHusband) {
                        $formattedSpouseOrHusband = json_decode($spouseOrHusband, true);
                        $spouseData = [
                            'name' => $formattedSpouseOrHusband['name'],
                        ];
                        $spouseArray[$formattedSpouseOrHusband['id']] = $spouseData;
                    }
                }
                if (count($request->childrens)) {
                    foreach ($request->childrens as $children) {
                        $formattedChildren = json_decode($children, true);
                        if ($formattedChildren['relation'] == 'Children') {
                            $data = [
                                'name' => $formattedChildren['name'],
                                'age' => $this->getAge($request['dob']),
                            ];
                            $childrenArray[$formattedChildren['id']] = $data;
                        }
                    }
                }
                $husbandOrSpouseAttendies = [
                    "spouse" => $spouseArray,
                    "childrens" => $childrenArray,
                    "guest" => $request->guest
                ];
            }
            // Value Set of Welfare
            if (array_key_exists('deposit_from_month', $request->all())) {
                $welfareData = [
                    "deposit_from_month" => $request->deposit_from_month,
                    "deposit_from_year" => $request->deposit_from_year,
                    "deposit_to_month" => $request->deposit_to_month,
                    "deposit_to_year" => $request->deposit_to_year,
                    "month_count" => $request->month_count,
                    "details" => $request->details,
                ];
            }

            $payment = Payment::create([
                "user_id" => $request->user_id,
                "alumni" => $request->alumni ?? null,
                "deposit_total_amount" => $request->deposit_total_amount ?? null,
                "grand_total_amount" => $request->grand_total_amount ?? null,
                "payment_status" => $request->paymentable_type ?? null,
                "payment_type" => $request->payment_type ?? null,
                "payment_date" => $request->payment_date ?? null,
                "payment_description" => $request->payment_description ?? null,
                "voucher_no" => isset($request->voucher_no) ? $request->voucher_no : null,
                "voucher_date" => isset($request->voucher_date) ? $request->voucher_date : null,
                "deposit_from_branch_code" => isset($request->deposit_from_branch_code) ? $request->deposit_from_branch_code : null,
                "reunion_info_json" => isset($husbandOrSpouseAttendies) ? json_encode($husbandOrSpouseAttendies, true) : null,
                "welfare_info_json" => isset($welfareData) ? json_encode($welfareData, true) : null,
                "created_by" => auth()->user()->id ?? null,
            ]);

            if ($request->hasFile('family_picture')) {
                $picture = $this->uploadFile($request->family_picture, $request->user_id);
                Image::create([
                    "imageable_id" => $payment->id,
                    "imageable_type" => Payment::class,
                    "image" => $picture,
                    "uploaded_by" => auth()->user()->id
                ]);
            }
            if ($request->hasFile('voucher_picture')) {
                $picture = $this->uploadFile($request->voucher_picture, $request->user_id);
                Image::create([
                    "imageable_id" => $payment->id,
                    "imageable_type" => Payment::class,
                    "image" => $picture,
                    "uploaded_by" => auth()->user()->id
                ]);
            }

            return redirect()->route('payment.index')->withMessage("Successfully Saved");

        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function getAge($birthdayDate) {
        return floor(((time() - strtotime($birthdayDate))/31556926)/24);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('admin.payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.payment.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function updatePaymentStatus(Request $request)
    {
        try {
            Payment::where('id', $request->id)->update([
                "is_approved" => $request->is_approved,
                "approved_at" => now()
            ]);

            return redirect()->route('payment.index')->withMessage("Successfully Updated");

        } catch (\Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    private function uploadFile($file, $name)
    {
        $folder = storage_path('/app/public/images/');
        if (!File::exists($folder)) {
            $folderCreate = File::makeDirectory($folder, 0775, true, true);
            if (!isset($folderCreate))
                throw new \Exception("Could not permission for creating folder on storage path.", 1);
        }
        $timestamp = str_replace([' ', ':'], '', now());
        $file_name = $timestamp .'_'.$name. '.' .$file->getClientOriginalExtension();
        $file->move($folder, $file_name);

        return $file_name;
    }

}