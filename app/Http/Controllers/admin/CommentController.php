<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Comments;

class CommentController extends Controller
{
    public function index(){
        $comments = Comments::paginate(5);
        
        return view('admin.comments.index', ['comments'=>$comments]);
    }
    
    public function changeStatus($slug, $status) {
        
        $post = Comments::whereCommentSlug($slug)->first();
        $textStatus = "Confirmed";
        if($status == 0 && $post->status == 0){
            $post->status = 1;            
        } elseif($status == 1 && $post->status == 1){
            $post->status = 0;
            $textStatus = "Not Confirmed";
        } else {
            echo 'show error';
        }
        
        $post->save();
        return \Redirect::back()->with("message", "Success change status slug ".$slug." to ".$textStatus);
    }
    
    public function getCreate($param) {
        
    }
    
     public function postCreate($param) {
        
    }
    
     public function getEdit($slug) {
        
    }
    
     public function postEdit($slug) {
        
    }
    
    public function postDelete($slug) {
        
    }
    
    public function getRead($slug) {
        
    }
}
