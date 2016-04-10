<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Blog;
use App\Comments;
use App\Http\Requests\CommentFormRequest;

class HomeController extends Controller {

    public function index() {
        $posts = Blog::paginate(1);         
        
        return view('welcome', ['posts'=> $posts]);
    }

    public function readPost($slug) {
        $post = Blog::whereSlug($slug)->first();

        $comments = $post->comments->where('status', 1);
       
        return view('read',['post'=>$post, 'comments'=>$comments]);
    }

    public function postComment($slug, CommentFormRequest $request) {
        $post = Blog::whereSlug($slug)->first();
        $comment_slug = uniqid();
//        echo $post->blog_id;
        $comment = new Comments([
            'comment_blog_id' => $post->blog_id,
            'comment_slug' => $comment_slug,
            'comment_content' => $request->get('comment_content'),
            'comment_created_by' => $request->get('comment_created_by'),
            'status' => 0,
            'email' => $request->get('email'),
        ]);

        $comment->save();

        return \Redirect::back()->with('message', 'Success');
    }

}
