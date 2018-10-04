@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('reservations')}}">
                <button class="btn btn-light" style="margin-right: 20px"><b>All Reservations</b></button>
            </a>
        </li>
        <li>
            <a href="{{route('reservationsUnconfirmed')}}">
                <button class="btn btn-light" style="margin-right: 20px">Unconfirmed</button>
            </a>
        </li>
        <li>
            <a href="{{route('reservationsConfirmed')}}">
                <button class="btn btn-light" style="margin-right: 20px">Confirmed</button>
            </a>
        </li>
        <li>
            <a href="{{route('settledDebts')}}">
                <button class="btn btn-dark" style="margin-right: 20px">Settled debts</button>
            </a>
        </li>


    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Reservation Day</th>
                        <th>Apartment</th>
                        <th>Email</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Price</th>
                        <th>Paid</th>

                        <th>Delete</th>
                    </tr>
                    @foreach($reserves as $reserve)
                        @if($reserve->price <= $reserve->paid)
                            <tr>
                                <td>{{$reserve->reservation_day}}</td>
                                <td>{{$reserve->route->name}}</td>
                                <td>{{$reserve->user->email}}</td>
                                <td>{{$reserve->route->arrival}}</td>
                                <td>{{$reserve->route->departure}}</td>
                                <td>{{$reserve->price}}€</td>
                                <td>{{$reserve->paid}}€</td>


                                <!-- FORM FOR DELETE -->
    {!! Form::open(['action'=> ['Admin\ReservationsController@destroy',$reserve->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}
    <td>
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('✘',['class'=>'btn btn-danger'])}}
    </td>
    {!! Form::close() !!}
    </tr>
                        @endif
                    @endforeach
                </table>

            </div>
        </div>
    </div>



@endsection