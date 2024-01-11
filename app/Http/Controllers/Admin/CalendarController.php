<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Redirect;
use App\User;
use File;
use ZipArchive;
use App\Models\{
    Calendar,CalendarJainYear
};

use App\Http\Requests;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        $title = "Calendar Events";
        $calendar = Calendar::orderBy('id', 'DESC')->paginate(10);


        return view('admin.calendar.index', compact('title', 'calendar'));
    }

    public function add(Request $request,$id)
    {
        // $jain_year=CalendarJainYear::select("*")->first();
        if($id == 0){
            $jain_year = Calendar::orderBy('id', 'desc')->first();
        }else{
            $jain_year = Calendar::where('id', $id)->orderBy('id', 'desc')->first();
        }

        $date=date('Y-m-d');

        $month=['जनवरी', 'फरवरी', 'मार्च', 'अप्रैल', 'मई', 'जून', 'जुलाई', 'अगस्त', 'सितंबर', 'अक्टूबर', 'नवंबर', 'दिसंबर'];
        $day=['रविवार','सोमवार', 'मंगलवार', 'बुधवार', 'गुरुवार', 'शुक्रवार', 'शनिवार'];
       $hindi_num= array("०","१","२","३","४","५","६","७","८","९","१०","११","१२","१३","१४","१५");

        $month_no=date('m')-1;
        $month_name=$month[$month_no];
        $eventDateHindi=date('d').' '.$month_name.' '.date('Y');

        $day_no = (int)date('N', strtotime($date));
        $eventDayHindi=$day[$day_no-1];

        if($id == 0){
            $cal = Calendar::orderBy('id', 'desc')->first();
        }else{
            $cal = Calendar::where('id', $id)->orderBy('id', 'desc')->first();
        }

        if($cal)
        {
            $date=$cal['date'];
            $eventDateHindi=$cal['eventDateHindi'];
            $eventDayHindi=$cal['eventDayHindi'];
        }

       return view('admin.calendar.add',compact('cal','jain_year','date','month_name','hindi_num','id','eventDateHindi','eventDayHindi'));
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $date = $request->date;
        $eventDateHindi = $request->eventDateHindi;
        $eventDayHindi = $request->eventDayHindi;
        $thought = $request->thought;
        $jain_month = $request->jain_month;
        $jain_month_no = $request->jain_month_no;
        $veer_sanwat = $request->veer_sanwat;
        $khartar_sanwat = $request->khartar_sanwat;
        $vikram_sanwat = $request->vikram_sanwat;
        $isavi_sanwat = $request->isavi_sanwat;
        $shubh_day_time = $request->shubh_day_time;
        $chanchal_day_time = $request->chanchal_day_time;
        $laabh_day_time = $request->laabh_day_time;
        $amrit_day_time = $request->amrit_day_time;
        $shubh_night_time = $request->shubh_night_time;
        $chanchal_night_time = $request->chanchal_night_time;
        $laabh_night_time = $request->laabh_night_time;
        $amrit_night_time = $request->amrit_night_time;


        $id = $request->id;
        $pageType = $request->pageType;
        $date_now = date("Y-m-d");




        if ($date == null) {
            return redirect(route('calendar.list'))->with('error', 'Please select the event date!');
        }



        $eventDate = date('d F, Y', strtotime($date));

        $data = [
            'date' => $date, 'eventDate' => $eventDate,
            'jain_month' => $jain_month,
            'jain_month_no' => $jain_month_no,
            'eventDateHindi'=>$eventDateHindi,
        'eventDayHindi'=>$eventDayHindi,
        'thought'=>$thought,
        'veer_sanwat'=>$veer_sanwat,
        'khartar_sanwat'=>$khartar_sanwat,
        'vikram_sanwat'=>$vikram_sanwat,
        'isavi_sanwat'=>$isavi_sanwat,
        'shubh_day_time'=>$shubh_day_time,
        'chanchal_day_time'=>$chanchal_day_time,
        'laabh_day_time'=>$laabh_day_time,
        'amrit_day_time'=>$amrit_day_time,
        'shubh_night_time'=>$shubh_night_time,
        'chanchal_night_time'=>$chanchal_night_time,
        'laabh_night_time'=>$laabh_night_time,
        'amrit_night_time'=>$amrit_night_time,
        'city_1'=>$request->city_1,
        'sunrise_1'=>$request->sunrise_1,
        'sunset_1'=>$request->sunset_1,
        'city_2'=>$request->city_2,
        'sunrise_2'=>$request->sunrise_2,
        'sunset_2'=>$request->sunset_2,
        'city_3'=>$request->city_3,
        'sunrise_3'=>$request->sunrise_3,
        'sunset_3'=>$request->sunset_3,
        'city_4'=>$request->city_4,
        'sunrise_4'=>$request->sunrise_4,
        'sunset_4'=>$request->sunset_4,
        'city_5'=>$request->city_5,
        'sunrise_5'=>$request->sunrise_5,
        'sunset_5'=>$request->sunset_5,
        'city_6'=>$request->city_6,
        'sunrise_6'=>$request->sunrise_6,
        'sunset_6'=>$request->sunset_6
        ];
        // dd("stop");
        if ($id != 0) {
            // dd("stop1");
            $check = Calendar::where('date', $date)->where('id','!=',$id)->first();
            if($check)
            {
            return redirect(route('calendar.list'))->with('error', 'Date already exist!');
            }
            else
            {
            Calendar::where('id', $id)->update($data);
            }
        } else {
            // dd("stop2");
        if ($date < $date_now) {
            dd("stope");
            return redirect(route('calendar.list'))->with('error', 'Please select the valid event date!');
        }
        // dd("stop");
            $check = Calendar::where('date', $date)->first();
            if($check)
            {
                // dd("stop");
            return redirect(route('calendar.list'))->with('error', 'Date already exist!');
            }
            else
            {
                // dd("stopok");
                Calendar::create($data);
            }
        }


        return redirect(route('calendar.list'))->with('success', 'Calendar Event Successfully Added!');
    }

    public function edit(Request $request, $id)
    {
        $title = "Edit Events";
        $cal = Calendar::where('id', $id)->first();
        $jain_year=CalendarJainYear::select("*")->first();

        return view('admin.calendar.edit', compact('cal', 'id','jain_year'));
    }


    public function destroy(Request $request, $id)
    {
        $delete = Calendar::where('id', $id)->delete();

        if ($delete) {
            return redirect(route('calendar.list'))->with('success', 'Calendar Event Successfully Deleted!');
        } else {

            return redirect(route('calendar.list'))->with('error', 'Error!');
        }
    }

    public function saveJainYear(Request $request)
    {
        $data = [
        'veer_sanwat'=>$request->veer_sanwat,
        'khartar_sanwat'=>$request->khartar_sanwat,
        'vikram_sanwat'=>$request->vikram_sanwat,
        'isavi_sanwat'=>$request->isavi_sanwat,
        ];

        CalendarJainYear::where('id', 1)->update($data);

        return ['success' => 1, 'Year updated!'];

    }
    public function saveMonth(Request $request)
    {
        $data = [
        'jain_month'=>$request->jain_month,
        ];

        CalendarJainYear::where('id', 1)->update($data);

        return ['success' => 1, 'Month updated!'];


    }

    public function saveSunrise(Request $request)
    {
        $data = [
            'city_1'=>$request->city_1,
            'sunrise_1'=>$request->sunrise_1,
            'sunset_1'=>$request->sunset_1,
            'city_2'=>$request->city_2,
            'sunrise_2'=>$request->sunrise_2,
            'sunset_2'=>$request->sunset_2,
            'city_3'=>$request->city_3,
            'sunrise_3'=>$request->sunrise_3,
            'sunset_3'=>$request->sunset_3,
            'city_4'=>$request->city_4,
            'sunrise_4'=>$request->sunrise_4,
            'sunset_4'=>$request->sunset_4,
            'city_5'=>$request->city_5,
            'sunrise_5'=>$request->sunrise_5,
            'sunset_5'=>$request->sunset_5,
            'city_6'=>$request->city_6,
            'sunrise_6'=>$request->sunrise_6,
            'sunset_6'=>$request->sunset_6
        ];

        CalendarJainYear::where('id', 1)->update($data);

        return ['success' => 1, 'Sunrise & Sunset of cities are updated!'];


    }

    public function getEventApi(Request $req)
    {
        $date= date("Y-m-d");
        return response()->json(
            Calendar::find($date)

        );
    }
}
