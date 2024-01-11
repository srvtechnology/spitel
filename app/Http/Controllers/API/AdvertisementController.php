<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Slide,
	Advertisement
};

class AdvertisementController extends Controller
{
	private $limit;

	function __construct(Request $request)
	{
		$this->limit = ($request->has('limit') && $request->limit != "") ? $request->limit : 0;		
	}

    public function getSLide(Request $request)
    {
        $limit=40;
    	return response()->json(
	        $slide = Slide::latest('id')->paginate($limit)
    	);
    }

    public function index(Request $request)
    {
    	$limit = 40;
    	$addvertisement = Advertisement::where('is_approved', 1);
        $city = "";
        if ($request->has('city_id') && $request->city_id != '') {
            $addvertisement = $addvertisement->where('city_id', $request->city_id);
            $city = $request->city_id;
        }

        if ($request->has('slide') && $request->slide != "") {
        	$addvertisement = $addvertisement->where('slide_id', $request->slide);
        }

//        $addvertisement = $addvertisement->paginate($this->limit);


        return response()->json($addvertisement->orderBy('advertisement_name', 'asc')->get());
    }
}
