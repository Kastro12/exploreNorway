@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('users')}}">
                <button class="btn btn-light" style="margin-right: 20px"><b>All Users</b></button>
            </a>
        </li>
        <li>
            <a href="{{route('usersWith')}}">
                <button class="btn btn-light" style="margin-right: 20px">With reservations</button>
            </a>
        </li>
        <li>
            <a href="{{route('usersWithout')}}">
                <button class="btn btn-dark" style="margin-right: 20px">Without reservations</button>
            </a>
        </li>
        <li>
            <div class="totalNumber"> Number of users without reservations: <b>{{count($users)}}</b></div>
        </li>


    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created at</th>
                        <th>Delete</th>
                    </tr>

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->created_at}}</td>

                            <!-- FORM FOR DELETE -->
                            {!! Form::open(['action'=> ['Admin\UsersController@destroy',$user->id],
    'method'=>'POST','enctype'=>'multipart\form_data']) !!}
                            <td>
                                {{Form::hidden('_method','DELETE')}}
                                {{Form::submit('✘',['class'=>'btn btn-danger'])}}
                            </td>
                            {!! Form::close() !!}

                        </tr>
                    @endforeach
                </table>
                {{$users->links()}}
            </div>
        </div>
    </div>



@endsection