<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Post,
    PostLike
};

use Illuminate\Support\Facades\Validator;


class PostLikeController extends Controller
{

    public function list(Request $request)
    {
        if ($request->has('post_id') && $request->post_id != '') {

            $posts = PostLike::join('post', 'post.id', '=', 'post_likes.post_id')
                ->where('post_likes.post_id',$request->post_id)
                ->select('post_likes.*')
                ->get();
        }else{
            $posts = PostLike::join('post', 'post.id', '=', 'post_likes.post_id')
                ->select('post_likes.*')
                ->get();
        }

        $count = count($posts);

        return response()->json(['data'=>$posts,'count'=>$count],200);

    }

    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'post_id' => 'required',
            'cust_id' => 'required',
            'is_like' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json(['errors' => $errors], 400);
        }

        $post_like = new PostLike;

        if ($request->has('id') && $request->id != '') {
            $post_like = PostLike::find($request->id);
        }

        $post_like->post_id = $request->post_id;
        $post_like->customer_id = $request->cust_id;
        $post_like->is_like = $request->is_like;
        $post_like->save();

        return response()->json(['data'=>$post_like],200);


    }

}
