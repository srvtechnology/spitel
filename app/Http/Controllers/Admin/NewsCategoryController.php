<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsCategory;
use Auth;

class NewsCategoryController extends Controller
{
    public function index()
    {
        if (!Auth::user()->is_view) {
            return back();
        }
        $news_category = NewsCategory::orderBy('name', 'asc')->paginate(10);

        return view('admin.news_category.index', compact('news_category'));
    }

    public function news_category_ajax_search(Request $request)
    {
        if(empty($request->search))
        {
            return "no";
        }

        $news_category = NewsCategory::where('name','LIKE','%'.$request->search.'%')->get();

        $html = '';

        $html = '';
        $i = 1;
        $city = (isset($_GET['city']) && $_GET['city'] != '') ? $_GET['city'] : "";
        foreach ($news_category as $c) {
            $html .= '<tr>';
            $html .= '<td>' . $i . '</td>';
            $html .= '<td>' . $c->name . '</td>';

            if (Auth::user()->is_update && $c->id !== 9 && $c->id !== 10) {
                $html .= '<td>';
                $html .= '<a href="' . route('news-category.add', ['id' => $c->id]) . '?city=' . $city . '">';
                $html .= '<i class="fa-solid text-success fa-pen-to-square"></i>';
                $html .= '</a>';
                $html .= '</td>';
            }

            if (Auth::user()->is_delete && $c->id !== 9 && $c->id !== 10) {
                $html .= '<td>';
                $html .= '<a href="' . route('news-category.delete', ['id' => $c->id]) . '?city=' . $city . '" onClick="return confirm(\'Do you want to delete?\')">';
                $html .= '<i class="fa-solid fa-trash text-danger"></i>';
                $html .= '</a>';
                $html .= '</td>';
            }

            $html .= '</tr>';
            $i++;
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
        $news_category = NewsCategory::find($id);
        return view('admin.news_category.add', compact('news_category'));
    }

    public function store(Request $request)
    {
        $news_category = new NewsCategory;
        if ($request->has('id') && $request->id != '') {
            $news_category = NewsCategory::find($request->id);
        }
        $news_category->name = $request->category;
        $news_category->save();

        if ($request->has('city_param') && $request->city_param != '') {
            return redirect("/admin/news-category?city=".$request->city_param);
        }

        return redirect("/admin/news-category");
    }

    public function delete($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }
        NewsCategory::destroy($id);
        return back();
    }

    public function list()
    {
        return response()->json(
            NewsCategory::select('id', 'name')->get()
        );
    }
}
