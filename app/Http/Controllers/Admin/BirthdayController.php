<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Birthday,
    Customer,
    FamilyMember
};
use Yajra\Datatables\Datatables;
use Auth;

class BirthdayController extends Controller
{
    public function index()
    {

        $family_member = FamilyMember::select('id', 'cust_id', 'name', 'phone_no', 'date_of_birth', 'avtar')
            ->whereNotNull('date_of_birth')
            ->whereNotNull('name');

        $customer = Customer::select('id', 'first_name', 'phone_no', 'date_of_birth', 'avtar_url', 'father_husband_name', 'surname_id')
            ->with('surname')
            ->whereNotNull('date_of_birth')
            ->whereNotNull('first_name');

        if (request('city') && request('city') != '') {
            $customer = $customer->where('city_id', request('city'));
        }
        if (request('city') && request('city') != '') {
            $family_member = $family_member->whereHas('customer', function($query) use($request){
                $query->where('city_id', request('city'));
            });
        }

        $customer = $customer->latest('id')->get();
        $family_member = $family_member->latest('id')->get();

        $birthday = $customer->merge($family_member)->paginate(10);

        return view('admin.birthday.index')->with(compact('birthday'));
    }

    public function form($id = null)
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

        $birthday = Birthday::find($id);

        return view('admin.birthday.add', compact('birthday'));
    }

    public function birthday_list(Request $request)
    {
        $filter_from = date("Y-m-d", strtotime('first day of this month'));
        $filter_to = date("Y-m-d", strtotime('last day of this month'));

        if ($request->has('f_from') && $request->f_from != '' && $request->has('f_to') && $request->f_to != '') {
            $filter_from = $request->f_from;
            $filter_to = $request->f_to;
        }

        $from_day = date("d", strtotime($filter_from));
        $from_month = date("m", strtotime($filter_from));

        $to_day = date("d", strtotime($filter_to));
        $to_month = date("m", strtotime($filter_to));

        $customer = Customer::select('id', 'first_name', 'phone_no', 'date_of_birth', 'avtar_url', 'father_husband_name', 'surname_id')
                            ->with('surname')
                            // ->whereBetween('date_of_birth', [$filter_from, $filter_to])
                            ->whereMonth('date_of_birth', '>=', $from_month)
                            ->whereMonth('date_of_birth', '<=', $to_month)
                            ->whereDay('date_of_birth', '>=', $from_day)
                            ->whereDay('date_of_birth', '<=', $to_day)
                            ->whereNotNull('date_of_birth')
                            ->whereNotNull('first_name');

        if ($request->has('city') && $request->city != '') {
            $customer = $customer->where('city_id', $request->city);
        }

        $customer = $customer->latest('id')->get();

        $family_member = FamilyMember::select('id', 'cust_id', 'name', 'phone_no', 'date_of_birth', 'avtar')
                                        // ->whereBetween('date_of_birth', [$filter_from, $filter_to])
                                        ->whereMonth('date_of_birth', '>=', $from_month)
                                        ->whereMonth('date_of_birth', '<=', $to_month)
                                        ->whereDay('date_of_birth', '>=', $from_day)
                                        ->whereDay('date_of_birth', '<=', $to_day)
                                        ->whereNotNull('date_of_birth')
                                        ->whereNotNull('name');

        if ($request->has('city') && $request->city != '') {
            $family_member = $family_member->whereHas('customer', function($query) use($request){
                $query->where('city_id', $request->city);
            });
        }

        $family_member = $family_member->latest('id')->get();

        $birthday = $customer->merge($family_member);

        return Datatables::of($birthday)
                        ->addIndexColumn()
                        ->addColumn('image', function($row){
                            if (class_basename($row) == "Customer") {
                                return (!is_null($row->avtar_url)) ? "<img src='". $row->avtar_url ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" ;
                            } else {
                                return (!is_null($row->avtar)) ? "<img src='". $row->avtar ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" ;
                            }
                        })
                        ->addColumn('name', function($row){
                            if (class_basename($row) == "Customer") {
                                $surname = (!is_null($row->surname)) ? $row->surname->name : "";
                                return $row->first_name." ".$row->father_husband_name." $surname";
                            } else {
                                return $row->name;
                            }
                        })
                        ->addColumn('mobile_no', function($row){
                            return $row->phone_no;
                        })
                        ->addColumn('date', function($row){
                            return date("d-m-Y", strtotime($row->date_of_birth));
                        })
                        ->addColumn('actions', function($row){
                            // $actions = "<span class='action'>";
                            // $actions .= (Auth::user()->is_update) ? "<a href='/admin/birthday/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            // $actions .= (Auth::user()->is_delete) ? "<a href='/admin/birthday/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            // $actions .= (Auth::user()->is_view) ? "<a href='/admin/birthday/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            // $actions .= "</span>";
                            return "";
                            // return "<span class='action'><a href='/admin/birthday/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/birthday/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/birthday/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function create(Request $request)
    {
        $birthday = new Birthday();
        if ($request->has('id') && $request->id != '') {
            $birthday = Birthday::find($request->id);
        }

        if ($request->has('birthday_banner')) {
            if (!is_null($birthday->id)) {
                $file_url = str_replace("/public", "", $birthday->banner_url);
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }
            }
			// $uploads_dir = public_path()."\birthday_banner";
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/birthday_banner/";
            $tmp_name = $_FILES["birthday_banner"]["tmp_name"];
            $name = rand().basename($_FILES["birthday_banner"]["name"]);
            move_uploaded_file($tmp_name, $uploads_dir.$name);

            $path = "/birthday_banner/".$name;
            $birthday->banner_url = $path;
        }
        $birthday->name = $request->name;
        $birthday->mobile_no = $request->phone_no;
        $birthday->user_id = Auth::user()->id;
        $birthday->date = $request->birthday_date;
        $birthday->save();

        return redirect("/admin/birthday");
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }
        $birthday = Birthday::find($id);

        if (!is_null($birthday)) {
            return view('admin.birthday.view', compact('birthday'));
        }

        return back();
    }

    public function destroy($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }

        $birthday = Birthday::find($id);

        if (!is_null($birthday)) {
            $file_url = str_replace("/public", "", $birthday->banner_url);
            if (file_exists(public_path().$file_url)) {
                unlink(public_path().$file_url);
            }

            $birthday->delete();
        }

        return back();
    }

    public function ajax_search(Request $request)
    {
        $customer = Customer::select('id', 'first_name', 'phone_no', 'date_of_birth', 'avtar_url', 'father_husband_name', 'surname_id')
            ->with('surname')
            ->whereNotNull('date_of_birth')
            ->whereNotNull('first_name');

        $family_member = FamilyMember::select('id', 'cust_id', 'name', 'phone_no', 'date_of_birth', 'avtar')
            ->whereNotNull('date_of_birth')
            ->whereNotNull('name');

        $searchTerm = $request->search;

        $customer = $customer->where(function ($query) use ($searchTerm) {
            $query->where('first_name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('phone_no', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('date_of_birth', 'LIKE', '%' . $searchTerm . '%');
        });

        $family_member = $family_member->where(function ($query) use ($searchTerm) {
            $query->where('name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('phone_no', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('date_of_birth', 'LIKE', '%' . $searchTerm . '%');
        });

        $customer = $customer->latest('id')->get();
        $family_member = $family_member->latest('id')->get();

        $birthday = $customer->merge($family_member);

        $html = '';

        foreach ($birthday as $row) {
            $avatar_url = null;
            $avatar_path = null;
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>';

            if (class_basename($row) == "Customer") {

                if (!empty($row->avtar_url)) {
                    $avatar_path = $row->avtar_url;

                    if (app()->environment() == "local") {
                        $explode = explode("public/", $row->avtar_url);
                        $avatar_url = $explode[1];
                        $avatar_path = $avatar_url;
                        $row['avtar_url'] = asset("/" . $avatar_url);
                    }
                }

                if (!empty($avatar_path) && file_exists($avatar_path)) {
                    $html .= '<img src="' . $row->avtar_url . '" alt="Avtar" width="120" style="border-radius: 50px;">';
                } else {
                    $html .= '-';
                }

            } else {
                $html .= (!is_null($row->avtar)) ? '<img src="' . $row->avtar . '" alt="Avtar" width="120" style="border-radius: 50px;">' : '';
            }

            $html .= '</td>';
            $html .= '<td>';

            if (class_basename($row) == "Customer") {
                $html .= $row->first_name . ' ' . $row->father_husband_name . ' ' . (!is_null($row->surname) ? $row->surname->name : '');
            } else {
                $html .= $row->name;
            }

            $html .= '</td>';
            $html .= '<td>' . $row->phone_no . '</td>';
            $html .= '<td>' . date("d-m-Y", strtotime($row->date_of_birth)) . '</td>';
            $html .= '</tr>';
        }

        return $html;
    }
}
