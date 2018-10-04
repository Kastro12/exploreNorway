@extends('layouts.app')

@section('content')

    @include('inc.header')
    <br/><br/><br/>
    <hr>


    <div class="container">
    <div class="row">

    <div class="col-sm-12"><br/>
    <center><div class="subtitle">CHOOSE DATE YOU WANT TO COME
        AND ACTIVITIES FOR YOU AND YOUR FRIENDS</div><div class="divUnderline"></div></center>
    <br/><br/>

        Fill in all filds, we will create route for you and send you offer.
        <br/><br/><br/>
        @if(!empty(session('errorMessage')))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('errorMessage') }}
            </div>
        @endif

        @if(!empty(session('successMessage')))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session('successMessage') }}
            </div>
        @endif


        <!-- FORM!!!!!!!!!!!!!!!!!!!!! -->

    {!! Form::open(['action'=>'RoutesController@create_R',
    'method'=>'POST','enctype'=>'multipart/form_data']) !!}
     <div class="row">
         <div class="col-sm-12">
             <div class="row">
    <div class="col-sm-2">
        <!-- ARRIVAL -->
    {{Form::label('arrival','Arrival')}}
        <div class="divUnderline"></div><br/>
    {{Form::text('arrival','',['class'=>'form-control','id'=>'arrival','required','readonly'])}}

    </div>
    <div class="col-sm-2">
        <!-- DEPARTURE -->
        {{Form::label('departure','Departure')}}
        <div class="divUnderline"></div><br/>
        {{Form::text('departure','',['class'=>'form-control','id'=>'departure','required','readonly'])}}

    </div>



                 <div class="col-sm-2">
                     <!-- NUM OF FRIENDS -->
             {{Form::label('friends','Number of friends')}}
                     <div class="divUnderline"></div><br/>
             {{Form::number('friends','',['class'=>'form-control'])}}

                 </div>
                 <div class="col-sm-6">
                     <!-- FRIENDS INFO-->
             {{Form::label('friends_info','Write their names and email or phone number')}}
                     <div class="divUnderline"></div><br/>
            {{Form::textarea('friends_info','',['class'=>'form-control','rows'=>'5'])}}

                 </div>
             <!-- div row for friends -->
             </div><!-- div row FOR DATE -->

         </div>
     </div>


    <div class="col-sm-12">
         <!-- Activities -->
  Activities<div class="divUnderline"></div><br/>
        <div class="row">
        @foreach($activities as $activity)
        <?php $ac = $activity->name;?>
        <div class="col-sm-4">
            <div class="row">
           <div class="col-sm-4">
        {{$activity->name}}
           </div>
<div class="col-sm-2">
   {{Form::checkbox('activities',$ac,false,['class' => 'form-control','name'=>'checkbox[]'])}}
</div>
            </div>
<br/><br/>
        </div>
        @endforeach
        </div>

     </div>
     </div><!-- DIV ROW FOR ALL CREATE ROUTE FORM -->
        <center>
            {{Form::submit('Create Route',['class'=>' send btn btn-lg'])}}
        </center>

    {!! Form::close() !!}

    </div>
    </div><!-- div row -->
    </div><!-- div container -->
    <br/><br/><br/>
    <br/><br/><br/><br/><br/>



    @include('inc.footer')



@endsection
