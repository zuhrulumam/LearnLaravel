<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Media;
use App\Http\Requests\MediaFormRequest;
use Intervention\Image\Facades\Image;

class MediaController extends Controller {

    public function index() {
        $media = Media::all();
        return view('admin.media.index', ['media' => $media]);
    }

    public function getEdit($slug) {
        $media = Media::whereMediaSlug($slug)->first();

        return view('admin.media.edit', ['media' => $media]);
    }

    public function postEdit($slug, MediaFormRequest $request) {
        $media = Media::whereMediaSlug($slug)->first();

        $media->media_description = $request->get("media_desc");

        $media->save();

        return redirect('admin/media')->with('message', 'Success Edit media with slug ' . $slug);
    }

    public function getCreate() {
        return view('admin.media.create');
    }

    public function postCreate(MediaFormRequest $request) {
        $slug = uniqid();

        $file = $request->file('file');

        $filename = $file->getClientOriginalName();

        $media = new Media([
            'media_slug' => $slug,
            'media_name' => $filename
        ]);

        $media->save();

        $file->move('images/upload', $filename);

        $image = Image::make('images/upload/' . $filename)->resize(240, 168)->save('images/upload/thumb_' . $filename);
    }

    public function postDelete($slug) {
        $media = Media::whereMediaSlug($slug)->first();

        $filename = public_path('images/upload/' . $media->media_name);
        $thumbname = public_path('images/upload/thumb_' . $media->media_name);
        if (file_exists($filename)) {
            unlink($filename);
            if (file_exists($thumbname)) {
                unlink($thumbname);
            }
        }
        
        $media->delete();

        return redirect()->back()->with('message', 'Success Delete media with slug ' . $slug);
    }

    public function read($slug) {
        $media = Media::whereMediaSlug($slug)->first();

        return view('admin.media.read', ['media' => $media]);
    }

}
