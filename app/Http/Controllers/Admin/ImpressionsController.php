<?php

namespace App\Http\Controllers\Admin;

use App\Impressions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImpressionsController extends Controller
{
    public function index()
    {
        $impressions = Impressions::paginate(5);

        return view('admin/impressions/index')
            ->with('impressions',$impressions);
    }

    public function confirm($id)
    {
        $impression = Impressions::find($id);

        if($impression->status == 0)
        {
            $impression->status = 1;
            $impression->save();

            return redirect(route('AdminImpressions'))
                ->with('success','Impression confirmed.');
        }else if($impression->status == 1)
        {
            $impression->status = 0;
            $impression->save();

            return redirect(route('AdminImpressions'))
                ->with('success','Impression unconfirmed.');
        }
    }

    public function destroy($id)
    {
        $impression = Impressions::find($id);
        $impression->delete();

        return redirect(route('AdminImpressions'))
            ->with('success','Impression deleted.');
    }

}
