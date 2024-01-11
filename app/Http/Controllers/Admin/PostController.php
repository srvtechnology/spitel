<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Post,
    Customer
};
use Auth;
use Yajra\Datatables\Datatables;

class PostController extends Controller
{

    public function approve_post($id){
        $post = Post::find($id);
        $post->is_approved = 1;
        $post->save();
        return redirect()->back();
    }

    public function disapprove_post($id){
        $post = Post::find($id);
        $post->is_approved = 2;
        $post->save();
        return redirect()->back();
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.index')->with(compact('posts'));

    }

    public function list(Request $request)
    {
        $posts = Post::latest();
        $city = '';
        if ($request->has('city') && $request->city != '') {
            $posts = $posts->whereHas('customer', function($query) use($request){
                $query->where('city_id', $request->city);
            });
            $city = $request->city;
        }

        $posts = $posts->orderBy('created_at', 'desc')->get();

        return Datatables::of($posts)
                        ->addIndexColumn()
                        ->addColumn('post_id', function($row){
                            return "<input type='checkbox' name='post_ids[]' class='post_ids' value='". $row->id ."'>";
                        })
                        ->addColumn('customer_name', function($row){
                            return (!is_null($row->customer)) ? $row->customer->first_name : "<span class='text text-danger'>Deleted</span>";
                        })
                        ->addColumn('is_approved', function($row){
                            if ($row->is_approved==0) {
                                return "<span class='badge badge-secondary'>Pending</span>";
                            }else if ($row->is_approved==1) {
                                return "<span class='badge badge-info'>Approved</span>";
                            }else{
                                return "<span class='badge badge-danger'>Rejected</span>";
                            }
                        })
                        ->addColumn('active_inactive', function($row){
                            if ($row->is_active) {
                                return "<a class='btn btn-danger btn-sm' href='/admin/post/active-inactive/".$row->id."/inactive'>Make Inactive</a>";
                            }
                            return "<a class='btn btn-success btn-sm' href='/admin/post/active-inactive/".$row->id."/active'>Make Active</a>";
                        })
                        ->addColumn('file', function($row){
                            if ($row->type == 0) {
                                return;
                            }
                            if ($row->type == 1) {
                                $avatar_url = $avatar_path= null;
                                if(!empty($row->post_url))
                                {
                                    $avatar_path = $row->post_url;
                                    $post_explode = explode("/post/",$row->post_url);
                                    $avatar_path = "post/".$post_explode[1];
                                    if(app()->environment() != "local")
                                    {
                                        $avatar_path =$avatar_path;
                                        $row['post_url'] = asset("public/".$avatar_path);
                                    }
                                }
                                if(!empty($avatar_path) AND file_exists($avatar_path))
                                {
                                    return "<img src='". $row->post_url ."' alt='Avtar' height='120px;' width='120' style='border-radius: 50px;overflow: hidden;'>";
                                }
                                return "-";
                                // return "<img src='". $row->post_url ."' alt='Avtar' height='120px;' width='120' style='border-radius: 50px;overflow: hidden;'>";
                            } else {
                                if (str_contains($row->post_url, "https://www.youtube.com")) {
                                    return '<iframe width="310" height="200" src="'.$row->post_url.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                }
                                return "<video width='300' controls><source src='". $row->post_url ."' type='video/mp4'></video>";
                            }
                        })
                        ->addColumn('desc', function($row){
                            return $row->description;
//                            $description_utf8 = mb_convert_encoding($row->description, 'UTF-8', 'auto');
//                            return $description_utf8;
//                            return (strlen($row->description) > 50) ? substr($description_utf8, 0, 50)."..." : $row->description;
                        })
                        ->addColumn('actions', function($row) use($city){
                            $actions = "<span class='action'>";
                            $actions .= (Auth::user()->is_update) ? "<a href='/admin/post/add/".$row->id."?city=$city'><i class='fa-solid text-success fa-pen-to-square'></i></a>&nbsp;" : "" ;
                            $actions .= (Auth::user()->is_delete) ? "<a href='/admin/post/delete/".$row->id."?city=$city' onclick='return confirm(`Are you Sure`)' ><i class='fa-solid fa-trash text-danger'></i></a>" : "";
                            $actions .= (Auth::user()->is_view) ? "<a href='/admin/post/view/".$row->id."?city=$city'><i class='fa-solid fa-eye text-primary'></i></a>&nbsp;" : "" ;
                            $actions .= "</span>";
                            return $actions;
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
        $customers = Customer::select('id', 'first_name')
                            ->where('system_status', 1);

        if ($request->has('city') && $request->city != '') {
            $customers = $customers->where('city_id', $request->city);
        }

        $customers = $customers->get();

        $post = Post::find($id);
        return view('admin.post.add', compact('post', 'customers'));
    }

    public function create(Request $request)
    {
//        dd($request);

        $post = new Post;
        if ($request->has('id') && $request->id != '') {
            $post = Post::find($request->id);
        }

        if (!is_null($request->upload_type)) {
            if ($request->hasFile('post_file')) {
                if (!is_null($post->id)) {
                    //$file_url = str_replace("/public", "", $post->post_url);
                    $file_url = $post->post_url;
                    if (file_exists(public_path().$file_url) && $file_url != "") {
                        unlink(public_path().$file_url);
                    }
                }
                // $uploads_dir = public_path()."\post";
                $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/post/";
                $tmp_name = $_FILES["post_file"]["tmp_name"];
                $extension = $_FILES["post_file"]['type'];
                $type = ($extension == 'video/mp4') ? 2 : 1;
                $name = rand().basename($_FILES["post_file"]["name"]);
                move_uploaded_file($tmp_name, $uploads_dir.$name);

                $path = "/post/".$name;
                $post->post_url = $path;
                $post->type = $type;
            } else {
                if ($request->has('video_url') && $request->video_url != "") {
                    $video_url = $request->video_url;
                    $video_url = str_replace('/watch?v=', '/embed/', $video_url);
                    $post->post_url = $video_url;
                    $post->type = 2;
                } else {
                    $post_url_new = null;
                    $post_type_new = 0;
                    if ($request->has('id') && $request->id != '') {
                        $post_url_new = $post->post_url;
                        $post_type_new = $post->type;
                    }
                    $post->post_url = $post_url_new;
                    $post->type = $post_type_new;
                }
            }
        } else {
            $post->post_url = null;
            $post->type = 0;
        }

        $post->description = $request->description;
        $post->customer_id = $request->cust_id;
        $post->save();

        if ($request->has('url_city') && $request->url_city != '') {
            return redirect('/admin/post?city='.$request->url_city);
        }

        return redirect('/admin/post');
    }

    public function view($id)
    {
        if (!Auth::user()->is_view) {
            return back();
        }
        $post = Post::find($id);
        $avatar_path = null;
        if($post->type == 1)
        {
            $avatar_url = $avatar_path= null;
            if(!empty($post->post_url))
            {
                $avatar_path = $post->post_url;
                $post_explode = explode("/post/",$post->post_url);
                $avatar_path = "post/".$post_explode[1];
                if(app()->environment() != "local")
                {
                    $avatar_path =$avatar_path;
                    $post['post_url'] = asset("public/".$avatar_path);
                }
                else
                {
                    $post['post_url'] = asset("/".$avatar_path);
                }
            }
        }
        return view('admin.post.view', compact('post','avatar_path'));
    }

    public function approved(Request $request)
    {
        if ($request->has('post_ids')) {
            $status = ($request->has('reason') && $request->reason != '') ? 0 : 1 ;
            $reason = ($request->has('reason') && $request->reason != '') ? $request->reason : null;
            foreach ($request->post_ids as $key => $value) {
                $post = Post::find($value);
                $post->is_approved = $status;
                $post->comment = $reason;
                $post->save();
            }
        }

        if ($request->has('type')) {
            $status = ($request->type == 'reject') ? 0 : 1 ;
            $comment = ($request->type == 'reject') ? $request->reason : null ;
            $post = Post::find($request->id);
            $post->is_approved = $status;
            $post->comment = $comment;
            $post->save();
        }
        return back();
    }

    public function delete($id)
    {
        if (!Auth::user()->is_delete) {
            return back();
        }

        $post = Post::find($id);
        if (!is_null($post)) {
            if (!is_null($post->post_url) && !str_contains($post->post_url, "https://www.youtube.com")) {
                //$file_url = str_replace("/public", "", $post->post_url);
                $file_url = $post->post_url;
                if (file_exists($_SERVER['DOCUMENT_ROOT'].$file_url)) {
                    unlink($_SERVER['DOCUMENT_ROOT'].$file_url);
                }
            }

            $post->delete();
        }

        return back();
    }

    public function activeInactive(int $id, string $type)
    {
        $post = Post::find($id);
        if ($type == "active") {
            $post->is_active = 1;
        } else {
            $post->is_active = 0;
        }
        $post->save();
        return back();
    }
}
