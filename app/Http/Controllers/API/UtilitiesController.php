<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Utilites
};

class UtilitiesController extends Controller
{
    public function index(Request $request)
    {
    	$limit = ($request->has('limit') && $request->limit != "") ? $request->limit : 999999;
    	$utilites = Utilites::latest();

        $filter_from = date("Y-m-d");
        $filter_to = date("Y-m-d");

        if ($request->has('filter_from') && $request->filter_from != "" && strtotime($request->filter_from) && $request->has('filter_to') && $request->filter_to != "" && strtotime($request->filter_to)) {
            $filter_from = $request->filter_from;
            $filter_to = $request->filter_to;
        }

        if ($request->has('city') && $request->city != '') {
            $utilites = $utilites->where('city_id', $request->city);
            $city = $request->city;
        }

        if ($request->has('category_id') && $request->category_id != "") {
            $utilites = $utilites->where('category_id', $request->category_id);
        }

        if ($request->has('sub_category') && $request->sub_category != "") {
            $utilites = $utilites->where('sub_category_id', $request->sub_category);   
        }

        $utilites = $utilites->orderBy('name', 'asc')->paginate($limit);

		return response()->json($utilites);        
    }
}
