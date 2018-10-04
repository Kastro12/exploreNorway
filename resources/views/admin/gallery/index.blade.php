@extends('layouts.adminApp')
@section('content')

    <!-- title -->
    <ol class="breadcrumb">

        <li>
            <a href="{{route('gallery')}}">
                <button class="btn btn-dark" style="margin-right: 20px"><b>Gallery</b></button>
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

    <table class="table table-bordered table-hover">
        <tr>
            <th>Image</th>
            <th>Image id</th>
            <th>Name</th>
            <th>Delete</th>
        </tr>
        @foreach($galleries as $gallery)
            <tr>
                <td style="float: right">{{$gallery->id}}</td>
                <td><center>
                    <img src="../images/gallery/{{$gallery->name}}" class="slika">
                    </center>
                </td>

                <td>{{$gallery->name}}</td>
                <td>
    <!-- FORM FOR DELETE -->
    {!! Form::open(['action'=>['Admin\GalleryController@destroy',$gallery->id],
    'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('✘',['class'=>'btn btn-danger'])}}

    {!! Form::close() !!}
                </td>

            </tr>
        @endforeach

    </table>
                {{ $galleries->links() }}
            </div>
        </div>
    </div>



@endsection