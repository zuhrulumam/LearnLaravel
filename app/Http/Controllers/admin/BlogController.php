<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function getCreate() {
        return view('admin.blog.create');
    }
    
    public function postCreate(){
        
    }
}
