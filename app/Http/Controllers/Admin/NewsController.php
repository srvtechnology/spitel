<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\{
    News,
    NewsCategory,
    NewsSubCategory,
    Customer,
    FamilyMember
};
use Auth;

class NewsController extends Controller
{
    public function __construct()
    {
//        $current_date = date("m-d");
//
//        $family_members = FamilyMember::whereRaw("DATE_FORMAT(family_member.date_of_expire, '%m-%d') = '$current_date'")
//                                        ->join('customers', 'customers.id', '=', 'family_member.cust_id')
//                                        ->select('customers.city_id','family_member.*')
//                                        ->get();


//        if (count($family_members)){
//            foreach ($family_members as $family_member) {
//
//                $news = new News;
//                $news->banner_url = $family_member->avtar;
//                $news->category_id = 10;
//                $news->sub_category_id = 9;
//                $news->customer_id = 0;
//                $news->name = $family_member->name;
//                $news->date = $family_member->date_of_expire;
//                $news->description = $family_member->about;
//                $news->city_id = $family_member->city_id;
//                $news->save();
//            }
//        }

    }

    public function index()
    {
        $news_category = NewsCategory::select('id', 'name')->get();
        $news_sub_category = NewsSubCategory::select('id', 'name')->get();

        $news = News::paginate(10);

        return view('admin.news.index', compact('news_category', 'news_sub_category','news'));
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

        $news = News::find($id);

        $news_category = NewsCategory::select('id', 'name')->get();

        return view('admin.news.add', compact('news', 'news_category'));
    }

    public function list(Request $request)
    {
        $city = "";
        $news = News::latest();

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
            $news = $news->where('city_id', $request->city);
            $city = $request->city;
        }

        $news = $news->whereDate('created_at', '>=', $filter_from)
                    ->whereDate('created_at', '<=', $filter_to);

        if ($request->has('category_id') && $request->category_id != "") {
            $news = $news->where('category_id', $request->category_id);
        }

        if ($request->has('sub_category_id') && $request->sub_category_id != "") {
            $news = $news->where('sub_category_id', $request->sub_category_id);
        }

        $news = $news->get();

        return Datatables::of($news)
                        ->addIndexColumn()
                        ->addColumn('news_id', function($row){
                            return "<input type='checkbox' name='news_ids[]' class='news_ids' value='". $row->id ."'>";
                        })
                        ->addColumn('news_banner_url', function($row){
                            if (is_null($row->banner_url)) {
                                return;
                            }
                            if (str_contains($row->banner_url, "https://www.youtube.com")) {
                                return '<iframe width="310" height="200" src="'.$row->banner_url.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            }
                            return "<img src='".$row->banner_url."' alt='News Feed' height='120px;' width='120' style='border-radius: 50px;overflow: hidden;'>";
                        })
                        ->addColumn('name', function($row){
                            return $row->name;
                        })
                        ->addColumn('date', function($row){
                            return date("d-m-Y", strtotime($row->date));
                        })
                        ->addColumn('description', function($row){
                            return (strlen($row->description) > 250) ? mb_convert_encoding(substr($row->description, 0, 250), 'UTF-8', 'UTF-8')."..." : mb_convert_encoding($row->description, 'UTF-8', 'UTF-8');
                        })
                        ->addColumn('city', function($row){
                            return (!is_null($row->city)) ? $row->city->city : "";
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/news/add/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/news/delete/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/news/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            $actions .= "</span>";
                            return $actions;
                            // return "<span class='action'><a href='/admin/news/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/news/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/news/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);
    }

    public function store(Request $request)
    {

        if ($request->has('id') && $request->id != '') {
            $news = News::find($request->id);
        } else {
			$news = new News;
		}
		//dd($news);

        if (!is_null($request->upload_type)) {
            if($request->hasFile('news_banner')) {
                if (!is_null($news->id)) {
                    if (!is_null($news->banner_url) && !str_contains($news->banner_url, "https://www.youtube.com")) {
                        //$file_url = str_replace("/public", "", $news->banner_url);
                        $file_url = $news->banner_url;
                        if (file_exists(public_path().$file_url)) {
                            unlink(public_path().$file_url);
                        }
                    }
                }
                // $uploads_dir = public_path()."\\news_banner";
                $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/news_banner/";
                $tmp_name = $_FILES["news_banner"]["tmp_name"];
                $name = rand().basename($_FILES["news_banner"]["name"]);
                move_uploaded_file($tmp_name, $uploads_dir.$name);

                $path = "/news_banner/".$name;
                $news->banner_url = $path;
            }
            else {
                if ($request->has('youtube_url') && $request->youtube_url != "") {
                    $video_url = $request->youtube_url;
                    $video_url = str_replace('/watch?v=', '/embed/', $video_url);
                    $news->banner_url = $video_url;
                } else {
                    if (!isset($news->id)) {
                        $news->banner_url = null;
                    }
                }
            }
        } else {
            // $news->banner_url = null;
        }

        $news->category_id = $request->category_id;
        $news->sub_category_id = $request->child_category_id;
        $news->customer_id = 0;
        $news->name = $request->name;
        $news->date = $request->news_date;
        $news->description = $request->description;
        $news->city_id = $request->city_id;
        $news->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/news?city=".$request->url_city);
        }
        return redirect("/admin/news");
    }

    public function approved(Request $request)
    {
        if ($request->has('news_ids')) {
            $status = ($request->has('reason') && $request->reason != '') ? 0 : 1 ;
            $reason = ($request->has('reason') && $request->reason != '') ? $request->reason : null;
            foreach ($request->news_ids as $key => $value) {
                $news = News::find($value);
                $news->is_approved = $status;
                $news->comment = $reason;
                $news->save();
            }
        }

        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $news = News::find($request->id);
            $news->is_approved = $status;
            $news->comment = $comment;
            $news->save();
        }
        return back();
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }

        $news = News::find($id);

        if (!is_null($news)) {
            return view('admin.news.view', compact('news'));
        }
        return back();
    }

    public function delete($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }

        $news = News::find($id);

        if (!is_null($news)) {
            // if (!is_null($news->banner_url) && !str_contains($news->banner_url, "https://www.youtube.com")) {
                // $file_url = str_replace("/public", "", $news->banner_url);
                // if (file_exists(public_path().$file_url)) {
                    // unlink(public_path().$file_url);
                // }
            // }
            $news->delete();
        }

        return back();
    }
}
