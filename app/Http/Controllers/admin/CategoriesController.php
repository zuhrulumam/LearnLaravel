<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Http\Requests\CategoriesFormRequest;
use Yajra\Datatables\Datatables;

class CategoriesController extends Controller {

    public function postTrash($slug) {
        
    }

    public function getAllData() {

        return Datatables::of(Categories::all())
                        ->addColumn('action', function ($category) {
                            return '<a href="' . action("admin\CategoriesController@getEdit", ['slug' => $category->category_slug]) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> <a data-id="'.$category->category_slug .'" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                            <span class="lnr lnr-cross"></span> Delete
                        </a>';
                        })
//                        ->editColumn('id', 'ID: {{$id}}')
                        ->make(true);
    }

    public function index() {
        $categories = Categories::paginate(3);
//
//        echo action('admin\CategoriesController@index');
        return view("admin.categories.index", ['categories' => $categories]);
    }

    public function getCreate() {
        return view("admin.categories.create");
    }

    public function postCreate(CategoriesFormRequest $request) {
        $slug = uniqid();

        $cat_name = $request->get("cat_name");
        $cat_desc = $request->get("cat_desc");

        $category = new Categories([
            'category_slug' => $slug,
            'category_name' => $cat_name,
            'category_description' => $cat_desc
        ]);

        $category->save();

        return redirect('admin/categories')->with('message', "Success adding category with slug " . $slug);
    }

    public function getEdit($slug) {
        $category = Categories::whereCategorySlug($slug)->first();

        return view("admin.categories.edit", ['category' => $category]);
    }

    public function postEdit($slug, CategoriesFormRequest $request) {
        $category = Categories::whereCategorySlug($slug)->first();

        $cat_name = $request->get("cat_name");
        $cat_desc = $request->get("cat_desc");

        $category->category_name = $cat_name;
        $category->category_description = $cat_desc;

        $category->save();

        return redirect('admin/categories')->with('message', "Success edit category with slug " . $slug);
    }

    public function postDelete($slug) {
        $category = Categories::whereCategorySlug($slug)->first();

        $category->delete();

        return redirect("admin/categories")->with('message', "Succees deleted category with slug " . $slug);
    }

    public function read($slug) {
        $category = Categories::whereCategorySlug($slug)->first();

        return view("admin.categories.read", ['category' => $category]);
    }

}
