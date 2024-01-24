<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    NewsCategory,
    NewsSubCategory
};
use Auth;

class NewsSubCategoryController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_view) {
            return back();
        }
        $news_sub_category = NewsSubCategory::orderBy('name', 'asc')->paginate(30);

        return view('admin.news_sub_category.index', compact('news_sub_category'));
    }

    public function news_sub_category_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $news_sub_category = NewsSubCategory::where('name','LIKE','%'.$request->search.'%')->get();

        $html = '';
        $city = (isset($_GET['city']) && $_GET['city'] != '') ? $_GET['city'] : "";

        foreach ($news_sub_category as $key => $c) {
            $html .= '<tr>';
            $html .= '<td>' . $key+1 . '</td>';
            $html .= '<td>';
            if (!is_null($c->news_category)) {
                $html .= $c->news_category->name;
            } else {
                $html .= '<span class="text-danger">Deleted</span>';
            }
            $html .= '</td>';
            $html .= '<td>' . $c->name . '</td>';

            if (Auth::user()->is_update) {
                $html .= '<td>';
                $html .= '<a href="' . route('news-sub-category.add', ['id' => $c->id]) . '?city=' . $city . '">';
                $html .= '<i class="fa-solid text-success fa-pen-to-square"></i>';
                $html .= '</a>';
                $html .= '</td>';
            }

            if (Auth::user()->is_delete) {
                $html .= '<td>';
                $html .= '<a href="' . route('news-sub-category.delete', ['id' => $c->id]) . '?city=' . $city . '" onClick="return confirm(\'Do you want to delete?\')">';
                $html .= '<i class="fa-solid fa-trash text-danger"></i>';
                $html .= '</a>';
                $html .= '</td>';
            }

            $html .= '</tr>';
        }

        return $html;

    }

    public function add($id = null)
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

        $news_category = NewsCategory::paginate(30);
        $news_sub_category = NewsSubCategory::find($id);

        return view('admin.news_sub_category.add', compact('news_category', 'news_sub_category'));
    }

    public function store(Request $request)
    {
        $news_sub_category = new NewsSubCategory;
        if ($request->has('id') && $request->id != "") {
            $news_sub_category = NewsSubCategory::find($request->id);
        }
        $news_sub_category->parent_category_id = $request->parent_id;
        $news_sub_category->name = $request->category;
        $news_sub_category->save();
        if ($request->has('city_param') && $request->city_param != '') {
            return redirect("/admin/news-sub-category?city=".$request->city_param);
        }

        return redirect("/admin/news-sub-category");
    }

    public function delete($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }

        NewsSubCategory::destroy($id);
        return back();
    }

    public function list(Request $request)
    {
        $sub_category = NewsSubCategory::select('id', 'name');

        if ($request->has('parent_id') && $request->parent_id != '') {
            $sub_category = $sub_category->where('parent_category_id', $request->parent_id);
        }

        $sub_category = $sub_category->get();

        return response()->json($sub_category);
    }
}
