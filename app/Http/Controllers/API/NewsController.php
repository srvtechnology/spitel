<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	News,
	NewsCategory,
	NewsSubCategory,
	FamilyMember
};

class NewsController extends Controller
{

    public function __construct()
    {
//        $current_date = date("m-d");
//
//        $family_members = FamilyMember::whereRaw("DATE_FORMAT(date_of_expiry, '%m-%d') = '$current_date'")->get();
//
//        dd($family_members);

    }


    public function index(Request $request)
    {
        $family_members = FamilyMember::all();
        // foreach($family_members as $family_member)
        // {
        //     if ($family_member->status == 3) {
        //         $cur_date = date("m-d");
        //         $family_mem_expiry_date = date("m-d",strtotime($family_member->date_of_expire));
        //         if($cur_date >= $family_mem_expiry_date)
        //         {
        //             $family_memberId = News::where('family_member_id', $family_member->id)->first();
        //             if(!empty($family_memberId) AND date("Y",strtotime($family_memberId->created_at)) <= date("Y"))
        //             {
        //                 $news = News::where('family_member_id', $family_member->id)->first();
        //             }
        //             else
        //             {
        //                 $news = new News;
        //             }
        //             $news->banner_url = $family_member->avtar;
        //             $news->category_id = 9;
        //             $news->sub_category_id = 6;
        //             $news->customer_id = 0;
        //             $news->name = $family_member->name;
        //             $news->date = $request->date_of_expire;
        //             $news->description = $request->about;
        //             $news->city_id = $family_member->customer->city_id;
        //             $news->family_member_id = $family_member->id;
        //             $news->save();
        //         }
        //     }
        // }
		$city = "";
        $news = new News;

        $filter_from = date("Y-m-d");
        $filter_to = date("Y-m-d");

        if ($request->has('filter_from') && $request->filter_from != "" && strtotime($request->filter_from) && $request->has('filter_to') && $request->filter_to != "" && strtotime($request->filter_to)) {
            $filter_from = $request->filter_from;
            $filter_to = $request->filter_to;
            $news = $news->whereDate('created_at', '>=', $filter_from)
                    ->whereDate('created_at', '<=', $filter_to);
        }

        if ($request->has('city') && $request->city != '') {
            $news = $news->where('city_id', $request->city);
            $city = $request->city;
        }


        if ($request->has('category_id') && $request->category_id != "") {
            $news = $news->where('category_id', $request->category_id);
        }

        if ($request->has('sub_category_id') && $request->sub_category_id != "") {
            $news = $news->where('sub_category_id', $request->sub_category_id);
        }
        $news = $news->with('category:id,name','sub_category:id,name')->orderBy('name', 'asc')->get();

    	return response()->json($news);
    }

    public function category(Request $request)
    {
    	return response()->json(
			NewsCategory::select('id', 'name')->get()
    	);
    }

    public function sub_category(Request $request)
    {
    	$sub_category = NewsSubCategory::select('id', 'name');
    	if ($request->has('category_id') && $request->category_id != "") {
    		$sub_category = $sub_category->where('parent_category_id', $request->category_id);
    	}
		$sub_category = $sub_category->get();
    	return response()->json($sub_category);
    }

}
