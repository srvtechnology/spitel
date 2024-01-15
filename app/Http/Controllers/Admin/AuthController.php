<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
       // dd("test");
        // return $request;
        $type = filter_var($request->email_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone_no';
        if(Auth::attempt([$type => $request->email_phone, 'password' => $request->password]))
        {
            $request->session()->regenerate();
            return redirect('/admin/customer');
        }
        else
        {
            return back()->with("msg", "Invalid Detail");
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/');
    }
}
