<?php

namespace App\Http\Controllers;

use App\Exports\ExportMemberList;
use App\Models\Faculty;
use App\Models\Image;
use App\Models\Nominee;
use App\Models\Payment;
use App\Models\Profile;
use App\Models\Relationalinfo;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('profile')->where('status', config('custom.user_status_pending'))->orWhere('status', config('custom.user_status_denied'))->latest()->get();
        $count = User::where('status', config('custom.user_status_pending'))->count();
        $payments = Payment::latest()->get();
        $reUnionPayRPending = $payments->where('payment_status', 'reunion_registration')->where('is_approved', config('custom.payment_status_pending'))->count();
        //  dd($reUnionPayRPending);
        $welfarefPayRPending = $payments->where('payment_status', 'welfare_registration')->where('is_approved', config('custom.payment_status_pending'))->count();
        //   dd($welfarefPayRPending);


        return view('admin.index', compact('users', 'count', 'payments', 'reUnionPayRPending', 'welfarefPayRPending'));
    }
    public function memberList()
    {

        $users = User::with('profile')->where('status', config('custom.user_status_approved'))->latest()->get();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $admin)
    {

        $profiles = Profile::latest()->find($admin);
        $profile = $profiles[0];
        // dd($profile);
        $relation = '';
        $id = $admin->id;
        $nominee = Nominee::find($id);
        // dd($nominee);
        $relations = Relationalinfo::where('user_id', $id)
            ->where('relation', 'Spouse')->get();
        $children = Relationalinfo::where('user_id', $id)
            ->where('relation', 'Child')->get();
        $child_count = Relationalinfo::where('user_id', $id)
            ->where('relation', 'Child')->count();

        return view('admin.show', compact('admin', 'profile', 'relations', 'children', 'child_count', 'nominee'));
    }
    public function updateUserStatus(Request $request)
    {
        try {
            // if ($request->user_id) {
            User::where('id', $request->user_id)->update([
                'status' => $request->status,
                'status_updated_at' => now()
            ]);
            return redirect()->route('admin.index')->withSuccess("Successfully Updated");
            // }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }


    public function exportMemberLists(Request $request)
    {

        return Excel::download(new ExportMemberList, 'memberlist.xlsx');
    }

    public function destroy($user_id)
    {
        // dd($user_id);
        try {
            Image::where('uploaded_by', $user_id)->delete();
            Nominee::where('user_id', $user_id)->delete();
            Profile::where('user_id', $user_id)->delete();
            User::find($user_id)->delete();
            // dd('checked');

            return redirect()->route('member-list')->withMessage("User Deleted");
        } catch (\Exception $e) {
            dd($e->getMessage());
            // return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }
}
