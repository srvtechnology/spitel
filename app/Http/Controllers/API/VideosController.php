<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Video
};

class VideosController extends Controller
{
    public function index(Request $request)
    {
    	$limit = ($request->has('limit') && $request->limit != "") ? $request->limit : 30;

		$videos = Video::query();
        $city = "";
        if ($request->has('city') && $request->city != '') {
            $videos = $videos->whereHas('customer', function($query) use($request){
                $query->where('city_id', $request->city);
            });
            $city = $request->city;
        }
        $videos = $videos->orderByDesc('id')->paginate($limit);

        return response()->json($videos);
    }
}
