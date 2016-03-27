<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Blog;

class HomeController extends Controller
{
    public function index() {
        $posts = Blog::paginate(1);
        
        return view('welcome', ['posts'=> $posts]);
    }
}
