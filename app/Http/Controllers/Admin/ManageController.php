<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;
use App\Models\{
    Surname,
    NativePlace,
    Group,
    BloodGroup,
    Patti,
    BusinessCategory,
    State,
    City,
    Panth,
    Relationship,
    Slide,
    Country,
    UtilitiesCategory,
    UtilitiesSubCategory
};

class ManageController extends Controller
{
    public function utilitesSubCategoryIndex()
    {
        return view('admin.manage.utilities_sub_category');
    }

    public function utilitesSubCategoryList(Request $request)
    {
        $sub_category = UtilitiesSubCategory::latest('id');

        if ($request->has('ajax')) {
            if ($request->has('parent_id') && $request->parent_id != "") {
                $sub_category = $sub_category->where('parent_id', $request->parent_id);
            }
            $sub_category = $sub_category->get();

            return response()->json($sub_category);
        }

        $sub_category = $sub_category->get();

        return Datatables::of($sub_category)
                        ->addIndexColumn()
                        ->addColumn('parent', function($row){
                            return (!is_null($row->category)) ? $row->category->name : "<span class='text text-danger'>Deleted</span>";
                        })
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-parent_id='".$row->parent_id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/utilities-sub-category/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function utilitesSubCategoryStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $UtilitiesSubCategory = new UtilitiesSubCategory;
        if ($request->has('id') && $request->id != '') {
            $UtilitiesSubCategory = UtilitiesSubCategory::find($request->id);

        }
        $UtilitiesSubCategory->name = $request->name;
        $UtilitiesSubCategory->parent_id = $request->utilites_category_id;
        $UtilitiesSubCategory->save();
        return back();
    }

    public function countryIndex()
    {
        $countrys = Country::latest('id')->paginate(10);
        return view('admin.manage.country')->with(compact('countrys'));
    }

    public function countryList(Request $request)
    {
        $countrys = Country::latest('id')->get();

        if ($request->has('ajax')) {
            return response()->json($countrys);
        }

        return Datatables::of($countrys)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/country/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function country_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $countrys = Country::where('name','LIKE','%'.$request->search.'%')->get();
        $html = '';

        foreach ($countrys as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->name . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';

            if (Auth::user()->is_update) {
                $html .= '<a href="javascript:void(0)" class="edit" data-id="'.$row->id.'" data-name="'.$row->name.'"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }

            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/manage/delete/country/' . $row->id) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }

            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

    public function countryStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $country = new Country;
        if ($request->has('id') && $request->id != '') {
            $country = Country::find($request->id);
        }
        $country->name = $request->name;
        $country->save();
        return back();
    }

    public function utilitesCategoryIndex()
    {
        return view('admin.manage.utilities_category');
    }

    public function utilitesCategoryList(Request $request)
    {
        $utilitiesCategory = UtilitiesCategory::latest('id')->get();

        if ($request->has('ajax')) {
            return response()->json($utilitiesCategory);
        }

        return Datatables::of($utilitiesCategory)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/utilities_category/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function utilitesCategoryStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $UtilitiesCategory = new UtilitiesCategory;
        if ($request->has('id') && $request->id != '') {
            $UtilitiesCategory = UtilitiesCategory::find($request->id);
        }
        $UtilitiesCategory->name = $request->name;
        $UtilitiesCategory->save();
        return back();
    }

    public function surnameIndex()
    {
        $surname = Surname::latest('id')->paginate(10);
        return view('admin.manage.surname')->with(compact('surname'));
    }

    public function stateIndex()
    {
        $surname = State::latest('id')->paginate(10);
        return view('admin.manage.state')->with(compact('surname'));
    }

    public function stateList(Request $request)
    {
        $surname = State::latest('id')->get();

        return Datatables::of($surname)
                        ->addIndexColumn()
                        ->addColumn('country', function($row){
                            return (!is_null($row->country)) ? $row->country->name : "<span class='text text-danger'>Deleted</span>";
                        })
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-country_id='".$row->country_id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/state/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function state_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $states = State::where('name','LIKE','%'.$request->search.'%')->get();
        $html = '';

        foreach ($states as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->country->name ?? '<span class="text text-danger">Deleted</span>' . '</td>';
            $html .= '<td>' . $row->name . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';

            if (Auth::user()->is_update) {
                $html .= '<a href="javascript:void(0)" class="edit" data-id="'.$row->id.'" data-country_id="'.$row->country_id.'" data-name="'.$row->name.'"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }

            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/manage/delete/state/' . $row->id) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }

            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

    public function statestore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $State = new State;
        if ($request->has('id') && $request->id != '') {
            $State = State::find($request->id);
        }
        $State->name = $request->name;
        $State->country_id = $request->country_id;
        $State->save();
        return back();
    }

    public function panthIndex()
    {
        $panth = Panth::latest('id')->paginate(10);

        return view('admin.manage.panth')->with(compact('panth'));
    }

    public function panth_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $panth = Panth::where('name','LIKE','%'.$request->search.'%')->get();
        $html = '';

        foreach ($panth as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->name . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';

            if (Auth::user()->is_update) {
                $html .= '<a href="javascript:void(0)" class="edit" data-id="'.$row->id.'"  data-name="'.$row->name.'"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }

            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/manage/delete/panth/' . $row->id) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }

            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

    public function panthList()
    {
        $panth = Panth::latest('id')->get();

        return Datatables::of($panth)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/panth/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function panthStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $Panth = new Panth;
        if ($request->has('id') && $request->id != '') {
            $Panth = Panth::find($request->id);
        }
        $Panth->name = $request->name;
        $Panth->save();
        return back();
    }

    public function relationshipIndex()
    {
        return view('admin.manage.relationship');
    }

    public function relationshipList()
    {
        $cities = Relationship::latest('id')->get();

        return Datatables::of($cities)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/relationship/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function relationshipStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $relationshipStore = new Relationship;
        if ($request->has('id') && $request->id != '') {
            $relationshipStore = Relationship::find($request->id);
        }
        $relationshipStore->name = $request->name;
        $relationshipStore->save();
        return back();
    }

    public function cityIndex()
    {
        $states = State::all();
        $cities = City::with('state')->latest('id')->paginate(10);

        return view('admin.manage.city', compact('states','cities'));
    }

    public function cityList(Request $request)
    {
        $cities = City::with('state')->latest('id')->get();

        return Datatables::of($cities)
                        ->addIndexColumn()
                        ->addColumn('state', function($row){
                            return (!is_null($row->state)) ? $row->state->name : "<span class='text-danger'>Deleted</span>";
                        })
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-state_id='".$row->state_id."' data-id='".$row->id."' data-name='".$row->city."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/city/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function city_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $states = City::where('city','LIKE','%'.$request->search.'%')->get();
        $html = '';

        foreach ($states as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->state->name ?? '<span class="text text-danger">Deleted</span>' . '</td>';
            $html .= '<td>' . $row->city . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';

            if (Auth::user()->is_update) {
                $html .= '<a href="javascript:void(0)" class="edit" data-id="'.$row->id.'" data-state_id="'.$row->state_id.'" data-name="'.$row->name.'"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }

            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/manage/delete/city/' . $row->id) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }

            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

    public function citystore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $city = new City;
        if ($request->has('id') && $request->id != '') {
            $city = City::find($request->id);
        }
        $city->city = $request->name;
        $city->state_id = $request->state_id;
        $city->save();
        return back();
    }

    public function surname_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $surname = Surname::where('name','LIKE','%'.$request->search.'%')->get();
        $html = '';

        foreach ($surname as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->name . '</td>';
            $html .= '<td>';
            $html .= '<span class="action">';

            if (Auth::user()->is_update) {
                $html .= '<a href="javascript:void(0)" class="edit-surname" data-id="'.$row->id.'" data-surname="'.$row->name.'"><i class="fa-solid text-success fa-pen-to-square"></i></a>&nbsp;';
            }

            if (Auth::user()->is_delete) {
                $html .= '<a href="' . url('/admin/manage/delete/surname/' . $row->id) . '" onclick="return confirm(\'Are you sure?\')"><i class="fa-solid fa-trash text-danger"></i></a>&nbsp;';
            }

            $html .= '</span>';
            $html .= '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

    public function surnameList(Request $request)
    {
        $surname = Surname::latest('id')->get();

        return Datatables::of($surname)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit-surname' data-id='".$row->id."' data-surname='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/surname/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function storeList(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $surname = new Surname;
        if ($request->has('id') && $request->id != '') {
            $surname = Surname::find($request->id);
        }
        $surname->name = $request->surname;
        $surname->save();
        return back();
    }

    public function nativePlaceIndex()
    {
        return view('admin.manage.nativePlace');
    }

    public function nativePlaceList(Request $request)
    {
        $native_place = NativePlace::latest('id')->get();

        return Datatables::of($native_place)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/native-place/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function storeNativePlace(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $native_place = new NativePlace;
        if ($request->has('id') && $request->id != '') {
            $native_place = NativePlace::find($request->id);
        }
        $native_place->name = $request->name;
        $native_place->save();
        return back();
    }

    public function groupIndex()
    {
        return view('admin.manage.groupIndex');
    }

    public function groupList(Request $request)
    {
        $Group = Group::latest('id')->get();

        return Datatables::of($Group)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/group/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function bloodGroupIndex()
    {
        return view('admin.manage.bloodGroupIndex');
    }

    public function bloodGroupList(Request $request)
    {
        $Group = BloodGroup::latest('id')->get();

        return Datatables::of($Group)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/blood-group/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function bloodGroupStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $BloodGroup = new BloodGroup;
        if ($request->has('id') && $request->id != '') {
            $BloodGroup = BloodGroup::find($request->id);
        }
        $BloodGroup->name = $request->name;
        $BloodGroup->save();
        return back();
    }

    public function groupStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $group = new Group;
        if ($request->has('id') && $request->id != '') {
            $group = Group::find($request->id);
        }
        $group->name = $request->name;
        $group->save();
        return back();
    }

    public function pattiIndex()
    {
        return view('admin.manage.pattiIndex');
    }

    public function pattiList(Request $request)
    {
        $patti = Patti::latest('id')->get();

        return Datatables::of($patti)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/patti/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function pattiStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $patti = new Patti;
        if ($request->has('id') && $request->id != '') {
            $patti = Patti::find($request->id);
        }
        $patti->name = $request->name;
        $patti->save();
        return back();
    }

    public function businessCategoryIndex()
    {
        return view('admin.manage.businessCategoryIndex');
    }

    public function businessCategoryList(Request $request)
    {
        $business_category = BusinessCategory::latest('id')->get();

        return Datatables::of($business_category)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/business_category/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function businessCategoryStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $BusinessCategory = new BusinessCategory;
        if ($request->has('id') && $request->id != '') {
            $BusinessCategory = BusinessCategory::find($request->id);
        }
        $BusinessCategory->name = $request->name;
        $BusinessCategory->save();
        return back();
    }

    public function slideIndex()
    {
        $slide = Slide::latest('id')->paginate(10);

        return view('admin.manage.slide')->with(compact('slide'));
    }

    public function slideList(Request $request)
    {
        $slide = Slide::latest('id')->get();

        return Datatables::of($slide)
                        ->addIndexColumn()
                        ->addColumn('actions', function($row){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='javascript:void(0)' class='edit' data-id='".$row->id."' data-name='".$row->name."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/manage/delete/slide/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= "</span>";
                            return $actions;
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function slideStore(Request $request)
    {
        if (!$request->has('id') && $request->id == '') {
            if (!Auth::user()->is_insert) {
                return back();
            }
        } else {
            if (!Auth::user()->is_update) {
                return back();
            }
        }
        $slide = new Slide;
        if ($request->has('id') && $request->id != '') {
            $slide = Slide::find($request->id);
        }
        $slide->name = $request->name;
        $slide->save();
        return back();
    }

    public function delete(string $type, int $id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }
        if ($type == "surname") {
            Surname::destroy($id);
        } elseif($type == "native-place") {
            NativePlace::destroy($id);
        } elseif($type == "group") {
            Group::destroy($id);
        } elseif($type == "blood-group") {
            BloodGroup::destroy($id);
        } elseif($type == "patti") {
            Patti::destroy($id);
        } elseif($type == "business_category") {
            BusinessCategory::destroy($id);
        } elseif($type == "state") {
            State::destroy($id);
        } elseif($type == "city") {
            City::destroy($id);
        } elseif($type == "panth") {
            Panth::destroy($id);
        } elseif ($type == "relationship") {
            Relationship::destroy($id);
        } elseif($type == 'slide') {
            Slide::destroy($id);
        } elseif($type == 'country') {
            Country::destroy($id);
        } elseif($type == 'utilities_category') {
            UtilitiesCategory::destroy($id);
        } elseif($type == 'utilities-sub-category') {
            UtilitiesSubCategory::destroy($id);
        }
        return back();
    }
}
