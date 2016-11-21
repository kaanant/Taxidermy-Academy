<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{
    public function getForm($id)
    {
        $album = Album::find($id);
        return view('add_image',compact('album'));
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,[
            'album_id'=>'required|numeric|exists:albums,id',
            'image'=>'required|image'
        ]);

        $file = $request->file('image');
        $random_name = str_random(8);
        $destinationPath = 'images/albums/';
        $extension = $file->getClientOriginalExtension();
        $filename=$random_name.'_album_image.'.$extension;
        $uploadSuccess = $file->move($destinationPath, $filename);
        $image=Image::create(array(
            'description' => $request->get('description'),
            'image' => $filename,
            'album_id'=> $request->get('album_id')
        ));
        if (!$image) {
            return ['err' => 1];
        }

        return ['err' => 0, 'album' => $image];
    }

    public function getDelete($id)
    {
        $image = Image::find($id);
        if (!$image->delete()) {
            return ['err' => 1];
        }
        return ['err' => 0];
    }
}
