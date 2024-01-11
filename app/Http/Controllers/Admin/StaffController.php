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
        return view('admin.staff.index');
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
}
