@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('routes')}}">
                <button class="btn btn-dark" style="margin-right: 20px">User's wishes</button>
            </a>
        </li>
        <li>
            <a href="{{route('current')}}">
                <button class="btn btn-light" style="margin-right: 20px">Created routes</button>
            </a>
        </li>
        <li>
            <a href="{{route('filled')}}">
                <button class="btn btn-light" style="margin-right: 20px">Locked routes</button>
            </a>
        </li>
        <li>
            <a href="{{route('admincreateroute')}}">
                <button class="send btn" style="margin-right: 20px">Create route</button>
            </a>
        </li>

    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>User</th>
                        <th>Activities</th>
                        <th>Arrival</th>
                        <th>Departure</th>
                        <th>Friends</th>
                        <th>Friends info</th>
                        <th>Created at</th>
                    </tr>
                    @foreach($create_routes as $create_route)
                        <tr>
                            <td>{{$create_route->user->name}}</td>
                            <td>{{$create_route->activities}}</td>
                            <td>{{$create_route->arrival}}</td>
                            <td>{{$create_route->departure}}</td>
                            <td>{{$create_route->friends}}</td>
                            <td>{{$create_route->friends_info}}</td>
                            <td>{{$create_route->created_at}}</td>
                        </tr>
                    @endforeach

                </table>
                {{$create_routes->links()}}
            </div>
        </div>
    </div>



@endsection