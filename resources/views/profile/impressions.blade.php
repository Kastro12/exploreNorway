@extends('layouts.app')

@section('content')

    @include('inc.header')
    <br/><br/><br/>
    <hr>


    <div class="container">
        <div class="row">
            <div class="col-sm-12"><br/><br/>
                <center><div class="subtitle">Write impression</div><div class="divUnderline"></div></center>
                <br/><br/>

                @if(!empty(session('errorMsg')))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('errorMsg') }}
                    </div>
                @endif

                <div class="row">
                <div class="col-sm-12">

                    {!! Form::open(['action'=>'ProfileController@impressionsStorage',
                    'method'=>'POST','enctype'=>'multipart/form-data']) !!}

                    <div class="form-group">
                        {{Form::label('body', 'Text')}}
                        {{Form::textarea('text','',['id'=>'article-ckeditor','class' => 'form-control', 'placeholder' => 'Body text','required'])}}
                    </div>
                    {{Form::submit('Submit',['class' => 'send btn btn-lg'])}}
                    {!! Form::close() !!}

                </div>
                </div>

            </div>
        </div><!-- div row -->
    </div><!-- div container -->
    <br/><br/><br/>




    @include('inc.footer')

    <script src="{{asset('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

@endsection
