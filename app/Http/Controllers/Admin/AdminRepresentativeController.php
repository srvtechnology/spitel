<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\User;
use App\Http\Requests\Admin\RepresentativeRequest;
use App\Http\Requests\Admin\RepresentativeUpdateRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\RepresentativeUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRepresentativeController extends Controller
{
    function index()
    {
        $representatives = RepresentativeUser::get();
        if (request('id') || request('mobile') || request('name') || request('status') !== null) {
            $query = RepresentativeUser::query();

            if (request('id') !== null) {
                $query->where('id', 'like', '%' . request('id') . '%');
            }

            if (request('mobile') !== null) {
                $query->where('mobile_no', 'like', '%' . request('mobile') . '%');
            }
            if (request('name') !== null) {
                $query->where('name', 'like', '%' . request('name') . '%');
            }

            if (request('status') !== null) {
                $representatives = $query->whereHas('userList', function ($q) {
                    $q->where('status', request('status'));
                })->with(['userList' => function ($q) {
                    $q->where('status', request('status'));
                }])->get();
            } else {
                $representatives = $query->get();
            }
        }

        $activeRepresentative = User::where(['user_type' => 'represervative', 'status' => 1])->count();
        $inactiveRepresentative = User::where(['user_type' => 'represervative', 'status' => 0])->count();
        // $activeRepresentative = User::where(['user_type' => 'represervative', 'status' => 1])->count();

        return view('web.admins.representative.representative_index', compact('representatives', 'activeRepresentative', 'inactiveRepresentative'));
    }
    function add()
    {
        return view('web.admins.representative.representative_add');
    }
    function store(RepresentativeRequest $req)
    {

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->status = $req->status;
        $user->user_type = "represervative";
        $user->save();
        $user_id = $user->id;
        $representative = new RepresentativeUser;
        $representative->name = $req->name;
        $representative->user_id = $user_id;
        $representative->email = $req->email;
        $representative->mobile_no = $req->mobile_no;
        $representative->id_number = $req->id_number;
        $representative->city = $req->city;
        $representative->neighborhood = $req->neighborhood;
        $representative->neighborhood_1 = $req->neighborhood_1;
        $representative->reference_code = Str::random(8);

        if ($req->hasFile('img')) {
            $image = $req->img;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $req->file('img')->move(public_path('images/representative'), $imageName);
            $representative->img = $imageName;
        }

        if ($req->hasFile('other_doc')) {
            $imageOtherDoc = $req->other_doc;
            $imageNameOtherDoc = time() . '.' . $imageOtherDoc->getClientOriginalExtension();
            $req->file('other_doc')->move(public_path('images/representative'), $imageNameOtherDoc);
            $representative->other_doc = $imageNameOtherDoc;
        }

        if ($req->hasFile('id_upload')) {
            $imageIdUpload = $req->id_upload;
            $imageNameIdUpload = time() . '.' . $imageIdUpload->getClientOriginalExtension();
            $req->file('id_upload')->move(public_path('images/representative'), $imageNameIdUpload);
            $representative->id_upload = $imageNameIdUpload;
        }

        $representative->save();
        return redirect(url('admin/representative/list'))->with('message', 'Record Added Successfully!');
    }
    function edit($id)
    {
        $representative = RepresentativeUser::where('user_id', $id)->first();
        return view('web.admins.representative.representative_edit', compact('representative'));
    }
    function update(RepresentativeUpdateRequest $req, $id)
    {
        $user = User::findorfail($id);
        $user->name = $req->name;
        $user->status = $req->status;
        $user->save();
        $representative = RepresentativeUser::where('user_id', $id)->first();
        $representative->name = $req->name;
        $representative->mobile_no = $req->mobile_no;
        $representative->id_number = $req->id_number;
        $representative->city = $req->city;
        $representative->neighborhood = $req->neighborhood;
        $representative->neighborhood_1 = $req->neighborhood_1;

        if ($req->hasFile('img')) {
            $image = $req->img;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $req->file('img')->move(public_path('images/representative'), $imageName);
            $representative->img = $imageName;
        }

        if ($req->hasFile('other_doc')) {
            $imageOtherDoc = $req->other_doc;
            $imageNameOtherDoc = time() . '.' . $imageOtherDoc->getClientOriginalExtension();
            $req->file('other_doc')->move(public_path('images/representative'), $imageNameOtherDoc);
            $representative->other_doc = $imageNameOtherDoc;
        }

        if ($req->hasFile('id_upload')) {
            $imageIdUpload = $req->id_upload;
            $imageNameIdUpload = time() . '.' . $imageIdUpload->getClientOriginalExtension();
            $req->file('id_upload')->move(public_path('images/representative'), $imageNameIdUpload);
            $representative->id_upload = $imageNameIdUpload;
        }

        $representative->save();

        return redirect(url('admin/representative/list'))->with('message', 'Record Updated Successfully!');
    }
    function detail($id)
    {
        $representative = RepresentativeUser::where('user_id', $id)->first();
        return view('web.admins.representative.representative_detail', compact('representative'));
    }
    function delete($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return back()->with('message', 'Record Deleted Successfully!');
    }

    function representatviteStatusChange(Request $request)
    {
        $user = User::findorfail($request->id);
        $user->status = $request->status;
        if ($request->status == "1") {
            $user->reason_change_status = null;
        }
        $user->save();
    }

    function representatviteStatusChangeInactive(Request $request)
    {
        $user = User::findorfail($request->id);
        $user->status = $request->status;
        if ($request->method == "inactive") {
            $user->reason_change_status = $request->reasonData;
        }
        $user->save();

        return back()->with('message', 'Status Changed Successfully!');
    }
}
