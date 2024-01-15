<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    State,
    City
};

class GlobalController extends Controller
{
    public function getState(Request $request)
    {
        $state = State::query();

        if($request->has('country_id') && $request->country_id != ""){
            $state = $state->where('country_id', $request->country_id);
        }

        $state = $state->get();

        return response()->json($state);
    }

    public function getCity(Request $request)
    {
        $city = City::query();

        if ($request->has('state_id') && $request->state_id != '') {
            $city = $city->where('state_id', $request->state_id);    
        }

        $city = $city->get();
        
        return response()->json($city);
    }
}
