<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Album;
use Illuminate\Http\Request;

use App\Http\Requests;

class AlbumController extends Controller
{
    public function getList()
    {
        $albums = Album::with('Photos')->paginate(6);
        return view("admin.gallery.show_album_list",compact('albums'));
    }
    public function getAlbum($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('admin.gallery.show_album',compact('album'));
    }
    
    public function postCreate(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'cover_image'=>'required | image'
        ]);

        $file = $request->file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'images/albums';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_cover.'.$extension;
        $uploadSuccess = $file->move($destinationPath, $filename);
        
        $album = Album::create(array(
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'cover_image' => $filename,
        ));

        if (!$album) {
            return ['err' => 1];
        }

        return ['err' => 0, 'album' => $album];
    }

    public function getDelete($id)
    {
        $album = Album::findOrFail($id);
        if (!$album->delete()) {
            return ['err' => 1];
        }
        return ['err' => 0];
    }
}
