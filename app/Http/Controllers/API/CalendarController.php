<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{

    Calendar
};

class CalendarController extends Controller
{


    public function getCalendar(Request $req)
    {

        if ($req->has('date') && $req->date != '') {
            $date = $req->date;
            if ($date != "") {
                $res = Calendar::where('date', $date)->first();
                return response()->json(['res' => $res], 200);

            }
        } else {
            $date = date("Y-m-d");
            $res = Calendar::where('date', $date)
                ->where('date', $date)
                ->first();
            return response()->json(['res' => $res], 200);

        }


        //        $res=Calendar::where('date',$date)->latest()->first();
//        $res=Calendar::get()->first();
//          $res=Calendar::orderBy('id', 'desc')->limit(1)->get();

    }

}
