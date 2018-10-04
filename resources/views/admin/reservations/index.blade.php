@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('reservations')}}">
                <button class="btn btn-dark" style="margin-right: 20px">All Reservations</button>
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
                <button class="btn btn-light" style="margin-right: 20px">Settled debts</button>
            </a>
        </li>
        <li>
            <div class="totalNumber"> Total number of reservations: <b>{{count($reserves)}}</b></div>
        </li>

    </ol>
    <div class="mb-3">

        @if(!empty(session('success')))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('success') }}
            </div>
        @endif

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
                    </tr>
                    @foreach($reserves as $reserve)
                        <tr>
                            <td>{{$reserve->created_at}}</td>
                            <td>{{$reserve->route->name}}</td>
                            <td>{{$reserve->user->email}}</td>
                            <td>{{$reserve->route->arrival}}</td>
                            <td>{{$reserve->route->departure}}</td>
                            <td>{{$reserve->price}}</td>
                        </tr>
                    @endforeach

                </table>

    {{$reserves->links()}}
            </div>
        </div>
    </div>



@endsection