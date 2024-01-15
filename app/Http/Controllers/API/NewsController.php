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
		$city = "";
        $news = News::latest();

        $filter_from = date("Y-m-d");
        $filter_to = date("Y-m-d");

        if ($request->has('filter_from') && $request->filter_from != "" && strtotime($request->filter_from) && $request->has('filter_to') && $request->filter_to != "" && strtotime($request->filter_to)) {
            $filter_from = $request->filter_from;
            $filter_to = $request->filter_to;
        }

        if ($request->has('city') && $request->city != '') {
            $news = $news->where('city_id', $request->city);
            $city = $request->city;
        }

        $news = $news->whereDate('created_at', '>=', $filter_from)
                    ->whereDate('created_at', '<=', $filter_to);

        if ($request->has('category_id') && $request->category_id != "") {
            $news = $news->where('category_id', $request->category_id);
        }

        if ($request->has('sub_category_id') && $request->sub_category_id != "") {
            $news = $news->where('sub_category_id', $request->sub_category_id);
        }

        $news = $news->orderBy('name', 'asc')->get();
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
