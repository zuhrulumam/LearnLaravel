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
}
