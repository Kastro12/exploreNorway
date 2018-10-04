<?php

namespace App\Http\Controllers;

use App\Impressions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PagesController extends Controller
{

    public function index(){

     $impressions = Cache::remember('impressions','1',function (){
        return Impressions::where('status',1)
            ->get();
        });





        return view('pages.index')->with('impressions',$impressions);
    }

}
