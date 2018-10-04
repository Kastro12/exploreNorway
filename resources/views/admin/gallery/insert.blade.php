@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('gallery')}}">
                <button class="btn btn-light" style="margin-right: 20px"><b>Gallery</b></button>
            </a>
        </li>
        <li>
            <a href="{{route('galleryInsert')}}">
                <button class="send btn" style="margin-right: 20px">Insert new image</button>
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

        @if(!empty(session('error')))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('error') }}
            </div>
        @endif

    {!! Form::open(['action'=>'Admin\GalleryController@create','method'=>'POST',
    'enctype'=>'multipart/form-data']) !!}

    {{Form::file('image',['required'])}}
    <br/><br/>
    {{Form::submit('Insert',['class' => 'send btn btn-lg'])}}

    {!! Form::close() !!}

            </div>
        </div>
    </div>



@endsection