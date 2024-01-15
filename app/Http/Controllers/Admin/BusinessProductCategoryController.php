<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\BusinessProductCategory;

use App\Http\Requests\Merchant\BusinessProductCategoryRequest;
use Illuminate\Support\Facades\Auth;

class BusinessProductCategoryController extends Controller
{
    public function index()
    {
        $businessProductCategories = BusinessProductCategory::where('business_type_id', 1);
        if (request('id') || request('name') || request('status') !== null) {
            if (request('id') !== null) {
                $businessProductCategories->where('id', 'like', '%' . request('id') . '%');
            }

            if (request('name') !== null) {
                $businessProductCategories->where('name_eng', 'like', '%' . request('name') . '%')
                    ->orWhere('name_arabic', 'like', '%' . request('name') . '%');
            }

            if (request('status') !== null) {
                $businessProductCategories->where('status', 'like', '%' . request('status') . '%');
            }
        }

        $businessProductCategories = $businessProductCategories->get();

        return view('web.admins.store-categories.store_categories_index', compact('businessProductCategories'));
    }

    public function otherCategory()
    {
        $businessProductCategories = BusinessProductCategory::where('business_type_id', '2');
        if (request('id') || request('name')  !== null) {
            if (request('id') !== null) {
                $businessProductCategories->where('id', 'like', '%' . request('id') . '%');
            }

            if (request('name') !== null) {
                $businessProductCategories->where('name_eng', 'like', '%' . request('name') . '%')
                ->orWhere('name_arabic', 'like', '%' . request('name') . '%');
            }
            
            if (request('status') !== null) {
                $businessProductCategories->where('status', 'like', '%' . request('status') . '%');
            }
        }

        $businessProductCategories = $businessProductCategories->get();

        return view('web.admins.store-categories.other_categories_index', compact('businessProductCategories'));
    }

    public function store(BusinessProductCategoryRequest $req)
    {
        $merchant_categry = new BusinessProductCategory;
        $merchant_categry->name_eng = $req->name_eng;
        $merchant_categry->name_arabic = $req->name_arabic;
        $merchant_categry->business_type_id = $req->business_type_id;
        $merchant_categry->created_by = Auth::user()->id;

        $merchant_categry->status = $req->status;

        if ($req->hasFile('img')) {
            $image = $req->img;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $req->file('img')->move(public_path('images/merchant_category'), $imageName);
            $merchant_categry->image = $imageName;
        }

        $merchant_categry->save();
        if ($merchant_categry->business_type_id == 1) {
            return redirect(url('/admin/store-categories/list'))->with('message', "Record added Successfully!");
        } else
            return redirect(url('admin/other-categories/list'))->with('message', "Record added Successfully!");
    }

    public function merchantEdit($id)
    {
        $merchant_categry = BusinessProductCategory::findorfail($id);
        return view('web.admins.store-categories.store_categories_edit', compact('merchant_categry'));
    }

    public function update(BusinessProductCategoryRequest $req, $id)
    {
        $merchant_categry = BusinessProductCategory::findorfail($id);
        $merchant_categry->name_eng = $req->name_eng;
        $merchant_categry->name_arabic = $req->name_arabic;
        $merchant_categry->status = $req->status;

        if ($req->hasFile('img')) {
            $image = $req->img;
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $req->file('img')->move(public_path('images/merchant_category'), $imageName);
            $merchant_categry->image = $imageName;
        }

        $merchant_categry->save();
        if ($merchant_categry->business_type_id == 1) {
            return redirect(url('/admin/store-categories/list'))->with('message', "Record added Successfully!");
        } else
            return redirect(url('admin/other-categories/list'))->with('message', "Record Updated Successfully!");
    }

    public function delete($id)
    {

        $merchant_categry = BusinessProductCategory::findorfail($id);
        $merchant_categry->delete();
        return redirect()->back()->with('message', "Record Deleted Successfully!");
    }
    function changetatus(Request $request)
    {

        $mrchantCategory = BusinessProductCategory::find($request->id);
        $mrchantCategory->status = $request->status;
        $mrchantCategory->save();
    }
}
