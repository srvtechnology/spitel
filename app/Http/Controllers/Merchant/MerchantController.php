<?php

namespace App\Http\Controllers\Merchant;
use App\Models\MerchantCategory;
use App\Models\UserAssignMarchantCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;

class MerchantController extends Controller
{
    function merchantStore(Request $req)
    {

        $merchant = new User;
        $merchant->business_name = $req->business_name;
        $merchant->type_of_employment = $req->type_of_employment;
        $merchant->contact_number = $req->contact_number;
        $merchant->email = $req->email_communication;
        $merchant->manager_name = $req->manager_name;
        $merchant->mob_of_manger = $req->mob_of_manger;
        $merchant->license_no = $req->license_no;
        $merchant->communication_reg_no = $req->communication_reg_no;
        $merchant->representative_offer = $req->representative_offer;
        $merchant->password = Hash::make($req->password);
        $merchant->tax_no = $req->tax_no;
        $merchant->status = 0;
        $merchant->user_type = "merchant";
        if ($req->hasFile('commercial_certificate')) {

            $image = $req->commercial_certificate;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $req->file('commercial_certificate')->move(public_path('images/merchant'), $imageName);
            $merchant->commercial_certificate = $imageName;
        }
        if ($req->hasFile('tax_certificate')) {

            $image = $req->tax_certificate;
            $imageNameTaxCertificate = time() . '.' . $image->getClientOriginalExtension();
            $req->file('tax_certificate')->move(public_path('images/merchant'), $imageNameTaxCertificate);
            $merchant->tax_certificate = $imageNameTaxCertificate;
        }
        $merchant->save();
        $merchan_id = $merchant->id;
        for ($i = 0; $i < count($req->poroduct_category); $i++) {
            echo $req->poroduct_category[$i];
            $assignCategory = new UserAssignMarchantCategory;
            $assignCategory->user_id = $merchan_id;
            $assignCategory->merchant_category_id = $req->poroduct_category[$i];
            $assignCategory->save();
        }
        return redirect(url('/merchants'));
    }

    function changeCategory($category)
    {

        $merchantCategory = MerchantCategory::where('category_type', $category)->get();
        return response()->json([
            'data' => $merchantCategory,
            'status' => true,
        ]);
    }

    function merchantLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = User::where(['email' => $request->email, 'status' => 1, 'user_type' => 'merchant'])->first();
        if ($admin) {

            if (Hash::check($request->input('password'), $admin->password)) {
                Auth::login($admin);
                return redirect(url('/merchant/dashboard'))->with('message', 'Merchant Login Successfully!.');
            } else {

                return redirect()->back()->with('error', 'These credentials do not match our records.');
            }
        } else {

            return redirect()->back()->with('error', 'These credentials do not match our records.');
        }
    }
    public function resetPassword(Request $request)
    {
        $admin = User::where(['email' => $request->email, 'user_type' => 'merchant'])->first();
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
            return redirect(url('/merchant'))->with('message', 'Reset Password Send Your Mail.');
        } else

            return redirect()->back()->with('error', 'These credentials do not match our records.');
    }
    public function merchantLogOut()
    {
        Auth::logout();

        return redirect(url('merchant'))->with('message', 'Merchant Logout Successfully!.');
    }

    public function saveMerchantMenuCat(Request $request){
        dd($request->all());
    }
}
