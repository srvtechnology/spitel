<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Yajra\Datatables\Datatables;
use Auth;

class StaffController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 1) {
            return back();
        }

        $staff = User::latest()->paginate(10);

        return view('admin.staff.index')->with(compact('staff'));
    }

    public function add($id = null)
    {
        if (Auth::user()->role != 1) {
            return back();
        }
        if (is_null($id)) {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }

        $staff = User::find($id);
        return view('admin.staff.add', compact('staff'));
    }

    public function list()
    {
        $staff = User::latest()
                    ->get();

        return Datatables::of($staff)
                        ->addIndexColumn()
                        // ->addColumn('staff_id', function($row){
                        //     return "<input type='checkbox' name='staff_id[]' class='staff_id' value='". $row->id ."'>";
                        // })
                        ->addColumn('phone_no', function($row){
                            return $row->phone_no;
                        })
                        ->addColumn('insert', function($row){
                            return ($row->is_insert) ? "Yes" : "No" ;
                        })
                        ->addColumn('update', function($row){
                            return ($row->is_update) ? "Yes" : "No" ;
                        })
                        ->addColumn('delete', function($row){
                            return ($row->is_delete) ? "Yes" : "No" ;
                        })
                        ->addColumn('view', function($row){
                            return ($row->is_view) ? "Yes" : "No" ;
                        })
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/staff/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/staff/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/staff/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            $actions .= "</span>";
                            return $actions;
                            // return "<span class='action'><a href='/admin/staff/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/staff/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/staff/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function store(Request $request)
    {
        $user = new User;
        if ($request->has('id') && $request->id != '') {
            $user = User::find($request->id);
        }
        if ($request->has('password') && $request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->phone_no = $request->phone_no;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->is_insert = ($request->has('is_insert')) ? 1 : 0 ;
        $user->is_update = ($request->has('is_update')) ? 1 : 0 ;
        $user->is_delete = ($request->has('is_delete')) ? 1 : 0 ;
        $user->is_view = ($request->has('is_view')) ? 1 : 0 ;
        $user->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect('/admin/staff?city='.$request->url_city);
        }

        return redirect('/admin/staff');
    }

    public function view($id)
    {
        if (Auth::user()->role != 1) {
            return back();
        }
        if (!Auth::user()->is_view) {
            return back();
        }
        $staff = User::find($id);
        if (!is_null($staff)) {
            return view('admin.staff.view', compact('staff'));
        }
        return back();
    }

    public function delete($id)
    {
        if (Auth::user()->role != 1) {
            return back();
        }
        if (!Auth::user()->is_delete) {
            return back();
        }
        User::destroy($id);
        return back();
    }

    public function ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }
        $staffs = User::where('phone_no','LIKE','%'.$request->search.'%')->get();

        $html = '';

        foreach ($staffs as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->phone_no . '</td>';
            $html .= '<td>' . ($row->is_insert ? "Yes" : "No") . '</td>';
            $html .= '<td>' . ($row->is_update ? "Yes" : "No") . '</td>';
            $html .= '<td>' . ($row->is_delete ? "Yes" : "No") . '</td>';
            $html .= '<td>' . ($row->is_view ? "Yes" : "No") . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';

            if (Auth::user()->is_update) {
                $html .= '<a href="' . url('/admin/staff/add/' . $row->id . '?city=' . request('city')) . '"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }

            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/staff/delete/' . $row->id . '?city=' . request('city')) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }

            if (Auth::user()->is_view) {
                $html .= '<a href="' . url('/admin/staff/view/' . $row->id . '?city=' . request('city')) . '"><i class="fa-solid fa-eye text-primary"></i></a>&nbsp;';
            }

            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }
}
