<?php

namespace App\Http\Controllers;

use App\Activity;
use App\CreateRoute;
use App\Reserve;
use App\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class RoutesController extends Controller
{

    public function __construct()
{
    $this->middleware('auth',['except' =>'index']);
}

    public function index() {

        $route = Route::where('status',1)
        ->paginate(1);


        return view('routes.index')->with('routes',$route);
    }

    public function create_route()
    {
        $activities = Cache::remember('activities',5, function (){
            return Activity::where('status',1)
                ->get();
        });

        return view('routes.create_route')->with('activities',$activities);
    }

    public function create_R(Request $request)
    {

        $CreatedRoute = CreateRoute::where('user_id',auth()->user()->id)
            ->get();

        $numOfCreatedRoute = count($CreatedRoute);

        if($numOfCreatedRoute > 2)
        {
            return redirect('/routes/create_route')->with('errorMessage',
                'For now, you can no longer create routes');
        }


        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
            'friends_info'=>'max:550',
            'friends'=>'max:10'
        ]);

        if($validator->fails())
        {
            return redirect('/routes/create_route')->with('errorMessage','Whoops!
       Create route is unsuccessful. You probably have a lot of characters in the fields.
        Try again.');
        }

     $d = json_encode($request->checkbox);


  //  dd($request->checkbox);die;

        $createR = new CreateRoute();
        $createR->arrival = $request->input('arrival');
        $createR->departure = $request->input('departure');
        $createR->friends = $request->input('friends');
        $createR->friends_info = $request->input('friends_info');
        $createR->user_id = auth()->user()->id;
        $createR->activities = $d;
        $createR->save();

        return redirect('/routes/create_route')->with('successMessage',
            'You have successfully created a route.We\'ll send you an offer soon.');



    }



    public function join(Request $request)
    {
       //dd($request->route_id);die;


  $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
      'friends_info'=>'max:550',
      'friends'=>'max:10'
  ]);

  if($validator->fails())
  {
      return redirect('/routes')->with('errorMessage','Whoops!
       Reservation is unsuccessful. You probably have a lot of characters in the fields.
        Try again.');
  }

        $reservesNum = Reserve::where('user_id',auth()->user()->id)
            ->get();

        $num = $reservesNum->count();
        if($num >= 1)
        {
            return redirect('/routes')
                ->with('errorMessage','You already signed up for this route');
        }

//dd($request->input('route_id'));die;
        $reserves = new Reserve();
        $reserves->route_id = $request->input('route_id');
        $reserves->user_id = auth()->user()->id;
        $reserves->friends = $request->input('friends');
        $reserves->friends_info = $request->input('friends_info');
        $reserves->price = $request->input('price');
        $reserves->paid = 0;
        $reserves->save();



      return redirect('/')->with('success','Reserved');
    }
}
