<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogFormRequest;
use App\Blog;
use App\Categories;
use App\CatRelation;
use Yajra\Datatables\Datatables;

class BlogController extends Controller {

    protected $trashed;

    public function allPost($trashed = 0) {
        $this->trashed = $trashed;
        $posts = [];
        if ($trashed == 1) {
            $posts = Blog::onlyTrashed()->get();
        } else {
            $posts = Blog::all();
        }

        return Datatables::of($posts)
                        ->addColumn('action', function ($post) {
                            $string = "";
                            $edit = '<a href="' . action("admin\BlogController@getEditPost", ['slug' => $post->slug]) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            $delete = ' <a data-id="' . $post->slug . '" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal"> <span class="lnr lnr-cross"></span> Delete </a>';
                            $trash = '<form method="post" action="' . action("admin\BlogController@postTrashed", ["slug" => $post->slug]) . '"> ' . csrf_field() . '<button class="btn btn-warning btn-sm" type="submit"> <span class="lnr lnr-trash"></span> Trash
                            </button>
                        </form>  ';
                            $restore = '<form method="post" action="' . action("admin\BlogController@postRestore", ["slug" => $post->slug]) . '"> ' . csrf_field() . '<button class="btn btn-primary btn-sm" type="submit"> <span class="lnr lnr-undo"></span> Restore
                            </button>
                        </form>  ';

                            if ($this->trashed == 1) {
                                $string = $restore . $delete;
                            } else {
                                $string = $edit . $delete . $trash;
                            }

                            return $string;
                        })
                        ->editColumn('blog_title', function($post) {
                            return '<a href="' . action("admin\BlogController@getReadPost", ["slug" => $post->slug]) . '">' . $post->blog_title . '</a>';
                        })
                        ->editColumn('categories', function($post) {
                            $string = "";
                            foreach ($post->categories as $category) {
                                $string .= $category->category_name . ', ';
                            }
                            return $string;
                        })
                        ->make(TRUE);
    }

    public function postRestore($slug) {
//        $post = Blog::whereSlug($slug)->first();
        $post = Blog::withTrashed()->where(['slug' => $slug])->first();

        $post->restore();

        return redirect('admin/posts')->with('message', 'Success Restore post with slug ' . $slug);
        ;
    }

    public function postTrashed($slug) {
        $post = Blog::whereSlug($slug)->first();

        $post->delete();

        return redirect()->back()->with('message', 'Success Trashed post with slug ' . $slug);
        ;
    }

    public function getTrashed() {
        $posts = Blog::onlyTrashed()->get();

        return view('admin.blog.trash', ['posts' => $posts]);
    }

    public function index() {
        $posts = Blog::all();
        $trashed_item = Blog::onlyTrashed()->get()->count();
//        $trashed_item = Blog::onlyTrashed()->get();
//        foreach ($trashed_item as $post){
//            print_r($post);
//        }
        return view('admin.blog.index', ['posts' => $posts, 'trashed_item' => $trashed_item]);
    }

    public function getCreate() {
        $categories = Categories::all();

        return view('admin.blog.create', ['categories' => $categories]);
    }

    public function ckUpload(Request $request) {
        $filename = "";
        if ($request->hasFile("upload")) {
            $destinationPath = "images/upload";
            $filename = $request->file("upload")->getClientOriginalName();

            $request->file("upload")->move($destinationPath, $filename);
            $url = asset($destinationPath) . '/' . $filename;
            echo json_encode(["uploaded" => 1, "fileName" => $filename, "url" => $url]);
        }
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
            array_push($data_relation, ['relation_blog_id' => $blog_id, 'relation_category_id' => $cur_cat]);
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
        $post = Blog::withTrashed()->where(['slug' => $slug])->first();

        $post->forceDelete();

        return redirect('admin/posts')->with('message', 'Deleted Post with slug ' . $slug);
    }

    public function getReadPost($slug) {
        $post = Blog::withTrashed()->where(['slug' => $slug])->first();

        return view('admin.blog.read', ['post' => $post]);
    }

}
