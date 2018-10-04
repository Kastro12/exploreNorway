@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('AdminImpressions')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>Impressions</b></button>
            </a>
        </li>

    </ol>
    <div class="mb-3">
        <div class="container-fluid">
            <div class="col-sm-12">

    @if(!empty(session('success')))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">
        <tr>
            <th>Created at</th>
            <th>User</th>
            <th>Text</th>
            <th>status</th>
            <th>Delete</th>
        </tr>
        @foreach($impressions as $impression)

            <tr>
                <td>{{$impression->created_at}}</td>
                <td>{{$impression->user->email}}</td>
                <td>{!!$impression->text!!}</td>
                <td>
        @if($impression->status === 0)

            {!! Form::open(['action'=>['Admin\ImpressionsController@confirm', $impression->id],
            'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Unconfirmed',['class'=>'btn btn-dark'])}}
            {!! Form::close() !!}
        @else
            {!! Form::open(['action'=>['Admin\ImpressionsController@confirm', $impression->id],
            'method'=>'POST','enctype'=>'multipart/form-data']) !!}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Confirmed',['class'=>'btn btn-success'])}}
            {!! Form::close() !!}
        @endif
                </td>

        <!-- FORM FOR DELETE -->
        {!! Form::open(['action'=>['Admin\ImpressionsController@destroy',$impression->id],
        'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <td>
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('✘',['class'=>'btn btn-danger'])}}
        </td>
        {!! Form::close() !!}
    </tr>

        @endforeach
    </table>
    {{$impressions->links()}}


            </div>
        </div>
    </div>



@endsection