<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Advertisement,
    Customer,
    Slide
};
use Auth;
use Yajra\Datatables\Datatables;

class AdvertisementController extends Controller
{
    public function index()
    {
        return view('admin.advertisement.index');
    }

    public function list(Request $request)
    {
        $addvertisement = Advertisement::latest('id');
        $city = "";
        if ($request->has('city') && $request->city != '') {
            // $addvertisement = $addvertisement->whereHas('customer', function($query) use($request){
            //     $query->where('city_id', $request->city);
            // });
            $addvertisement = $addvertisement->where('city_id', $request->city);
            $city = $request->city;
        }

        $addvertisement = $addvertisement->get();

        return Datatables::of($addvertisement)
                        ->addIndexColumn()
                        ->addColumn('add_id', function($row){
                            return "<input type='checkbox' name='add_ids[]' class='add_ids' value='". $row->id ."'>";
                        })
                        ->addColumn('add_banner_url', function($row){
                            return "<img src='".$row->banner_url ."' alt='Avtar' width='120' style='border-radius: 50px;'>";
                        })
                        ->addColumn('name', function($row){
                            return $row->name;
                        })
                        ->addColumn('add_name', function($row){
                            return $row->advertisement_name;
                        })
                        ->addColumn('city', function($row){
                            return (!is_null($row->city)) ? $row->city->city : "<span class='text text-danger'>Delete</span>";
                        })
                        ->addColumn('to_date', function($row){
                            return (!is_null($row->to_date)) ? date("d-m-Y",strtotime($row->to_date)) : "";
                        })
                        ->addColumn('slide', function($row){
                            return (!is_null($row->slide)) ? $row->slide->name : "<span class='text text-danger'>Delete</span>";
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/advertisement/add/".$row->id."?city=".$city."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/advertisement/delete/".$row->id."?city=".$city."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/advertisement/view/".$row->id."?city=".$city."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function form(Request $request, $id = null)
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

        $add = Advertisement::find($id);
        $customers = Customer::select('id', 'first_name')
                            ->where('system_status', 1);

        if ($request->has('city') && $request->city != '') {
            $customers = $customers->where('city_id', $request->city);
        }
        $customers = $customers->get();
        return view('admin.advertisement.form', compact('add', 'customers'));
    }

    public function store(Request $request)
    {
        $addvertisement = new Advertisement;

        if ($request->has('id') && $request->id != '') {
            $addvertisement = Advertisement::find($request->id);
        }

        if ($request->has('banner')) {
            if (!is_null($addvertisement->id)) {
                //$file_url = str_replace("/public", "", $addvertisement->banner_url);
                $file_url = $addvertisement->banner_url;
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }
            }
			// $uploads_dir = public_path()."\add_banner";
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/add_banner/";
            $tmp_name = $_FILES["banner"]["tmp_name"];
            $name = rand().basename($_FILES["banner"]["name"]);
            move_uploaded_file($tmp_name, $uploads_dir.$name);

            $path = "/add_banner/".$name;
            $addvertisement->banner_url = $path;
        }

        $addvertisement->name = $request->name;
        $addvertisement->customer_id = ($request->has('customer_id') && $request->customer_id != "") ? $request->customer_id : 0;
        $addvertisement->advertisement_name = $request->add_name;
        $addvertisement->description = $request->description;
        $addvertisement->city_id = $request->city_id;
        $addvertisement->description = "";
        // $addvertisement->slide_id = $request->slide_id;
        $addvertisement->to_date = $request->to_date;
        $addvertisement->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/advertisement?city=".$request->url_city);
        }

        return redirect("/admin/advertisement");
    }

    public function approved(Request $request)
    {
        if ($request->has('add_ids')) {
            $status = ($request->has('approve')) ? 1 : 0 ;
            $comment = ($status == 0) ? $request->reason : null ;
            foreach ($request->add_ids as $key => $value) {
                $addvertisement = Advertisement::find($value);
                $addvertisement->is_approved = $status;
                $addvertisement->comment = $comment;
                $addvertisement->save();
            }
        }

        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $addvertisement = Advertisement::find($request->id);
            $addvertisement->is_approved = $status;
            $addvertisement->comment = $comment;
            $addvertisement->save();
        }
        return back();
    }

    public function view($id)
    {
        if (Auth::user()->is_view) {
            $addvertisement = Advertisement::find($id);
            if (is_null($addvertisement)) {
                return  back();
            }
            return view('admin.advertisement.view', compact('addvertisement'));
        }
        return back();
    }

    public function delete($id)
    {
        if (Auth::user()->is_delete) {

            $add = Advertisement::find($id);

            if (!is_null($add)) {
                //$file_url = str_replace("/public", "", $add->banner_url);
                $file_url = $add->banner_url;
                if ($file_url != "") {
                    if (file_exists(public_path().$file_url)) {
                        unlink(public_path().$file_url);
                    }
                }
                $add->delete();
            }

            return back();
        }
        return back();
    }

    public function getSlide()
    {
        return response()->json(
            Slide::select('id', 'name')->get()
        );
    }
}
