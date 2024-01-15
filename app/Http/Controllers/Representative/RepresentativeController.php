<?php

namespace App\Http\Controllers\Representative;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Admin\RepresentativeUpdateRequest;
use App\Models\RepresentativeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

class RepresentativeController extends Controller
{
    public function store(RepresentativeUpdateRequest $req)
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
        return redirect(url('/representative'))->with('message', 'Record Added Successfully!');
    }

    public function representativeLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $representative = User::where(['email' => $request->email, 'user_type' => 'representative'])->first();
        if ($representative) {
            if (Hash::check($request->input('password'), $representative->password)) {
                if ($representative->status == 1) {
                    Auth::login($representative);
                    return redirect(url('/representative/dashboard'))->with('message', 'Representative loging Successfully!');
                } else {
                    return redirect()->back()->with('error', 'Please connect with the administrator for activation.');
                }
            } else {
                return redirect()->back()->with('error', 'These credentials do not match our records.');
            }
        } else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function representativeReset(Request $request)
    {
        $presentative = User::where(['email'=>$request->email,'user_type'=>'representative'])->first();
        if ($presentative) {

            $password = Str::random(6);
            $presentative->password = hash::make($password);
            $presentative->save();
            $data = ['name' => $presentative, 'data' => $password];
            // $user['to'] = $admin->email;
            Mail::send('web.admins.auth.mail', $data, function ($messages) use ($presentative) {
                $messages->to($presentative->email);
                $messages->subject('Reset Password');
            });
            return redirect(url('/representative'))->with('message', 'Reset Password Send Your Mail!');
        } else {
            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function representativeLogOut()
    {

        Auth::logout();
        return redirect(url('/representative'))->with('message', 'Representative logOut Successfully!');
    }
}
