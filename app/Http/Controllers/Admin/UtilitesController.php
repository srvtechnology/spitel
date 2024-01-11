<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
	Utilites,
    Customer,
    UtilitiesCategory,
    UtilitiesSubCategory,
    Country,
    City
};
use Yajra\Datatables\Datatables;
use Auth;

class UtilitesController extends Controller
{
    public function index()
    {
        $category = UtilitiesCategory::select('id', 'name')->get();
        $sub_category = UtilitiesSubCategory::select('id', 'name')->get();
    	return view('admin.utilites.index', compact('category', 'sub_category'));
    }

    public function utilites_list(Request $request)
    {
        $city = '';
        $utilites = Utilites::latest();

        $filter_from = date("Y-m-d");
        $filter_to = date("Y-m-d");

        if ($request->has('filter_from') && $request->filter_from == "Sun Jan 01 2023 00:00:00 GMT+0530 (India Standard Time)" && $request->has('filter_to') && $request->filter_to == "Tue Jan 31 2023 00:00:00 GMT+0530 (India Standard Time)") {
            $filter_from = date("Y-m-d", strtotime('first day of this month', time()));
            $filter_to = date("Y-m-d", strtotime('last day of this month', time()));
        }

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

        // $utilites = $utilites->whereDate('created_at', '>=', $filter_from)
        //                     ->whereDate('created_at', '<=', $filter_to);

        $utilites = $utilites->orderBy('name', 'asc')->get();

        return Datatables::of($utilites)
                        ->addIndexColumn()
                        ->addColumn('utilities_id', function($row){
                            return "<input type='checkbox' name='utilities_id[]' class='utilities_id' value='". $row->id ."'>";
                        })
                        ->addColumn('banner_url', function($row){
                            return "<img src='". $row->banner_url ."' alt='Avtar' width='120' style='border-radius: 50px;'>";
                        })
                        ->addColumn('name', function($row){
                            return $row->name;
                        })
                        ->addColumn('mobile_no', function($row){
                            return $row->phone_no;
                        })
                        ->addColumn('address', function($row){
                            return $row->address;
                        })
                        ->addColumn('city', function($row){
                            return (!is_null($row->city_id)) ? (!is_null($row->city)) ? $row->city->city : "deleted" : null;
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/utilites/add/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/utilites/delete/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/utilites/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ; 
                            $actions .= "</span>";
                            return $actions;
                            // return "<span class='action'><a href='/admin/utilites/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/utilites/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/utilites/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
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

    	$utilites = Utilites::find($id);

        $category = UtilitiesCategory::latest('id')->get();
        $country = Country::all();
        $city = City::all();

    	return view('admin.utilites.add', compact('utilites', 'category','country' , 'city'));
    }

    public function store(Request $request)
    {
        //dd($request->input());
    	$utilites = new Utilites;
    	if ($request->has('id') && $request->id != '') {
	    	$utilites = Utilites::find($request->id);
    	}

    	if ($request->hasFile('banner')) {

			if (!is_null($utilites->id)) {
                //$file_url = str_replace("/public", "", $utilites->banner_url);
                $file_url = $utilites->banner_url; 
                if (file_exists(public_path().$file_url) && $file_url != "") {
                    unlink(public_path().$file_url);
                }
            }

            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/utilites_banner/";
            $tmp_name = $_FILES["banner"]["tmp_name"];
            $name = rand().basename($_FILES["banner"]["name"]);
            move_uploaded_file($tmp_name, $uploads_dir.$name);

            $path = "/utilites_banner/".$name;
            $utilites->banner_url = $path;
    	}

        $utilites->customer_id = 0;
    	$utilites->name = $request->name;
    	$utilites->phone_no = $request->mobile_no;
    	$utilites->office_no = $request->Office_no;
    	$utilites->address = $request->address;
        $utilites->description = $request->description;
    	$utilites->country_id = $request->country_id;
    	$utilites->state_id = $request->state_id;
    	$utilites->city_id = $request->city_id;
        $utilites->category_id = $request->category;
        $utilites->sub_category_id = $request->sub_category;
        if ($request->hasFile('second_file')) {
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/utilites_banner/";
            $tmp_name = $_FILES["second_file"]["tmp_name"];
            $name = rand().basename($_FILES["second_file"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");
            $path = "/public/utilites_banner/$name";
            $utilites->other_file = $path;
        }
    	$utilites->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect('/admin/utilites?city='.$request->url_city);
        }
    	return redirect('/admin/utilites');
    }

    public function approved(Request $request)
    {
        if ($request->has('utilities_id')) {
            $status = ($request->has('approve')) ? 1 : 0 ;
            $comment = ($status == 0) ? $request->reason : null ;
            foreach ($request->utilities_id as $key => $value) {
                $utilites = Utilites::find($value);
                $utilites->is_approved = $status;
                $utilites->comment = $comment;
                $utilites->save();
            }
        }
        
        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $utilites = Utilites::find($request->id);
            $utilites->is_approved = $status;
            $utilites->comment = $comment;
            $utilites->save();
        }
        return back();
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }
    	$utilites = Utilites::find($id);

    	if (!is_null($utilites)) {
	    	return view('admin.utilites.view', compact('utilites'));
    	}
    	return back();
    }

    public function delete($id)
    {
    	$utilites = Utilites::find($id);

        if (!is_null($utilites)) {
           // $file_url = str_replace("/public", "", $utilites->banner_url);
            $file_url = $utilites->banner_url;
            if ($file_url != "") {
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }   
            }

            $utilites->delete();
        }
        return back();
    }
}
