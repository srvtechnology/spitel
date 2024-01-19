<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Matrimony,
    Customer,
    State,
    FamilyMember,
    RelationShip
};
use Yajra\Datatables\Datatables;
use Auth;

class MatrimonyController extends Controller
{
    public function index()
    {
        $family_members = FamilyMember::with(['panth', 'relationship', 'blood_group'])
            ->where('allow_matrimony', 1)
            ->whereNull('date_of_expire')
            ->whereNotNull('name')
            ->paginate(10);


        return view('admin.matrimony.index')->with(compact('family_members'));
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
        $state = State::all();
        $matrimony = Matrimony::find($id);
        $customers = Customer::select('id', 'first_name')
                            ->where('is_approved', 1);

        if ($request->has('city') && $request->city != '') {
            $customers = $customers->where('city_id', $request->city);
        }
        $customers = $customers->get();

        return view('admin.matrimony.add', compact('matrimony', 'customers', 'state'));
    }

    // public function list(Request $request)
    // {
    //     $matrimony = Matrimony::latest();
    //     $city = "";
    //     if ($request->has('city') && $request->city != '') {
    //         $matrimony = $matrimony->whereHas('customer', function($query) use($request){
    //             $query->where('city_id', $request->city);
    //         });
    //         $city = $request->city;
    //     }

    //     $matrimony = $matrimony->get();

    //     return Datatables::of($matrimony)
    //                     ->addIndexColumn()
    //                     ->addColumn('matrimony_id', function($row){
    //                         return "<input type='checkbox' name='matrimony_id[]' class='matrimony_id' value='". $row->id ."'>";
    //                     })
    //                     ->addColumn('image', function($row){
    //                         return "<img src='". $row->avtar_url ."' alt='Avtar' width='120' style='border-radius: 50px;'>";
    //                     })
    //                     ->addColumn('name', function($row){
    //                         return $row->full_name;
    //                     })
    //                     ->addColumn('mobile_no', function($row){
    //                         return $row->phone_no;
    //                     })
    //                     ->addColumn('education', function($row){
    //                         return $row->education;
    //                     })
    //                     ->addColumn('dob', function($row){
    //                         return date("d-m-Y", strtotime($row->date_of_birth));
    //                     })
    //                     ->addColumn('actions', function($row) use($city){
    //                         $actions = "<span class='action'>";
    //                         $actions .= (Auth::user()->is_update) ? "<a href='/admin/matrimony/add/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
    //                         $actions .= (Auth::user()->is_delete) ? "<a href='/admin/matrimony/delete/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
    //                         $actions .= (Auth::user()->is_view) ? "<a href='/admin/matrimony/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
    //                         $actions .= "</span>";
    //                         return $actions;
    //                         // return "<span class='action'><a href='/admin/matrimony/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/matrimony/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/matrimony/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
    //                     })
    //                     ->rawColumns(['action'])
    //                     ->escapeColumns([])
    //                     ->make(true);
    // }

    public function list(Request $request)
    {
        $city = "";
        $family_member = FamilyMember::with(['panth', 'relationship', 'blood_group'])
                                    ->where('allow_matrimony', 1)
                                    ->whereNull('date_of_expire')
                                    ->whereNotNull('name');


        if ($request->has('cust_id') && $request->cust_id != '') {
            $family_member = $family_member->where('cust_id', $request->cust_id);
        }

        if ($request->has('city_id') && $request->city_id != '') {
            $family_member = $family_member->whereHas('customer', function($query) use ($request){
                $query->where('city_id', $request->city_id);
            });
            $city = $request->city_id;
        }

		// $family_member->where(function($query){
            // $query->where('status', 2);
            // $query->orWhere('status', 4);
        // });

        $family_member = $family_member->latest('id')->get();

        return Datatables::of($family_member)
                        ->addIndexColumn()
                        ->addColumn('avtar', function($row){
                            return (!is_null($row->avtar)) ? "<img src='". $row->avtar ."' alt='Avtar' width='120' style='border-radius: 50px;'>" : "" ;
                        })
                        ->addColumn('gender', function($row){
                            return ($row->gender == 1) ? "Male" : "Female";
                        })
                        ->addColumn('relation', function($row){
                            return (!is_null($row->relationship)) ? $row->relationship->name : "" ;
                        })
                        ->addColumn('city', function($row){
                            $customer = Customer::find($row->cust_id);
                            return (isset($customer->city) && !is_null($customer->city)) ? $customer->city->city : "<span class='text text-danger'>Deleted</span>" ;
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/family-member/add/".$row->cust_id."/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/family-member/delete/member/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/family-member/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function store(Request $request)
    {
        $matrimony = new Matrimony;
        if ($request->has('id') && $request->id != '') {
            $matrimony = Matrimony::find($request->id);
        }

        if ($request->hasFile('avtar')) {
            if (!is_null($matrimony->id)) {
                $file_url = str_replace("/public", "", $matrimony->avtar_url);
                if (file_exists(public_path().$file_url)) {
                    unlink(public_path().$file_url);
                }
            }
			// $uploads_dir = public_path()."\matrimony_profile";
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/matrimony_profile/";
            $tmp_name = $_FILES["avtar"]["tmp_name"];
            $name = rand().basename($_FILES["avtar"]["name"]);
            move_uploaded_file($tmp_name, $uploads_dir.$name);

            $path = "/matrimony_profile/".$name;
            $matrimony->avtar_url = $path;
        }
        $matrimony->full_name = $request->full_name;
        $matrimony->gautra = $request->gautra;
        $matrimony->nanihal_gautra = $request->nanihal_gautra;
        $matrimony->date_of_birth = $request->date_of_birth;
        $matrimony->birth_time = $request->birth_time;
        $matrimony->birth_place = $request->birth_place;
        $matrimony->blood_group = $request->blood_group;
        $matrimony->education = $request->education;
        $matrimony->designation = $request->designation;
        $matrimony->company = $request->company;
        $matrimony->office_no = $request->office_no;
        $matrimony->address = $request->address;
        $matrimony->father_name = $request->father_name;
        $matrimony->mother_name = $request->mother_name;
        $matrimony->sister_name = $request->sister_name;
        $matrimony->brother_name = $request->brother_name;
        $matrimony->customer_id = $request->customer_id;
        $matrimony->state_id = $request->state_id;
        $matrimony->city_id = $request->city_id;
        $matrimony->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/matrimony?city=".$request->url_city);
        }

        return redirect("/admin/matrimony");
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }

        $matrimony = Matrimony::find($id);
        if (!is_null($matrimony)) {
            return view('admin.matrimony.view', compact('matrimony'));
        }
        return back();
    }

    public function delete($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }

        $matrimony = Matrimony::find($id);

        if (!is_null($matrimony)) {
            //$file_url = str_replace("/public", "", $matrimony->avtar_url);
            $file_url = $matrimony->avtar_url;
            if (file_exists(public_path().$file_url)) {
                unlink(public_path().$file_url);
            }
            $matrimony->delete();
        }

        return back();
    }

    public function approved(Request $request)
    {
        if ($request->has('matrimony_id')) {
            $status = ($request->has('approve')) ? 1 : 0 ;
            $comment = ($status == 0) ? $request->reason : null ;
            foreach ($request->matrimony_id as $key => $value) {
                $matrimony = Matrimony::find($value);
                $matrimony->is_approved = $status;
                $matrimony->comment = $comment;
                $matrimony->save();
            }
        }

        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $matrimony = Matrimony::find($request->id);
            $matrimony->is_approved = $status;
            $matrimony->comment = $comment;
            $matrimony->save();
        }
        return back();
    }
    public function matrimony_ajax_search(Request $request){
        if(!empty($request->search)){
            $matrimony = FamilyMember::with(['customer','customer.city','panth', 'relationship', 'blood_group'])->where('name', 'LIKE', '%' . $request->search . '%')->get();
            $html ='';
            foreach ($matrimony as $row) {
                $html .= '<tr>';
                $html .= '<td>' . $row->id . '</td>';
                $html .= '<td><img src="' . $row->avatar . '" alt="Avtar" width="120" style="border-radius: 50px;"></td>';
                $html .= '<td>' . $row->name . '</td>';
                if($row->gender == 1)
                {
                    $html .= '<td>Male</td>';
                }
                else
                {
                    $html .= '<td>Female</td>';
                }

                $html .= '<td>';
                if ((isset($row->customer) && !is_null($row->customer))) {
                    $html .= !empty($row->customer->city) ? $row->customer->city->city : null;
                } else {
                    $html .= '';
                }
                $html .= '</td>';
                $html .= '<td><span class="action">'.'<a href="'.url("/admin/family-member/add/".$row->id.'?city=""') .'"><i class="fa-solid text-success fa-pen-to-square"></i></a>'.'<a  href="'.url("/admin/family-member/delete/".$row->id.'?city=""') .'" onclick="return confirm("Are you sure?")"><i class="fa-solid fa-trash text-danger"></i></a><a  href="'.url("/admin/family-member/view/".$row->id.'?city=""') .'"><i class="fa-solid fa-eye text-primary"></i></a></span></td>';
                $html .= '</tr>';
            }

            return $html;

        }else{
            return "no";
        }
    }
}
