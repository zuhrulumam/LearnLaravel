<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Blog;

class BlogController extends Controller
{
    public function index(){
        $posts = Blog::all();
        
        return view('admin.blog.index', ['posts'=>$posts]);
    }

    public function getCreate() {
        return view('admin.blog.create');
    }
    
    public function postCreate(BlogFormRequest $request){
        $slug = uniqid();
        
        $blogPost = new Blog([
            'blog_title' => $request->get('title'),
            'blog_content' => $request->get('content'),
            'slug' => $slug
        ]);
        
        $blogPost->save();
       
        return redirect('admin/posts')->with('message','Operation Successful ! Post saved with slug '.$slug);
        
    }
    
    public function getEditPost($slug) {
        $post = Blog::whereSlug($slug)->first();
        return view('admin.blog.edit', ['post'=>$post]);
    }
    
    public function postEditPost($slug, BlogFormRequest $request) {
        $post = Blog::whereSlug($slug)->first();
        
        $post->blog_title = $request->get('title');
        $post->blog_content = $request->get('content');
        
        $post->save();
        
        return redirect('admin/posts')->with('message', 'Updated post with slug '.$slug.' Success');
    }
    
    public function postDelete($slug) {
        $post = Blog::whereSlug($slug)->first();
        
        $post->delete();
        
        return redirect('admin/posts')->with('message', 'Deleted Post with slug '.$slug);
    }
    
    public function getReadPost($slug) {
        $post = Blog::whereSlug($slug)->first();
        
        return view('admin.blog.read', ['post'=>$post]);
    }
    
}
