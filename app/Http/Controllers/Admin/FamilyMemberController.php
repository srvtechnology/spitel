<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Relationship,
	Customer,
	FamilyMember,
    News
};
use Yajra\Datatables\Datatables;
use Auth;
use Illuminate\Support\Str;

class FamilyMemberController extends Controller
{
    public function index(int $customer_id)
    {
    	$customer = Customer::find($customer_id);
    	if (!is_null($customer)) {
	    	return view('admin.family_member.index', compact('customer'));
    	}
    	return back();
    }

    public function list(Request $request)
    {
    	$city = "";
    	$family_member = FamilyMember::with(['panth', 'relationship', 'blood_group'])
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

    	$family_member = $family_member->latest('id')->get();

        return Datatables::of($family_member)
                        ->addIndexColumn()
                        ->addColumn('avtar', function($row){
                            return (!is_null($row->avtar)) ? "<img src='". $row->avtar ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" ;
                        })
                        ->addColumn('relation', function($row){
                        	return (!is_null($row->relationship)) ? $row->relationship->name : "" ;
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/family-member/add/".$row->cust_id."/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/family-member/delete/member/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/family-member/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ; 
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function add(int $customer_id, int $id = null)
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

        $token = Str::random(10);
        $customer = Customer::find($customer_id);
        if (!is_null($customer)) {
        	$family_member = null;
	        if (!is_null($id)) {
	            $family_member = FamilyMember::find($id);
	            $token = $family_member->token;
	        }
	    	return view('admin.family_member.add', compact('token', 'family_member', 'customer_id', 'customer'));
        }
        return back();
    }

    public function store(Request $request)
    {
    	$family_member = FamilyMember::where('id', $request->family_member_id)->first();
		
    	if (is_null($family_member)) {
    		$family_member = new FamilyMember;
    		$family_member->token = $request->token;
    	}
		$family_member->cust_id = $request->cust_id;
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
		$family_member->allow_matrimony = ($request->has('allow_matrimony')) ? 1 : 0 ;
		$family_member->time_of_birth = $request->time_of_birth;
		$family_member->birth_place = $request->birth_place;
        $family_member->naniyal_gautra_id = $request->naniyal_gautra_id;
		$family_member->save();

        if ($family_member->status == 3) {
            $family_memberId = News::where('family_member_id', $family_member->id)->first();
            $news = new News;
            $news->banner_url = $family_member->avtar;
//            $news->category_id = 10;
//            $news->sub_category_id = 9;
            $news->category_id = 9;
            $news->sub_category_id = 6;
            $news->customer_id = 0;
            $news->name = $family_member->name;
            $news->date = $request->date_of_expire;
            $news->description = $request->about;
            $news->city_id = $family_member->customer->city_id;
            $news->family_member_id = $family_member->id;
            if (!$family_memberId) {
                $news->save();
            }
        }

    	if ($request->has('url_city') && $request->url_city != '') {
	    	return redirect("/admin/family-member/".$family_member->cust_id."?city=".$request->url_city);
    	}
    	return redirect("/admin/family-member/".$family_member->cust_id);
    }

    public function view(int $id)
    {
    	$family_member = FamilyMember::find($id);
    	if (!is_null($family_member)) {
	    	return view('admin.family_member.view', compact('family_member'));
    	}
    	return back();
    }

    public function getRelationShip()
    {
    	return response()->json(
			Relationship::all()
    	);
    }

    public function delete(int $id)
    {
    	FamilyMember::destroy($id);
    	return back();
    }
}
