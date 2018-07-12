<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5|max:2000'
        ));

        $post = Post::find($post_id);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added');

        return redirect()->route('blog.single', [$post->slug]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request, array('comment' => 'required'));

        $comment->comment = $request->comment;
        $comment->save();

        Session::flash('success', 'Comment updated');

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('comments.delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        Session::flash('success', 'Deleted Comment');

        return redirect()->route('posts.show', $post_id);
    }


//    public function getLikes(Request $request){
//        $post_id= $request->input('post_id');
////        $post = Post::where('slug', '=', $slug)->first();
//        $comment = Comment::where('post_id', '=' $post_id)->first();
//        $users = DB::table('likes_dislikes')->where([
//            ['post_id', '=', $comment->id],
//            ['likesBy', '=', Auth::user()->email],
//        ])->get();
//
//        if(count($users)<1){
//            DB::table('likes_dislikes')->insert(
//                [
//                    'likesBy' => Auth::user()->email,
//                    'post_id' => $comment->id
//                ]
//            );
//
//            if($user = Auth::user()) {
//                $likes = $comment->likes + 1;
//                DB::table('posts')
//                    ->where('id', $request->input('id'))
//                    ->update(['likes' => $likes]);
//
//            }
//        }
//
////        $post = Post::where('slug', '=', $slug)->first();
//
//        return back();
//    }
}
