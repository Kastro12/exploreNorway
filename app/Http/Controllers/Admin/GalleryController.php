<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::paginate(10);

        return view('admin/gallery/index')->with('galleries',$galleries);
    }

    public function insert()
    {
        return view('admin/gallery/insert');
    }

    public function destroy($id)
    {

        $gallery = Gallery::find($id);

        if($gallery->name)
        {
            Storage::delete($gallery->name);
        }


        $gallery->delete();

        return redirect(route('gallery'))
            ->with('success','Image successfully deleted');

    }

    public function create(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'image'=>'required|max:1999'
            ]);

        if($validator->fails())
        {
            return redirect(route('galleryInsert'))
                ->with('error','Whoops! Image too big');
        }

        //Get filename with extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Get just ext
        $extension = $request->file('image')->getClientOriginalExtension();
        //Filename to store
        $fileNameToStore = $filename.'.'.$extension;
        //Upload Image
        $path = $request->file('image')->storeAs("/",$fileNameToStore);



        $image = new Gallery();
        $image->name = $fileNameToStore;
        $image->save();

        return redirect(route('galleryInsert'))
            ->with('success','Image successfully inserted');

    }


}
