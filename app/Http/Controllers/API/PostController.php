<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
   Post
};

class PostController extends Controller
{

    public function list(Request $request)
    {
        if ($request->has('city_id') && $request->city_id != '') {

            $posts = Post::join('customers', 'customers.id', '=', 'post.customer_id')
                ->where('customers.city_id', $request->city_id)
                ->where('post.is_approved', 1)
                ->where('post.is_active', 1)
                ->select('post.*','customers.first_name','customers.avtar_url')
				->orderBy('created_at', 'desc')
                ->get();
        }else{
            $posts = Post::join('customers', 'customers.id', '=', 'post.customer_id')
                    ->where('post.is_approved', 1)
                    ->where('post.is_active', 1)
                    ->select('post.*','customers.first_name','customers.avtar_url')
					->orderBy('first_name')
					->orderBy('created_at', 'desc')
                    ->get();
        }

        return response()->json(['posts'=>$posts],200);

    }

    public function store(Request $request)
    {
//        dd($request->all());
        $post = new Post;
        if ($request->has('id') && $request->id != '') {
        dd("id");
            $post = Post::find($request->id);
        }

        if (!is_null($request->upload_type)) {
            if ($request->hasFile('post_file')) {
//                dd("has post file");

                if (!is_null($post->id)) {
                    $file_url = str_replace("/public", "", $post->post_url);
                    if (file_exists(public_path().$file_url) && $file_url != "") {
                        unlink(public_path().$file_url);
                    }
                }
                // $uploads_dir = public_path()."\post";
                $uploads_dir = $_SERVER['DOCUMENT_ROOT']."/public/post";
                $tmp_name = $_FILES["post_file"]["tmp_name"];
                $extension = $_FILES["post_file"]['type'];
                $type = ($extension == 'video/mp4') ? 2 : 1;
                $name = rand().basename($_FILES["post_file"]["name"]);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");

                $path = "/public/post/$name";
                $post->post_url = $path;
                $post->is_approved = 0;
                $post->is_active = 0;
                $post->type = $type;
            } else {
                if ($request->has('video_url') && $request->video_url != "") {
                    $video_url = $request->video_url;
                    $video_url = str_replace('/watch?v=', '/embed/', $video_url);
                    $post->post_url = $video_url;
                    $post->type = 2;
                } else {
                    $post->post_url = null;
                    $post->type = 0;
                }
            }
        } else {
            $post->post_url = null;
            $post->type = 0;
        }

        $post->description = $request->description;
        $post->customer_id = $request->cust_id;
        $post->save();

        return response()->json(['post'=>$post],200);


    }


    public function delete($id)
    {
        Post::destroy($id);
        return response()->json(true);
    }



}
