<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Traits\message;
use Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControler extends Controller
{
    use message;

    function merchantLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::where('phone','=', $request->phone)->first();
        if ($user) {

            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            
            $input = $request->all();
            $input['email'] = $request->phone . '@gmail.com';
            $input['phone'] = $request->phone;
            $input['user_type'] = 'merchant';
            $password = Str::random(6);
            $input['password'] = Hash::make($password);
            $input['status'] = 1;
            $user = User::create($input);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return $this->sendResponse($success, 'User register successfully.');
        }
    }
}
