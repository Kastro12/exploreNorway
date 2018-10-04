<?php

namespace App\Http\Controllers;

use App\Impressions;
use App\Reserve;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $user_id = auth()->user()->id;

        $reserves = Reserve::with('user','route')
            ->where('user_id',$user_id)
            ->get();

        return view('profile.index')->with('reserves',$reserves);
    }

    public function impressions()
    {
        return view('profile.impressions');
    }

    public function impressionsStorage(Request $request)
    {

        $imp = Impressions::where('user_id',auth()->user()->id)
            ->get();

        $impNum = count($imp);

        if($impNum > 2)
        {
            return redirect(route('impressions'))->with('errorMsg','Whoops!
        You\'ve already written your impressions.');
        }


        $validator  = Validator::make($request->all(),[
           'text'=>'max:600'
        ]);

        if($validator->fails())
        {
            return redirect(route('impressions'))->with('errorMsg','Whoops!
        You  have a lot of characters in the fields. Write a shorter text.');
        }



        $impression = new Impressions();
        $impression->user_id = auth()->user()->id;
        $impression->text = $request->text;
        $impression->status = 0;
        $impression->save();

        return redirect(route('profile'))->with('successImp',
            'You have successfully sent the text.');

    }
}
