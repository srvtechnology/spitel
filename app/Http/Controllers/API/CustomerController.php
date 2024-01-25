<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\{
    State,
    Customer,
    City,
    FamilyMember,
    Engagement
};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Requests\Engagement\EngagementRequest;
use App\Http\Resources\Engagement\EngagementResource;

class CustomerController extends Controller
{
    public function getState()
    {
        return response()->json(
            State::all()
        );
    }

    public function getCity()
    {
        return response()->json(
            City::all()
        );
    }
    public function allCitiesOfState(Request $req)
    {
        $state_id=$req->state_id;
        return response()->json(
            City::where('state_id',$state_id)->get()
        );
    }

    public function uploadAvtar(Request $request)
    {
        if ($request->hasFile('avtar')) {
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/public/avtar";
            $tmp_name = $_FILES["avtar"]["tmp_name"];
            $name = rand().basename($_FILES["avtar"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            $path = "/public/avtar/$name";

            return response()->json([
                'file_url' => $path
            ]);
        }
        return response()->json([
            'message' => 'Avtar is required'
        ]);
    }

    public function register(Request $request)
    {
        $request->headers->set('Accept', 'application/json');

    	$validated = $request->validate([
            'first_name' => 'required',
            'father_husband_name' => 'required',
            // 'surname_id' => 'required',
            'gender' => 'required',
            'phone_no' => 'required|digits:10|unique:customers,phone_no,'.$request->id,
            'state_id' => 'required',
            'city_id' => 'required',
        ]);

		if (!is_array($validated) && $validated->fails()) {
	        return response()->json($validated);
        }


        if (($request->has('id') && $request->id != '') || ($request->has('phone_no') && $request->phone_no != '')) {
            $message = "Profile Updated successfully";
            $customer = Customer::find($request->id);

            if (is_null($customer)) {
                $message = 'Customer already registered with this phone number';
                $customer = Customer::where('phone_no', $request->phone_no)->first();

				if (is_null($customer)) {
					$customer = new Customer();
					$message = "Customer registered successfully";
					$customer->token = "APP-".Str::random(6);
				}

            }
        } else {
            $customer = new Customer();
            $message = "Customer registered successfully";
            $customer->token = "APP-".Str::random(6);
        }


        $customer->avtar_url = $request->avtar_url ?? null;
        $customer->first_name = $request->first_name;
        $customer->father_husband_name = $request->father_husband_name;
        $customer->surname_id = $request->surname_id;
        $customer->gender = $request->gender;
        $customer->phone_no = $request->phone_no;
        $customer->alt_phone_no = $request->alt_phone_no;
        $customer->email_id = $request->email_address;
        $customer->date_of_birth = $request->date_of_birth;
        $customer->blood_group_id = $request->blood_group_id;
        $customer->panth_id = $request->panth_id;
        $customer->patti_id = $request->patti_id;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->state_id = $request->state_id;
        $customer->city_id = $request->city_id;
        $customer->status = (isset($request->status_id))?$request->status_id:0;
        $customer->date_of_anniversary = $request->date_of_anniversary;
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
        $customer->system_status = 0;
        $customer->save();

        return  response()->json([
            'message' => $message,
            'customer' => $customer
        ], 200);
    }

    public function otpRequest(Request $request)
    {
        $request->headers->set('Accept', 'application/json');

        $validated = $request->validate([
            'phone_no' => 'required|digits:10'
        ]);

    	if (!is_array($validated) && $validated->fails()) {
	        return response()->json($validated);
        }

        $customer = Customer::where('phone_no', $request->phone_no)->first();

        if (!is_null($customer)) {

            if ($customer->system_status == 2) {
                return response()->json([
                    'message' => 'Your account is not approved please contact admin'
                ]);
            }
			if (!empty($customer->end) && strtotime($customer->end) < time()) {
                return response()->json([
                    'message' => 'Your status is expired'
                ]);
            }

			$otp = rand(111111, 999999);
			$customer->otp = $otp;
			$customer->save();

			return response()->json([
				'otp' => $otp,
				'error' => false
			]);

        } else {
            $customer = new Customer();
            $customer->phone_no = $request->phone_no;
            $otp = rand(111111, 999999);
            $customer->otp = $otp;
            $customer->save();

            return response()->json([
                'otp' => $otp,
                'id' => $customer->id,
                'error' => false
            ]);

//            return response()->json([
//                'message' => 'This phone no is not exist in our system'
//            ]);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->headers->set('Accept', 'application/json');

        $validated = $request->validate([
            'phone_no' => 'required|digits:10',
            'otp' => 'required'
        ]);

        if (!is_array($validated) && $validated->fails()) {
	        return response()->json($validated);
        }

        $customer = Customer::where('phone_no', $request->phone_no)
                            ->where('otp', $request->otp)
                            ->first();

        if (!is_null($customer->first_name)) {
            $customer->otp = null;
            $customer->save();

            return response()->json([
                'message' => 'OTP verify successfully',
                'token' => $customer->createToken('customer_login')->plainTextToken,
                'type' => "bearer",
                'system_status' => $customer->system_status
            ]);
        }elseif(is_null($customer->first_name)){
            return response()->json([
                'message' => 'OTP verify successfully',
                'token' => $customer->createToken('customer_login')->plainTextToken,
                'type' => "bearer",
                'system_status' => 'new_customer'
            ]);

        }else {
            return response()->json([
                'message' => 'Invalid details'
            ]);
        }
    }

    public function view(Request $request)
    {
        return response()->json(
            $request->user()
        );
    }

    public function getCustomer(Request $req)
    {
        if ($req->has('id') && $req->id != '') {
            $id = $req->id;
            if ($id != "") {
                $data = Customer::with('family_members', 'surname_gautra', 'native_city', 'city')->where('id',$id)->where('system_status',1)->whereNotNull('first_name')->orderBy('first_name')->get();
            }
            return response()->json(['data' => $data], 200);
        }
        else{
            $data = Customer::with('family_members', 'surname_gautra', 'native_city', 'city')->where('system_status',1)->whereNotNull('first_name')->orderBy('first_name')->get();

            // foreach($data as $customer) {
                // $family_members = FamilyMember::where('cust_id',$customer->id)->get();
            // }

            return response()->json(['data' => $data], 200);
        }
    }

	public function uploadImage(Request $request)
	{
		$path = '';
		if($request->hasFile('avtar')) {
			$uploads_dir = $_SERVER['DOCUMENT_ROOT']."/public/avtar";
			$tmp_name = $_FILES["avtar"]["tmp_name"];
			$name = rand().basename($_FILES["avtar"]["name"]);
			move_uploaded_file($tmp_name, "$uploads_dir/$name");

			$path = "/public/avtar/$name";
		}


		return response()->json($path);
	}

	public function getAllCustomer(Request $req)
    {
        if ($req->has('id') && $req->id != '') {
            $id = $req->id;
            if ($id != "") {
                $data = Customer::with('family_members', 'surname_gautra', 'native_city', 'city')->where('id',$id)->where('system_status',1)->whereNotNull('first_name')->orderBy('first_name')->get();
            }
            return response()->json(['data' => $data], 200);
        }
        else{
            $data = Customer::with('family_members', 'surname_gautra', 'native_city', 'city')->where('system_status',1)->whereNotNull('first_name')->orderBy('first_name')->get();

			$arr = [];
            foreach($data as $customer) {
                //$family_members = FamilyMember::where('cust_id',$customer->id)->get();
				$surname = isset($customer->surname_gautra->name) ? $customer->surname_gautra->name : '';
				$arr[] = [
					"id"=> $customer->id,
					"avtar_url"=> $customer->avtar_url,
					"full_name"=> $customer->first_name .' '.$customer->father_husband_name.' '.$surname,
					"first_name"=> $customer->first_name,
					"father_husband_name"=> $customer->father_husband_name,
					"surname_id"=> $customer->surname_id,
					"name"=> $customer->first_name.' '.$surname,
					"panth_id"=> $customer->panth_id,
					"patti_id"=> $customer->patti_id,
					"date_of_birth"=> $customer->date_of_birth,
					"gender"=> $customer->gender,
					"phone_no"=> $customer->phone_no,
					"alt_phone_no"=> $customer->alt_phone_no,
					"email_id"=> $customer->email_id,
					"blood_group_id"=> $customer->blood_group_id,
					"address"=> $customer->address,
					"pincode"=> $customer->pincode,
					"city_id"=> $customer->city_id,
					"state_id"=> $customer->state_id,
					"status"=> $customer->status,
					"time_of_birth"=> $customer->time_of_birth,
					"birth_place"=> $customer->birth_place,
					"date_of_anniversary"=> $customer->date_of_anniversary,
					"sasural_gautra_id"=> $customer->sasural_gautra_id,
					"date_of_expired"=> $customer->date_of_expired,
					"education"=> $customer->education,
					"native_address"=> $customer->native_address,
					"native_pincode"=> $customer->native_pincode,
					"native_state_id"=> $customer->native_state_id,
					"native_city_id"=> $customer->native_city_id,
					"business_category_id"=> $customer->business_category_id,
					"company_firm_name"=> $customer->company_firm_name,
					"business_designation"=> $customer->business_designation,
					"business_address"=> $customer->business_address,
					"business_pincode"=> $customer->business_pincode,
					"business_state_id"=> $customer->business_state_id,
					"business_city_id"=> $customer->business_city_id,
					"system_status"=> $customer->system_status,
					"comment"=> $customer->comment,
					"otp"=> $customer->otp,
					"token"=> $customer->token,
					"start"=> $customer->start,
					"end"=> $customer->end,
					"created_at"=> $customer->created_at,
					"updated_at"=> $customer->updated_at,
					"family_members"=> $customer->family_members,
					"surname_gautra"=> $customer->surname_gautra,
					"native_city"=> $customer->native_city,
					"city"=> $customer->city,
				];

            }

            return response()->json(['data' => $arr], 200);
        }
    }

    public function engagements(): JsonResource
    {
        $engagements = Engagement::all();
        return EngagementResource::collection($engagements);
    }


    public function setEngagementsCity()
    {
        $engagements = Engagement::all();
        foreach($engagements as $engagement)
        {
            $bride_current_city_match = preg_match_all('/\d+/', $engagement->bride_current_city, $matches);
            if($bride_current_city_match == 1)
            {
                $engagement->bride_current_city = City::find($engagement->bride_current_city)->city;
            }
            $bride_native_city_match = preg_match_all('/\d+/', $engagement->bride_native_city, $matches);
            if($bride_native_city_match == 1)
            {
                $engagement->bride_native_city = City::find($engagement->bride_native_city)->city;
            }
            $groom_current_city_match = preg_match_all('/\d+/', $engagement->groom_current_city, $matches);
            if($groom_current_city_match == 1)
            {
                $engagement->groom_current_city = City::find($engagement->groom_current_city)->city;
            }
            $groom_native_city_match = preg_match_all('/\d+/', $engagement->groom_native_city, $matches);
            if($groom_native_city_match == 1)
            {
                $engagement->groom_native_city = City::find($engagement->groom_native_city)->city;
            }

            $engagement->save();
        }

        return "Done";
    }
}
