<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class SignupRequestsController extends Controller
{
    // Merchant Signup Requests List
    public function merchantSignupRequestsList(Request $request)
    {
        $list = User::with(['merchant' => function ($query) {
            $query->select('user_id', 'business_name', 'contact_number', 'contact_email', 'referral_user_id');
        }, 'merchant.representative' => function ($query) {
            $query->select('user_id', 'name');
        }])
        ->select('id')
        ->where([['user_type', 'merchant'], ['status', 2]])->latest()->paginate(10);

        return view('web.admins.requests.merchant_signup_requests_index', compact('list'));
    }

    // Merchant Signup Request View
    public function merchantSignupRequestView($id)
    {
        $user = User::with([
            'merchant' => function ($query) {
            $query->first();
        }, 'merchant.representative' => function ($query) {
            $query->select('user_id', 'name');
        }, 'merchant.businessType' => function ($query) {
            $query->select('id', 'name_eng', 'name_arabic');
        }, 'merchant.merchantProductCategories.businessProductCategories'])
        ->select('id')
        ->where([['user_type', 'merchant'], ['status', 2], ['id', $id]])->first();

        $user = $user->merchant;

        return view('web.admins.requests.merchant_signup_request_view', compact('user'));
    }

    // Representative Signup Requests List
    public function representativeSignupRequestsList(Request $request)
    {
        $list = User::with(['representative' => function ($query) {
            $query->select('user_id', 'name', 'mobile_no', 'email', 'city_id');
        }, 'representative.city' => function($query){
            $query->select('id', 'name_eng', 'name_arb');
        }])
        ->select('id')
        ->where([['user_type', 'representative'], ['status', 2]])->latest()->paginate(10);

        return view('web.admins.requests.representative_signup_requests_index', compact('list'));
    }
}