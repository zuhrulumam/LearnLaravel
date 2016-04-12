<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comments;
use App\Http\Requests\CommentFormRequest;

class CommentController extends Controller {

    public function index() {
        $comments = Comments::paginate(5);

        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function changeStatus($slug, $status) {

        $post = Comments::whereCommentSlug($slug)->first();
        $textStatus = "Confirmed";
        if ($status == 0 && $post->status == 0) {
            $post->status = 1;
        } elseif ($status == 1 && $post->status == 1) {
            $post->status = 0;
            $textStatus = "Not Confirmed";
        } else {
            echo 'show error';
        }

        $post->save();
        return \Redirect::back()->with("message", "Success change status slug " . $slug . " to " . $textStatus);
    }

    public function getEdit($slug) {
        $comment = Comments::whereCommentSlug($slug)->first();

        return view("admin.comments.edit", ['comment' => $comment]);
    }

    public function postEdit($slug, CommentFormRequest $request) {
        $comment = Comments::whereCommentSlug($slug)->first();
        
        $comment_content = $request->get("comment_content");
        $status = $request->get("status");
        
        if($status == NULL){
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }
        
        $comment->comment_content = $comment_content;
        
        $comment->save();
        
        return redirect("admin/comments")->with("message", "Success edit comment with slug ".$slug);
    }

    public function postDelete($slug) {
        $comment = Comments::whereCommentSlug($slug)->first();
        
        $comment->delete();
        
        return redirect("admin/comments")->with("message", "Success delete comment with slug ".$slug);
    }

    public function read($slug) {
        $comment = Comments::whereCommentSlug($slug)->first();

        return view("admin.comments.read", ["comment" => $comment]);
    }

}
