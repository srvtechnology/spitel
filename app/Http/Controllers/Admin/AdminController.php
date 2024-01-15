<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = User::where(['email' => $request->email, 'status' => 1, 'user_type' => 'admin'])->first();
        if ($admin) {

            if (Hash::check($request->input('password'), $admin->password)) {
                Auth::login($admin);
                return redirect(url('/admin/dashboard'))->with('message', 'Admin Login Successfully!.');
            } else {

                return redirect()->back()->with('error', 'These credentials do not match our records.');
            }
        } else {

            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function adminLogout()
    {
        Auth::logout();
        return redirect('/admin')->with('message', 'Admin logOut Successfully!.');
    }

    public function passwordReset(Request $request)
    {
        $admin = User::where(['email'=>$request->email,'user_type'=>'admin'])->first();
        if ($admin) {
            $password = Str::random(6);
            $admin->password = hash::make($password);
            $admin->save();
            $data = ['name' => $admin, 'data' => $password];
            // $user['to'] = $admin->email;
            Mail::send('web.admins.auth.mail', $data, function ($messages) use ($admin) {
                $messages->to($admin->email);
                $messages->subject('Reset Password');
            });
            return redirect(url('/admin'))->with('message', 'Reset Password Send Your Mail.');
        } else

            return redirect()->back()->with('error', 'These credentials do not match our records.');
    }
}
