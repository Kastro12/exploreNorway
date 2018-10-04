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
                <button class="btn btn-dark" style="margin-right: 20px">Unconfirmed</button>
            </a>
        </li>
        <li>
            <a href="{{route('reservationsConfirmed')}}">
                <button class="btn btn-light" style="margin-right: 20px">Confirmed</button>
            </a>
        </li>
        <li>
            <a href="{{route('settledDebts')}}">
                <button class="btn btn-light" style="margin-right: 20px">Settled debts</button>
            </a>
        </li>
        <li>
            <div class="totalNumber"> Number of unconfirmed reservations: <b>{{count($reserves)}}</b></div>
        </li>

    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Reservation Day</th>
                        <th>Route</th>
                        <th>Email</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Price</th>
                        <th>Reservation</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($reserves as $reserve)
            <tr>
                <td>{{$reserve->created_at}}</td>
                <td>{{$reserve->route->name}}</td>
                <td>{{$reserve->user->email}}</td>
                <td style="width: 130px">{{$reserve->route->arrival}}</td>
                <td style="width: 130px">{{$reserve->route->departure}}</td>
                <td>{{$reserve->price}}€</td>
                <td>
                    <a href="{{route('reserveEdit',['id'=>$reserve->id])}}">
                    <button class="btn btn-dark">Confirm</button>
                    </a>
                </td>

                            <!-- FORM FOR DELETE -->
    {!! Form::open(['action'=> ['Admin\ReservationsController@destroy',$reserve->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}
                            <td>
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('✘',['class'=>'btn btn-danger'])}}
                            </td>
    {!! Form::close() !!}

                        </tr>
                    @endforeach
                </table>
                {{$reserves->links()}}
            </div>
        </div>
    </div>



@endsection