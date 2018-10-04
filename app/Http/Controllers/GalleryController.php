<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Impressions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Cache::remember('gallery','30',function (){
           return  Gallery::all();
        });




        $impressions = Impressions::where('status',1)
            ->get();


        return view('gallery.index')->with('gallery',$gallery)
            ->with('impressions',$impressions);
    }

}
