<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Video,
    Customer
};
use Auth;
use Yajra\Datatables\Datatables;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $videos = Video::orderByDesc('id')->paginate(10);

        return view('admin.video.index')->with(compact('videos'));
    }

    public function list(Request $request)
    {
        $videos = Video::query();
        $city = "";
        if ($request->has('city') && $request->city != '') {
            $videos = $videos->whereHas('customer', function($query) use($request){
                $query->where('city_id', $request->city);
            });
            $city = $request->city;
        }
        $videos = $videos->orderByDesc('id')->get();

        return Datatables::of($videos)
                        ->addIndexColumn()
                        ->addColumn('video', function($row){
                            if (str_contains($row->video_url, "https://www.youtube.com")) {
                                return '<iframe width="350" height="200" src="'.$row->video_url.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                            } else {
                                return '<video width="200" height="240" controls><source src="'.$row->video_url.'" type="video/mp4"></video>';
                            }
                        })
                        ->addColumn('desc', function($row){
                            return (strlen($row->description) > 50) ? substr($row->description, 0, 50) : $row->description ;
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/video/add/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/video/delete/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/video/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            $actions .= "</span>";
                            return $actions;
                            // return "<span class='action'><a href='/admin/profile/add/".$row->id."'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;<a href='/admin/profile/view/".$row->id."'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;<a href='/admin/profile/delete/".$row->id."' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'</i></a></span>";
                        })
                        ->rawColumns(['action'])
                        ->escapeColumns([])
                        ->make(true);

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
        $video = Video::find($id);
        $customer = Customer::whereNotNull('first_name')
                            ->where('system_status', 1)
                            ->latest('id');

        if ($request->has('city') && $request->city != '') {
            $customer = $customer->where('city_id', $request->city);
        }

        $customer = $customer->get();

        return view('admin.video.add', compact('customer', 'video'));
    }

    public function create(Request $request)
    {
        $video = new Video;

        if ($request->has('id') && $request->id != '') {
            $video = Video::find($request->id);
        }

        if($request->hasFile('video_file')) {
            if (!is_null($video->id)) {
                $file_url = str_replace("/public", "", $video->video_url);
                if (file_exists($_SERVER['DOCUMENT_ROOT'].$file_url)) {
                    if ($file_url != "") {
                        unlink($_SERVER['DOCUMENT_ROOT'].$file_url);
                    }
                }
            }
            $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/public/videos";
            $tmp_name = $_FILES["video_file"]["tmp_name"];
            $name = rand().basename($_FILES["video_file"]["name"]);
            move_uploaded_file($tmp_name, "$uploads_dir/$name");

            $path = "/public/videos/$name";
            $video->video_url = $path;
        } else {
            if (is_null($video->id)) {
                $video_url = $request->video_url;
                $video_url = str_replace('/watch?v=', '/embed/', $video_url);
                $video->video_url = $video_url;
            }
        }

        $video->customer_id = ($request->has('customer_id') && $request->customer_id != "") ? $request->customer_id : 0;
        $video->description = $request->description;
        $video->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect("/admin/video?city=".$request->url_city);
        }

        return redirect("/admin/video");
    }

    public function view($id)
    {
        $video = Video::find($id);
        if (!is_null($video)) {
            return view('admin.video.view', compact('video'));
        }
        return back();
    }

    public function delete($id)
    {
        $video = Video::find($id);
        if (!str_contains($video->video_url, "https://www.youtube.com")) {
        $file_url = str_replace("/public", "", $video->video_url);
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$file_url)) {
                if ($file_url != "") {
                    unlink($_SERVER['DOCUMENT_ROOT'].$file_url);
                }
            }
        }
        $video->delete();
        return back();
    }
}
