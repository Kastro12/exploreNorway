@extends('layouts.adminApp')
@section('content')

    <!-- title -->

    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12"><br/>
                <center>
                    <table class="table table-bordered table-hover">


        <tr><th>Reservation Day</th><td>{{$reserves->created_at}}</td></tr>
        <tr><th>Apartment</th><td>{{$reserves->route->name}}</td></tr>
        <tr><th>Email</th><td>{{$reserves->user->email}}</td></tr>
        <tr><th>Arrival</th><td>{{$reserves->route->arrival}}</td></tr>
        <tr><th>Departure</th><td>{{$reserves->route->departure}}</td></tr>
        <tr><th>Full price</th><td>{{$reserves->price}}€</td></tr>
        <tr><th>Paid</th><td>{{$reserves->paid}}€</td></tr>
        <tr><th>Dept</th><td>{{$reserves->price - $reserves->paid}}€</td></tr>

                            <!-- FORM FOR UPDATE -->
        {!! Form::open(['action'=>['Admin\ReservationsController@update',$reserves->id],
        'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <tr><th style="color: green">New payment</th>
        <td>
        {{Form::number('paid',0,['class' => 'form-control'])}}
        </td></tr>
        <tr><th></th>
        <td>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
        </td>
        </tr>
        {!! Form::close() !!}

        </table>
        </center>




            </div>
        </div>
    </div>

@endsection