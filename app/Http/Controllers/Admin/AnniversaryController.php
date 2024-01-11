<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\{
    Anniversary,
    Customer,
    FamilyMember
};
use Auth;

class AnniversaryController extends Controller
{
    public function index()
    {
        $customer = Customer::select('avtar_url', 'first_name', 'phone_no', 'date_of_anniversary', 'id')
                            ->whereNotNull('first_name')
                            ->whereNotNull('date_of_anniversary');

        $customer = $customer->latest('id')->get();

        $family_member = FamilyMember::select('id', 'avtar', 'cust_id', 'gender', 'phone_no', 'date_of_anniversary', 'name')
                                    ->whereNotNull('name')
                                    ->whereNotNull('date_of_anniversary');

        if (request('city') && request('city') != '') {
            $family_member = $family_member->whereHas('customer', function($query) use($request) {
                $query->where('city_id', request('city'));
            });
        }

        $family_member = $family_member->latest('id')->get();

        $anniversary = $customer->merge($family_member)->paginate(10);
        return view('admin.anniversary.index')->with(compact('anniversary'));
    }

    public function list(Request $request)
    {
        // $anniversary = Anniversary::latest();
        // $city = '';
        // if ($request->has('city') && $request->city != '') {
        //     $anniversary = $anniversary->whereHas('customer', function($query) use($request) {
        //         $query->where('city_id', $request->city);
        //     });
        //     $city = $request->city;
        // }

        // $anniversary = $anniversary->get();
        $filter_from = date("Y-m-d", strtotime('first day of this month', time()));
        $filter_to = date("Y-m-d", strtotime('last day of this month', time()));

        $city = '';
        $customer = Customer::select('avtar_url', 'first_name', 'phone_no', 'date_of_anniversary', 'id')
                            ->whereNotNull('first_name')
                            ->whereNotNull('date_of_anniversary');

        if ($request->has('city') && $request->city != '') {
            $customer = $customer->where('city_id', $request->city);
            $city = $request->city;
        }

        if ($request->has('f_from') && $request->f_from != '' && strtotime($request->f_from) && $request->has('f_to') && $request->f_to != '' && strtotime($request->f_to)) {
            $filter_from = $request->f_from;
            $filter_to = $request->f_to;
        }

        $from_day = date("d", strtotime($filter_from));
        $from_month = date("m", strtotime($filter_from));

        $to_day = date("d", strtotime($filter_to));
        $to_month = date("m", strtotime($filter_to));

        $customer = $customer->whereMonth('date_of_anniversary', '>=', $from_month)
                                ->whereMonth('date_of_anniversary', '<=', $to_month)
                                ->whereDay('date_of_anniversary', '>=', $from_day)
                                ->whereDay('date_of_anniversary', '<=', $to_day);

        $customer = $customer->latest('id')->get();

        $family_member = FamilyMember::select('id', 'avtar', 'cust_id', 'gender', 'phone_no', 'date_of_anniversary', 'name')
                                    ->whereNotNull('name')
                                    ->whereNotNull('date_of_anniversary');

        if ($request->has('city') && $request->city != '') {
            $family_member = $family_member->whereHas('customer', function($query) use($request) {
                $query->where('city_id', $request->city);
            });
        }

        $family_member = $family_member->whereMonth('date_of_anniversary', '>=', $from_month)
                                        ->whereMonth('date_of_anniversary', '<=', $to_month)
                                        ->whereDay('date_of_anniversary', '>=', $from_day)
                                        ->whereDay('date_of_anniversary', '<=', $to_day);

        $family_member = $family_member->latest('id')->get();

        $anniversary = $customer->merge($family_member);

        return Datatables::of($anniversary)
                        ->addIndexColumn()
                        ->addColumn('image', function($row){
                            if (class_basename($row) == "Customer") {
                                return (!is_null($row->avtar_url)) ? "<img src='".$row->avtar_url ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" ;
                            } else {
                                return (!is_null($row->avtar)) ? "<img src='". $row->avtar ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" ;
                            }
                        })
                        ->addColumn('name', function($row){
                            return $row->name;
                        })
                        ->addColumn('phone_no', function($row){
                            return $row->phone_no;
                        })
                        ->addColumn('date', function($row){
                            return date("d-m-Y", strtotime($row->date_of_anniversary));
                        })
                        ->addColumn('actions', function($row) use($city){

                            $actions = "<span class='action'>";
                            if (class_basename($row) == "Customer") {
                                $actions .= (Auth::user()->is_update) ? "<a href='/admin/customer/add/".$row->id."?city=".$city."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                                $actions .= (Auth::user()->is_delete) ? "<a href='/admin/customer/delete/".$row->id."?city=".$city."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                                $actions .= (Auth::user()->is_view) ? "<a href='/admin/customer/view/".$row->id."?city=".$city."'><i class='fa-solid fa-eye text-primary'></i></a>" : "" ;
                                $actions .= "</span>";
                            } else {
                                $actions .= (Auth::user()->is_update) ? "<a href='/admin/family-member/add/".$row->cust_id."/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                                $actions .= (Auth::user()->is_delete) ? "<a href='/admin/family-member/delete/member/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                                $actions .= (Auth::user()->is_view) ? "<a href='/admin/family-member/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                                $actions .= "</span>";
                            }
                            return $actions;
                            // return "<span class='action'><a href='/admin/anniversary/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/anniversary/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/anniversary/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function add(Request $request, $id = null)
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

        $anniversary = Anniversary::find($id);
        $customers = Customer::select('id', 'first_name')
                            ->where('is_approved', 1);

        if ($request->has('city') && $request->city != '') {
            $customers = $customers->where('city_id', $request->city);
        }

        $customers = $customers->get();

        return view('admin.anniversary.add', compact('anniversary', 'customers'));
    }

    public function store(Request $request)
    {
        $anniversary = new Anniversary;
        if ($request->has('id') && $request->id != '') {
            $anniversary = Anniversary::find($request->id);
        }

        if ($request->has('anniversary_banner')) {
            if (!is_null($anniversary->id)) {
                //$file_url = str_replace("/public", "", $anniversary->banner_url);
                $file_url = $anniversary->banner_url;
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }
            }
			// $uploads_dir = public_path()."\anniversary_banner";
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/anniversary_banner/";
            $tmp_name = $_FILES["anniversary_banner"]["tmp_name"];
            $name = rand().basename($_FILES["anniversary_banner"]["name"]);
            move_uploaded_file($tmp_name, $uploads_dir.$name);

            $path = "/anniversary_banner/".$name;
            $anniversary->banner_url = $path;
        }

        $anniversary->name = $request->name;
        $anniversary->customer_id = $request->customer_id;
        $anniversary->mobile_no	= $request->phone_no;
        $anniversary->date = $request->anniversary_date;
        $anniversary->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/anniversary?city=".$request->url_city);
        }

        return redirect("/admin/anniversary");
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }

        $anniversary = Anniversary::find($id);

        if (!is_null($anniversary)) {
            return view('admin.anniversary.view', compact('anniversary'));
        }

        return back();
    }

    public function approved(Request $request)
    {
        if ($request->has('ann_ids')) {
            $status = ($request->has('approve')) ? 1 : 0 ;
            $comment = ($status == 0) ? $request->reason : null ;
            foreach ($request->ann_ids as $key => $value) {
                $anniversary = Anniversary::find($value);
                $anniversary->is_approved = $status;
                $anniversary->comment = $comment;
                $anniversary->save();
            }
        }

        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $anniversary = Anniversary::find($request->id);
            $anniversary->is_approved = $status;
            $anniversary->comment = $comment;
            $anniversary->save();
        }
        return back();
    }

    public function delete($id)
    {
        dd(public_path());
        if (!Auth::user()->is_delete) {
            return back();
        }

        $anniversary = Anniversary::find($id);

        if (!is_null($anniversary)) {
            //$file_url = str_replace("/public", "", $anniversary->banner_url);
            $file_url = $anniversary->banner_url;
            if (file_exists(public_path().$file_url)) {
                unlink(public_path().$file_url);
            }
            $anniversary->delete();
        }
        return back();
    }
}
