<?php

namespace App\Http\Controllers\Admin;

use App\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReservationsController extends Controller
{
    public function index()
    {
        $reserves = Reserve::orderBy('created_at','DESC')
            ->paginate(10);

        return view('admin/reservations/index')->with('reserves',$reserves);
    }

    public function unconfirmed()
    {
        $reserves = Reserve::where('status',0)
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('admin/reservations/unconfirmed')->with('reserves',$reserves);
    }

    public function confirmed()
    {
        $reserves = Reserve::where('status',1)
            ->orderby('created_at','DESC')
            ->paginate(10);

        return view('admin/reservations/confirmed')->with('reserves',$reserves);
    }

    public function settledDebts()
    {
        $reserves = Reserve::where('status',1)
            ->orderBy('created_at','DESC')
            ->paginate(10);

        return view('admin/reservations/settledDebts')->with('reserves',$reserves);
    }

    public function edit($id)
    {
        $reserves = Reserve::find($id);

        return view('admin/reservations/edit')->with('reserves',$reserves);
    }

    public function update(Request $request, $id)
    {

        $reserve = Reserve::find($id);
        $payment = $reserve->paid + $request->paid;
        $reserve->paid = $payment;
        $reserve->status=1;
        $reserve->save();

        return redirect(route('reservationsConfirmed'))->with('success','Reservation confirmed!');

    }

    public function destroy($id)
    {
        $res = Reserve::find($id);
        $res->delete();

        return redirect(route('reservations'))->with('success','Reservation deleted');

    }

}
