<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	FamilyMember
};
use Illuminate\Support\Str;

class MatrimonyController extends Controller
{
    public function index(Request $request)
    {
    	$limit = ($request->has('limit') && $request->limit != "") ? $request->limit : 999999;
        $city = "";
        $family_member = FamilyMember::with(['panth', 'relationship', 'blood_group', 'customer', 'customer.native_city', 'customer.city', 'customer.surname'])
                                    ->where('allow_matrimony', 1)
                                    ->whereNull('date_of_expire')
                                    ->whereNotNull('name')
									->orderBy('name');


        if ($request->has('cust_id') && $request->cust_id != '') {
            $family_member = $family_member->where('cust_id', $request->cust_id);           
        }
        
        if ($request->has('city_id') && $request->city_id != '') {
            $family_member = $family_member->whereHas('customer', function($query) use ($request){
                $query->where('city_id', $request->city_id);
            });
            $city = $request->city_id;
        }
        // $family_member->where(function($query){
            // $query->where('status', 2);
            // $query->orWhere('status', 4);
        // });

        $family_member = $family_member->latest('id')->paginate($limit);

        return response()->json($family_member);
    }

    public function store(Request $request){

//        $data = new Matrimony();
//
//        if($request->hasfile('avtar_url'))
//        {
//            $file = $request->file('avtar_url');
//            $extenstion = $file->getClientOriginalExtension();
//            $filename = time().'.'.$extenstion;
//            $file->move('matrimony_profile', $filename);
//            $data->avtar_url = $filename;
//        }
//
//        $data->customer_id = $request->customer_id;
//        $data->full_name = $request->full_name;
//        $data->gautra = $request->gautra;
//        $data->nanihal_gautra = $request->nanihal_gautra;
//        $data->date_of_birth = $request->date_of_birth;
//        $data->birth_time = $request->birth_time;
//        $data->birth_place = $request->birth_place;
//        $data->blood_group = $request->blood_group;
//        $data->education = $request->education;
//        $data->designation = $request->designation;
//        $data->company = $request->company;
//        $data->office_no = $request->office_no;
//        $data->address = $request->address;
//        $data->city_id = $request->city_id;
//        $data->state_id = $request->state_id;
//        $data->father_name = $request->father_name;
//        $data->mother_name = $request->mother_name;
//        $data->sister_name = $request->sister_name;
//        $data->brother_name = $request->brother_name;
//        $data->save();
//        return response()->json(['data'=>$data],200);

        $family_member = new FamilyMember;
        $family_member->token = "APP-".Str::random(6);
        $msg = "Family member added successfully";
        if ($request->has('id') && $request->id != "") {
            $family_member = FamilyMember::find($request->id);
            $msg = "Family member updated successfully";
        }
        $family_member->avtar = $request->avtar;
        $family_member->cust_id = $request->cust_id;
//        $family_member->cust_id = $request->user()->id;
        $family_member->panth_id = $request->panth_id;
        $family_member->name = $request->name;
        $family_member->gender = $request->gender;
        $family_member->phone_no = $request->phone_no;
        $family_member->relationship_id = $request->relationship_id;
        $family_member->status = $request->status_id;
        $family_member->date_of_anniversary = $request->date_of_anniversary;
        $family_member->date_of_expire = $request->date_of_expire;
        $family_member->date_of_birth = $request->date_of_birth;
        $family_member->about = $request->about;
        $family_member->education = $request->education;
        $family_member->blood_group_id = $request->blood_group_id;
        $family_member->allow_matrimony = ($request->has('allow_matrimony')) ==1;
        $family_member->time_of_birth = $request->time_of_birth;
        $family_member->birth_place = $request->birth_place;
        $family_member->naniyal_gautra_id = $request->naniyal_gautra_id;
        $family_member->save();

        if ($family_member->status == 3) {
            $news = new News;
            $news->banner_url = $family_member->avtar;
            $news->category_id = 10;
            $news->sub_category_id = 9;
            $news->customer_id = 0;
            $news->name = $family_member->name;
            $news->date = $request->date_of_expire;
            $news->description = $request->about;
            $news->city_id = $family_member->customer->city_id;
            $news->save();
        }

        return response()->json([
            'message' => $msg
        ], 200);
    }
    public function listbyid(Request $request)
    {
//        $id = $request->id;
//        $data = Matrimony::find($id);
//        $data = FamilyMember::get();
//        return response()->json(['data',$data],200);

        $limit = ($request->has('limit') && $request->limit != "") ? $request->limit : 1;
        $city = "";
        $family_member = FamilyMember::with(['panth', 'relationship', 'blood_group'])
            ->whereNotNull('allow_matrimony')
            ->whereNull('date_of_expire')
            ->whereNotNull('name');

        if ($request->has('cust_id') && $request->cust_id != '') {
            $family_member = $family_member->where('cust_id', $request->cust_id);
        }

        if ($request->has('city_id') && $request->city_id != '') {
            $family_member = $family_member->whereHas('customer', function($query) use ($request){
                $query->where('city_id', $request->city_id);
            });
            $city = $request->city_id;
        }
        
        $family_member = $family_member->latest('id')->paginate($limit);

        return response()->json(['data',$family_member],200);


    }

}
