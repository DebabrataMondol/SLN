<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(5);

        return view('blog.index')->withPosts($posts);
    }

    public function  getSingle($slug){

//        $slug= $request->input('slug');
        $post = Post::where('slug', '=', $slug)->first();

        $views = $post->views + 1;
        DB::table('posts')
            ->where('slug', $slug)
            ->update(['views' => $views]);

        return view('blog.single')->withPost($post);

    }

    public function getLikes(Request $request){
        $slug= $request->input('slug');
        $post = Post::where('slug', '=', $slug)->first();
        $users = DB::table('likes_dislikes')->where([
            ['post_id', '=', $post->id],
            ['likesBy', '=', Auth::user()->email],
        ])->get();

        if(count($users)<1){
             DB::table('likes_dislikes')->insert(
                [
                    'likesBy' => Auth::user()->email,
                    'post_id' => $post->id
                ]
            );

            if($user = Auth::user()) {
                $likes = $post->likes + 1;
                DB::table('posts')
                    ->where('id', $request->input('id'))
                    ->update(['likes' => $likes]);

            }
        }

//        $post = Post::where('slug', '=', $slug)->first();

        return back();
    }


}
