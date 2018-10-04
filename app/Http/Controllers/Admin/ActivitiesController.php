<?php

namespace App\Http\Controllers\Admin;

use App\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{
    public function index()
    {

         $activities = Activity::paginate(10);


        return view('admin/activities/index')->with('activities',$activities);
    }

    public function insert()
    {
        return view('admin/activities/insert');
    }

    public function insertActivity(Request $request)
    {



        $activity = new Activity();
        $activity->name = $request->input('name');
        $activity->image= $request->input('image');
        $activity->save();

        return redirect(route('activities'))
            ->with('success','Successfully entered activity');
    }

    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();

        return redirect(route('activities'))
            ->with('success','Successfully deleted activity');
    }

    public function update($id)
    {
        $activity = Activity::find($id);
        if($activity->status === 0)
        {
            $activity->status = 1;
        }
        else{
            $activity->status = 0;
        }
        $activity->save();

        return redirect(route('activities'))
            ->with('success','Successfully update activity');
    }
}
