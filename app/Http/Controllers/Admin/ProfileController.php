<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Profile,
    Customer
};
use Yajra\Datatables\Datatables;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }
    

    public function add(Request $request, $id = null)
    {
        if (is_null($id)) {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $profile = Profile::find($id);
        $customer = Customer::select('id', 'first_name')
                            ->where('system_status', 2);
        if ($request->has('city') && $request->city != '') {
            $customer = $customer->where('city_id', $request->city);    
        }
        $customer = $customer->get();

        return view('admin.profile.add', compact('profile', 'customer'));
    }

    public function create(Request $request)
    {
        $profile = new Profile;
        if ($request->has('id') && $request->id != '') {
            $profile = Profile::find($request->id);
        }
        
        if ($request->hasFile('avtar')) {
            if (!is_null($profile->id)) {
                $file_url = str_replace("/public", "", $profile->avtar);
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }
            }
			// $uploads_dir = public_path()."\profile";
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/profile";
            $tmp_name = $_FILES["avtar"]["tmp_name"];
            $name = rand().basename($_FILES["avtar"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $path = "/public/profile/$name";
            $profile->avtar = $path;
        }
        $profile->name = $request->name;
        $profile->mobile_no = $request->mobile_number;
        $profile->email = $request->email;
        $profile->customer_id = $request->customer_id;
        $profile->save();
 
        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/profile?city=".$request->url_city);
        }

        return redirect("/admin/profile");
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }

        $profile = Profile::find($id);

        if (!is_null($profile)) {
            return view('admin.profile.view', compact('profile'));
        }
        return back();
    }
    
    public function delete($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }
        
        $profile = Profile::find($id);

        if (!is_null($profile)) {
            $file_url = str_replace("/public", "", $profile->avtar);
            if (file_exists(public_path().$file_url)) {
                unlink(public_path().$file_url);
            }

            $profile->delete();
        }

        return back();
    }

    public function approved(Request $request)
    {
        if ($request->has('profiles_ids')) {
            $status = ($request->has('approve')) ? 1 : 0 ;
            $comment = ($status == 0) ? $request->reason : null ;
            foreach ($request->profiles_ids as $key => $value) {
                $profile = Profile::find($value);
                $profile->is_approved = $status;
                $profile->comment = $comment;
                $profile->save();
            }
        }

        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $profile = Profile::find($request->id);
            $profile->is_approved = $status;
            $profile->comment = $comment;
            $profile->save();
        }
        return back();
    }
}
