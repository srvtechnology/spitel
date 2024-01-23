<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\{
    State,
    Customer,
    City,
    Surname,
    Patti,
    Panth,
    BloodGroup,
    BusinessCategory,
    FamilyMember,
    Profile,
};
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Str;
use Validator;

class CutomerController extends Controller
{

    public function approve_cus($id){
        $post = Customer::find($id);
        $post->system_status = 1;
        $post->save();
        return redirect()->back();
    }

    public function disapprove_cus($id){
        $post = Customer::find($id);
        $post->system_status = 0;
        $post->save();
        return redirect()->back();
    }

    public function index(Request $request)
    {
        $query = Customer::with('native_city')->whereNotNull('first_name')->orderBy('id','ASC');
        if(!empty(request('type')) AND request('type') == 'approve'){
            $query->where('system_status', 1);
        }
        elseif(!empty(request('type')) AND request('type') == 'pending'){
            $query->where('system_status', 0);
        }
        elseif(!empty(request('type')) AND request('type') == 'expired'){
            $query->whereNotNull('date_of_expired');
        }elseif(!empty(request('type')) AND request('type') == 'active'){
            $query->whereDate('end', '>=', date('Y-m-d'))
            ->where('system_status', 1);
        }
        $customers = $query->paginate(10);
        // $customers = Customer::with('native_city')->orderByDesc('id')->orderByDesc('avtar_url')->get();

        $approved_customer = Customer::where('system_status', 1)
                                    ->whereNotNull('first_name')
                                    ->count();
        $pending_customer = Customer::where('system_status', 0)
                                    ->whereNotNull('first_name')
                                    ->count();
        $membership_expired_customer = Customer::whereNotNull('first_name')
									->whereNotNull('date_of_expired')
                                    ->count();
		$active_customer = Customer::whereNotNull('first_name')
									->whereDate('end', '>=', date('Y-m-d'))
									->where('system_status', 1)
                                    ->count();
        return view('admin.customer.index', compact('approved_customer', 'pending_customer', 'membership_expired_customer', 'active_customer','customers'));
    }

    public function customer_search_data(Request $request)
    {
        return $request;
    }

    public function customer_list(Request $request)
    {
        $customers = Customer::whereNotNull('first_name');

        $city = "";

        if ($request->has('city_id') && $request->city_id != '') {
            $customers = $customers->whereHas('city', function($query) use($request){
                $query->where('id', $request->city_id);
            });
            $city = $request->city_id;
        }

        if ($request->has('system_status') && $request->system_status != '') {

			if ($request->system_status == 2) {
				$customers = $customers->whereNotNull('date_of_expired');
			} else if ($request->system_status == 3) {
				$customers = $customers->whereNotNull('first_name')
									->whereDate('end', '>=', date('Y-m-d'))
									->where('system_status', 1);
			}else {
				$customers = $customers->where('system_status', $request->system_status);
			}
        }

        if ($request->has('f_from') && $request->f_from != '' && strtotime($request->f_from) && $request->has('f_to') && $request->f_to != '' && strtotime($request->f_to)) {
            $from_day = date("d", strtotime($request->f_from));
            $from_month = date('m', strtotime($request->f_from));
            $to_day = date('d', strtotime($request->f_to));
            $to_month = date('m', strtotime($request->f_to));

            $customers = $customers->where('status', 3);

            $customers = $customers->whereDay('end', '>=', $from_day)
                                    ->whereDay('end', '<=', $to_day)
                                    ->whereMonth('end', '>=', $from_month)
                                    ->whereMonth('end', '<=', $to_month)
                                    ->whereNotNull('end');
        }

        $customers = $customers->latest('id')->get();
		// dd($customers);

        return Datatables::of($customers)
                        ->addIndexColumn()
                        ->addColumn('customer_id', function($row){
                            return "<input type='checkbox' name='customer_ids[]' class='customer_ids' value='". $row->id ."'>";
                        })
                        ->addColumn('avtar_url', function($row){
                            $avatar_url = $avatar_path= null;
                            if(!empty($row->avtar_url))
                            {
                                $avatar_path =$row->avtar_url;
                                if(app()->environment() == "local")
                                {
                                    $explode = explode("public/",$row->avtar_url);
                                    $avatar_url = $explode[1];
                                    $avatar_path =$avatar_url;
                                    $row['avtar_url'] = asset("/".$avatar_url);
                                }
                            }
                            if(!empty($avatar_path) AND file_exists($avatar_path))
                            {
                                return "<img src='". $row->avtar_url ."' alt='Avtar' width='50' style='border-radius: 50%;'>";
                            }
                            return "-";
                            // return (!is_null($row->avtar_url)) ? "<img src='". $row->avtar_url ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "";
                        })
                        ->addColumn('name', function($row){
                            $surname = (!is_null($row->surname)) ? $row->surname->name : "";
                            return $row->first_name." ".$row->father_husband_name." ".$surname;
                        })
                        ->addColumn('gender', function($row){
                            return ($row->gender == 1) ? "Male" : "Female";
                        })
                        ->addColumn('status', function($row){
                            $status = "";
                            if ($row->system_status == 1) {
                                $status = "<span class='badge badge-success' title='From:- ".$row->start." End:- ".$row->end."'>Approved</span>";
                            } elseif($row->system_status == 0) {
                                $status = "<span class='badge badge-info'>Pending</span>";
                            } else {
                                $status = "<span class='badge badge-danger' title='".$row->comment."'>Reject</span>";
                            }
                            return $status;
                        })
                        ->addColumn('phone', function($row){
                            return $row->phone_no;
                        })
                        ->addColumn('city', function($row){
                            return (!is_null($row->city)) ? $row->city->city : "";
                        })
						->addColumn('native_city', function($row){
                            return (!is_null($row->native_city)) ? $row->native_city->city : "";
                        })
                        ->addColumn('view_member', function($row){
                            return "<a href='/admin/family-member/".$row->id."' class='btn btn-dark btn-sm'>View Family Member</a>";
                        })
                        ->addColumn('add_family_member', function($row){
                            return "<a href='/admin/family-member/add/".$row->id."' class='btn btn-warning btn-sm'>Add Family Member</a>";
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/customer/add/".$row->id."?city=".$city."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/customer/delete/".$row->id."?city=".$city."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/customer/view/".$row->id."?city=".$city."'><i class='fa-solid fa-eye text-primary'></i></a>" : "" ;
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function form($id = null)
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

        $state = State::all();
        $token = Str::random(10);
        $customer = null;
        if (!is_null($id)) {
            $customer = Customer::find($id);
            $token = $customer->token;
			if (is_null($token)){
				$customer->token = Str::random(10).$id;
				$customer->save();
			}
        }
        // dd($customer);
        return view('admin.customer.add', compact('state', 'customer', 'token'));
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }

        $customer = Customer::find($id);

        if (!is_null($customer)) {
            return view('admin.customer.view', compact('customer'));
        }
        return back();

    }

    public function store(Request $request)
    {
//        dd($request->all());

        // $customer = Customer::where('token', $request->token)->first();
        // if (is_null($customer)) {
		if (!empty($request->id)){
			$validated = Validator::make($request->all(), [
                'phone_no' => 'required|digits:10|unique:customers,phone_no,'.$request->id,
            ]);

			$customer = Customer::find($request->id);
		} else {
			$validated = Validator::make($request->all(), [
                'phone_no' => 'required|digits:10|unique:customers,phone_no',
            ]);

            if($validated->fails()){
                return redirect()->back()->withErrors($validated->errors());
            }


            $customer = new Customer;
            $customer->token = $request->token;
		}

        $customer->first_name = $request->first_name;
        $customer->father_husband_name = $request->father_husband_name;
        $customer->surname_id = $request->surname_id;
        $customer->gender = $request->gender;
        $customer->phone_no = $request->phone_no;
        $customer->alt_phone_no = $request->alt_phone_no;
        $customer->email_id = $request->email_address;
        if(isset($request->date_of_birth)){
            $customer->date_of_birth = $request->date_of_birth;
        }


        if(isset($request->to)){
            $customer->start = $request->to;
        }
        if(isset($request->from)){
            $customer->end = $request->from;
        }
        $customer->blood_group_id = $request->blood_group_id;
        $customer->panth_id = $request->panth_id;
        $customer->patti_id = $request->patti_id;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->state_id = $request->state_id;
        $customer->city_id = $request->city_id;
        $customer->status = $request->status_id;
        if(isset($request->date_of_anniversary)){
            $customer->date_of_anniversary = $request->date_of_anniversary;
        }

        $customer->date_of_expired = $request->date_of_expiry;
        $customer->sasural_gautra_id = $request->sasural_gautra_id;
        $customer->education = $request->education;
        $customer->native_address = $request->native_address;
        $customer->native_pincode = $request->native_pincode;
        $customer->native_state_id = $request->native_state_id;
        $customer->native_city_id = $request->native_city_id;
        $customer->business_category_id = $request->business_category_id;
        $customer->company_firm_name = $request->company_firm_name;
        $customer->business_address = $request->business_address;
        $customer->business_state_id = $request->business_state_id;
        $customer->business_city_id = $request->business_city_id;
        $customer->business_pincode = $request->business_pincode;
        $customer->time_of_birth = $request->time_of_birth;
        $customer->birth_place = $request->birth_place;
        $customer->business_designation = $request->designation;
        $customer->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/customer?city=".$request->url_city);
        }

        return redirect("/admin/customer");
    }

    public function destroy($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }

        $customer = Customer::find($id);

        if (!is_null($customer)) {
            $file_url = str_replace("/public", "", $customer->avtar_url);
            if ($file_url != "") {
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }
            }

            $customer->delete();
        }

        return back();
    }

    public function approved(Request $request)
    {
        if ($request->has('customer_ids')) {
//            print_r($request);
            if ($request->has('approve')) {
                foreach ($request->customer_ids as $key => $value) {
                    $customer = Customer::find($value);
                    $customer->system_status = 1;
                    $customer->save();

                }
            } else {
                foreach ($request->customer_ids as $key => $value) {
                    $customer = Customer::find($value);
                    $customer->system_status = 2;
                    $customer->comment = (!empty($request->reason))?$request->reason : '';
                    $customer->save();
                }
            }
        }

        return redirect("/admin/customer");
    }

    public function getStateByCity($city_id)
    {
        return response()->json(
            City::find($city_id)->state_id
        );
    }

    public function getSurname()
    {
        return response()->json(
            Surname::get()
        );
    }

    public function getPanth()
    {
        return response()->json(
            Panth::all()
        );
    }

    public function getPatti()
    {
        return response()->json(
            Patti::all()
        );
    }

    public function getBloodGroup()
    {
        return response()->json(
            BloodGroup::all()
        );
    }

    public function getBusinessCategory()
    {
        return response()->json(
            BusinessCategory::all()
        );
    }

    public function uploadAvtar(Request $request)
    {
        if ($request->has('is_family_member')) {
            $family_memeber = FamilyMember::where('id', $request->id)->first();
            // if (is_null($family_memeber)) {
                // $family_memeber = new FamilyMember;
                // $family_memeber->token = $request->token;
            // }
        } else {
            $customer = Customer::where('token', $request->token)->first();
            if (is_null($customer)) {
                $customer = new Customer;
                $customer->token = $request->token;
            }
        }

        if($request->hasFile('avtar')) {

            if (($request->has('is_family_member') && isset($family_memeber) && (!is_null($family_memeber->id))) || ((isset($customer)) && !is_null($customer->id))) {
                if ($request->has('is_family_member')) {
                    $file_url = str_replace("/public", "", $family_memeber->avtar);
                } else {
                    $file_url = str_replace("/public", "", $customer->avtar_url);
                }
                if ($file_url != '') {
                    if (file_exists(public_path().$file_url)) {
                        unlink(public_path().$file_url);
                    }
                }
            }
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/avtar";
            $tmp_name = $_FILES["avtar"]["tmp_name"];
            $name = rand().basename($_FILES["avtar"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $path = "/public/avtar/$name";
            if ($request->has('is_family_member')) {
                $family_memeber->avtar = $path;
            } else {
                $customer->avtar_url = $path;
            }
        }
        if ($request->has('is_family_member')) {
            $family_memeber->cust_id = $request->cust_id;
            $family_memeber->save();
        } else {
            $customer->save();
        }

        if ($request->has('is_family_member')) {
            if(app()->environment() == "local")
            {
                $explode = explode("public/",$family_memeber->avtar);
                $avatar_url = $explode[1];
                $family_memeber['avtar'] = asset("/".$avatar_url);
            }
            return response()->json($family_memeber);
        } else {
            if(app()->environment() == "local")
            {
                $explode = explode("public/",$customer->avtar_url);
                $avatar_url = $explode[1];
                $customer['avtar_url'] = asset("/".$avatar_url);
            }
            return response()->json($customer);
        }
    }

    public function removeAvtar(int $id, Request $request)
    {
        if ($request->has('family_memeber')) {
            $family_memeber = FamilyMember::find($id);
            if (!is_null($family_memeber)) {
				if(!empty($family_memeber->avtar)) {
					$file_url = str_replace("/public", "", $family_memeber->avtar);
					if (file_exists(public_path().$file_url)) {
						unlink(public_path().$file_url);
					}
				}
            }
            $family_memeber->avtar = null;
            $family_memeber->save();
        } else {
            $customer = Customer::find($id);
            if (!is_null($customer)) {
				if(!empty($customer->avtar_url)) {
					$file_url = str_replace("/public", "", $customer->avtar_url);
					if (file_exists(public_path().$file_url)) {
						unlink(public_path().$file_url);
					}
				}
            }
            $customer->avtar_url = null;
            $customer->save();
        }
        return response()->json(true);
    }

    public function profileApprove(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $customer->system_status = 1;
        $customer->start = $request->start;
        $customer->end = $request->end;
        $customer->save();
        return redirect("/admin/customer");
    }

    public function customer_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }
        // $customers = Customer::with('native_city','surname','city')
        // ->where('first_name','LIKE','%'.$request->search.'%')
        // ->orWhere('phone_no', 'LIKE', '%' . $request->search . '%')
        // ->orderBy('id','ASC')->get();
        $customers = Customer::with('native_city','surname','city')
        ->where(function($query) use ($request) {
            $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('phone_no', 'LIKE', '%' . $request->search . '%');
        })
        ->orderBy('id','ASC')->get();

        foreach($customers as $customer)
        {
            if(!empty($customer->avtar_url))
            {
                $avatar_path =$customer->avtar_url;
                if(app()->environment() == "local")
                {
                    $explode = explode("public/",$customer->avtar_url);
                    $avatar_url = $explode[1];
                    $avatar_path =$avatar_url;
                    $customer['avtar_url'] = asset("/".$avatar_url);
                }
            }
            if(!empty($avatar_path) AND file_exists($avatar_path))
            {
                $customer['avtar_url'] = asset("/".$avatar_url);
            }
            else{
                $customer['avtar_url'] = null;
            }
            if(Auth::user()->is_update)
            {
                $customer['is_update'] = true;
                $customer['is_update_url'] = url('/admin/customer/add/'.$customer->id.'?city='.request('city'));
            }
            if(Auth::user()->is_delete)
            {
                $customer['is_delete'] = true;
                $customer['is_delete_url'] = url('/admin/customer/delete/'.$customer->id.'?city='.request('city'));
            }
            if(Auth::user()->is_view)
            {
                $customer['is_view'] = true;
                $customer['is_view_url'] = url('/admin/customer/view/'.$customer->id.'?city='.request('city'));
            }
        }

        return $customers;
    }
}
