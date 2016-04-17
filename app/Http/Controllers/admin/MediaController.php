<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Media;

class MediaController extends Controller
{
    public function index() {
        $media = Media::all();
        return view('admin.media.index', ['media'=>$media]);
    }
    
    public function getEdit($slug) {
        
    }
    
    public function postEdit($slug) {
        
    }
    
    public function getCreate() {
        return view('admin.media.create');
    }
    
    public function postCreate() {
        
    }
    
    public function postDelete($slug) {
        
    }
    
    public function read($slug) {
        
    }
}
