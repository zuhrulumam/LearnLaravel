<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Blog;
use App\Categories;
use App\CatRelation;

class BlogController extends Controller {

    public function index() {
        $posts = Blog::all();

        return view('admin.blog.index', ['posts' => $posts]);
    }

    public function getCreate() {
        $categories = Categories::all();

        return view('admin.blog.create', ['categories' => $categories]);
    }

    public function postCreate(BlogFormRequest $request) {
        $slug = uniqid();

        $filename = "";
        if ($request->hasFile("image")) {
            $destinationPath = "images/upload";
            $filename = $request->file("image")->getClientOriginalName();

            $request->file("image")->move($destinationPath, $filename);
        }

        $blogPost = new Blog([
            'blog_title' => $request->get('title'),
            'blog_content' => $request->get('content'),
            'slug' => $slug,
            'blog_featured_image' => $filename
        ]);

        $blogPost->save();

        $categories = $request->get("cat");
        $count_cat = count($categories);
        
        $data_relation = [];
        $blog_id = $blogPost->blog_id;

        for ($i = 0; $i < $count_cat; $i++) {
            $cur_cat = $categories[$i];
            array_push($data_relation, ['relation_blog_id'=>$blog_id, 'relation_category_id'=>$cur_cat]);
        }
//        
        CatRelation::insert($data_relation);
//
        return redirect('admin/posts')->with('message', 'Operation Successful ! Post saved with slug ' . $slug);
    }

    public function getEditPost($slug) {
        $post = Blog::whereSlug($slug)->first();
        return view('admin.blog.edit', ['post' => $post]);
    }

    public function postEditPost($slug, BlogFormRequest $request) {
        $post = Blog::whereSlug($slug)->first();

        $post->blog_title = $request->get('title');
        $post->blog_content = $request->get('content');

        $post->save();

        return redirect('admin/posts')->with('message', 'Updated post with slug ' . $slug . ' Success');
    }

    public function postDelete($slug) {
        $post = Blog::whereSlug($slug)->first();

        $post->delete();

        return redirect('admin/posts')->with('message', 'Deleted Post with slug ' . $slug);
    }

    public function getReadPost($slug) {
        $post = Blog::whereSlug($slug)->first();

        return view('admin.blog.read', ['post' => $post]);
    }

    
}
