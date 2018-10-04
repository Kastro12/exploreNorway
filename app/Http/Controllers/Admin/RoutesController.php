<?php

namespace App\Http\Controllers\Admin;

use App\CreateRoute;
use App\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RoutesController extends Controller
{
    public function index()
    {
        $create_routes = CreateRoute::paginate(10);

        return view('admin/routes/index')->with('create_routes',$create_routes);
    }


    public function current()
    {
        $routes = Route::where('status',1)
            ->orderBy('created_at','ASC')
            ->paginate(1);

        return view('admin/routes/current')->with('routes',$routes);
    }

    public function filled()
    {
        $routes = Route::where('status',0)
            ->orderBy('created_at','DESC')
            ->paginate(1);

        return view('admin/routes/filled')->with('routes',$routes);
    }

    public function create()
    {
        return view('admin/routes/create');
    }

    public function store(Request $request)
    {

     //   $arrival =  date('Y-m-d',$request['arrival']);
     //   $departure = date('Y-m-d',$request['departure']);

        $a = date("Y-m-d", strtotime($request['arrival']));
        $d = date("Y-m-d", strtotime($request['departure']));


        $route = new Route();
        $route->name = $request->input('name');
        $route->arrival = $a;
        $route->departure = $d;
        $route->price = $request->input('price');
        $route->min_guests = $request->input('min_guests');
        $route->max_guests = $request->input('max_guests');
        $route->status = 1;
        $route->route = $request->input('route');
        $route->save();

        return redirect(route('current'))->with('success','You created new route');
    }

    public function lock($id)
    {

        $route=Route::find($id);

        if($route->status == 1) {
            $route->status = 0;
            $route->save();

            return redirect(\route('filled'))
                ->with('success', 'The route is successfully locked');
        } else if($route->status == 0)
        {
            $route->status = 1;
            $route->save();

            return redirect(\route('current'))
                ->with('success', 'The route is successfully unlocked');
        }

    }

    public function destroy($id)
    {

        $route = Route::find($id);
        $route->delete();

        return redirect()->back()->with('success','The route has been deleted');

    }

    public function edit($id)
    {
        $route = Route::find($id);

        return view('admin/routes/edit')->with('route',$route);

    }

    public function update(Request $request, $id)
    {
        $route = Route::find($id);



        $route->name = $request->input('name');
        $route->arrival = $request->input('arrival');
        $route->departure = $request->input('departure');
        $route->route = $request->input('route');
        $route->min_guests = $request->input('min_guests');
        $route->max_guests = $request->input('max_guests');
        $route->status = 0;
        $route->price = $request->input('price');
        $route->save();

        return redirect(route('filled'))
            ->with('success','Successfully updated route');

    }

}
