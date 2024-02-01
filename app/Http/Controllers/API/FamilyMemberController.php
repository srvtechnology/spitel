<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	FamilyMember,
	News
};
use Illuminate\Support\Str;

class FamilyMemberController extends Controller
{

	public function index(Request $request)
	{
		return response()->json(
			FamilyMember::where('cust_id', $request->user()->id)->orderBy('name')->get()
		);
	}

    public function store(Request $request)
    {
		$family_member = new FamilyMember;
		$family_member->token = "APP-".Str::random(6);
		$msg = "Family member added successfully";
		if ($request->has('id') && $request->id != "") {
			$family_member = FamilyMember::find($request->id);
			$msg = "Family member updated successfully";
		}
		//dd($request->allow_matrimony);
		$family_member->avtar = $request->avtar_url;
    	$family_member->cust_id = $request->user()->id;
		$family_member->panth_id = $request->panth_id;
		$family_member->name = $request->name;
		$family_member->gender = $request->gender;
		$family_member->phone_no = $request->phone_no;
		$family_member->relationship_id = $request->relationship_id;
		$family_member->status = $request->status_id;
		$family_member->date_of_anniversary = !empty($request->date_of_anniversary) ? $request->date_of_anniversary : null;
		$family_member->date_of_expire = !empty($request->date_of_expire) ? $request->date_of_expire : null;
		$family_member->date_of_birth = !empty($request->date_of_birth) ? $request->date_of_birth : null;
		$family_member->about = $request->about;
		$family_member->education = $request->education;
		$family_member->blood_group_id = $request->blood_group_id;
		$family_member->allow_matrimony = 0;
		$family_member->time_of_birth = $request->time_of_birth;
		$family_member->birth_place = $request->birth_place;
        $family_member->naniyal_gautra_id = $request->naniyal_gautra_id;
		$family_member->save();

        // if ($family_member->status == 3) {
        //     $news = new News;
        //     $news->banner_url = $family_member->avtar;
        //     $news->category_id = 9;
        //     $news->sub_category_id = 6;
        //     $news->customer_id = 0;
        //     $news->name = $family_member->name;
        //     $news->date = $request->date_of_expire;
        //     $news->description = $request->about;
        //     $news->city_id = $family_member->customer->city_id;
        //     $news->save();
        // }

        return response()->json([
        	'message' => $msg
        ], 200);
    }

    public function delete($id)
    {
    	FamilyMember::destroy($id);
    	return response()->json(true);
    }
}
