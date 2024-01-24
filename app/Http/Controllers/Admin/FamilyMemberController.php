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

            $city = "";
            $family_member = FamilyMember::with(['panth', 'relationship', 'blood_group'])
                ->where('cust_id', $customer_id)->whereNotNull('name');

            if (request('city_id') && request('city_id') != '') {
                $family_member = $family_member->whereHas('customer', function($query) use ($request){
                    $query->where('city_id', request('city_id'));
                });
                $city = request('city_id');
            }

            $family_member = $family_member->OrderBy('id','DESC')->paginate(10);

	    	return view('admin.family_member.index', compact('customer','family_member'));
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
                            $avatar_url = $avatar_path = null;

                            if (!empty($row->avtar)) {
                                $avatar_path = $row->avtar;

                                if (app()->environment() == "local") {
                                    $explode = explode("public/", $row->avtar);
                                    $avatar_url = $explode[1];
                                    $avatar_path = $avatar_url;
                                    $row->avtar = asset("/" . $avatar_url);
                                }
                            }

                            if (!empty($avatar_path) && file_exists($avatar_path)) {
                                return "<img src='" . $row->avtar . "' alt='Avatar' width='120' style='border-radius: 50px;'>";
                            } else {
                                return "-";
                            }

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

        // if ($family_member->status == 3) {
        //     $family_memberId = News::where('family_member_id', $family_member->id)->first();
        //     $news = new News;
        //     $news->banner_url = $family_member->avtar;
        //     $news->category_id = 9;
        //     $news->sub_category_id = 6;
        //     $news->customer_id = 0;
        //     $news->name = $family_member->name;
        //     $news->date = $request->date_of_expire;
        //     $news->description = $request->about;
        //     $news->city_id = $family_member->customer->city_id;
        //     $news->family_member_id = $family_member->id;
        //     if (!$family_memberId) {
        //         $news->save();
        //     }
        // }

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

    public function ajax_search(Request $request)
    {
        if (empty($request->search)) {
            return "no";
        }

        $family_members = FamilyMember::with(['panth', 'relationship', 'blood_group'])
            ->whereNotNull('name')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->get();

        $html = '';

        foreach ($family_members as $row) {
            $avatar_path = '';

            if (!empty($row->avtar)) {
                $avatar_path = $row->avtar;

                if (app()->environment() == "local") {
                    $explode = explode("public/", $row->avtar);
                    $avatar_url = $explode[1];
                    $avatar_path = $avatar_url;
                    $row->avtar = asset("/" . $avatar_url);
                }
            }

            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>';
            if (!empty($avatar_path) && file_exists($avatar_path)) {
                $html .= '<img src="' . $row->avtar . '" alt="Avatar" width="120" style="border-radius: 50px;">';
            } else {
                $html .= '-';
            }
            $html .= '</td>';
            $html .= '<td>' . $row->name . '</td>';
            $html .= '<td>' . ($row->gender == 1 ? "Male" : "Female") . '</td>';
            $html .= '<td>' . (!is_null($row->relationship) ? $row->relationship->name : "") . '</td>';
            $html .= '<td>' . (!empty($row->phone_no) ? $row->phone_no : "-") . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';
            if (Auth::user()->is_update) {
                $html .= '<a href="' . url('/admin/family-member/add/' . $row->id . '?city=' . request('city')) . '"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }
            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/family-member/delete/' . $row->id . '?city=' . request('city')) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }
            if (Auth::user()->is_view) {
                $html .= '<a href="' . url('/admin/family-member/view/' . $row->id . '?city=' . request('city')) . '"><i class="fa-solid fa-eye text-primary"></i></a>&nbsp;';
            }
            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }
}
