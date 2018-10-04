@extends('layouts.app')
@section('content')
    @include('inc.header')
    <br/><br/><br/>
<hr>
    <div class="container">
        <div class="row">
            <!-- LEFT SIDE -->
        <div class="col-sm-8"><br/><br/>

            <!-- Prikazuje gresku  -->

        @if(!empty(session('errorMessage')))
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('errorMessage') }}
        </div>
        @endif

    @if(!empty($routes))
                <!--  ROUTES   -->
            <div class="subtitle">ROUTE</div><div class="divUnderline"></div><br/>
            {{$routes->links()}}
            @foreach($routes as $route)
                <h3>{{$route->name}}</h3><br/>
                <b>Arrival:</b>{{$route->arrival}}<br/>
                <b>Departure:</b>{{$route->departure}}<br/>
                <b>Price per person:</b>{{$route->price}} € <br/><br/>
            {!! $route->route !!}<br/><br/>
                    *Price does not include Flight cost.
    @guest
 <center><button data-toggle="modal" data-target="#exampleModalCenterLogin" class="send btn btn-lg" style="width: 100px">JOIN IN</button></center>
    @else
 <center><button data-toggle="modal" data-target="#exampleModalCenter" class="send btn btn-lg" style="width: 100px">JOIN IN</button></center>
    @csrf
    @endguest

            @endforeach
                <!-- END ROUTES -->

            <!-- MODAL join -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">JOIN IN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['action'=>'RoutesController@join',
                            'method'=>'POST','enctype'=>'multipart\form_data']) !!}
                            We will send you invoice on your email.You need to pay 30% of full price.In that
                            way you will confirm your reservation.<br/>
                            If you want to come with your friends fill in the fields.<br/><br/>
                            {{Form::label('friends','Number of friends')}}
                            {{Form::number('friends','',['class'=>'form-control'])}}

                            {{Form::label('friends_info','Write their names and email or phone number')}}
                            {{Form::textarea('friends_info','',['class'=>'form-control'])}}
                        </div>
                        <div class="modal-footer">
                            {{Form::button('Close',['class'=>'btn btn-secondary','data-dismiss'=>'modal'])}}
                            {{Form::submit('Reserve',['class'=>'send btn'])}}
                        </div>
            @foreach($routes as $route)

                            {{Form::hidden('route_id',$route->id)}}
                            {{Form::hidden('price',$route->price)}}
                            {!! Form::close() !!}
            @endforeach
                    </div>
                </div>
            </div>
            <!-- END MODAL -->

            @else
                <b>No route for now</b>


                @csrf
            @endif

        </div>



            <!-- MODAL LOGIN -->
            <div class="modal fade" id="exampleModalCenterLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3> To reserve, you have to be logged in.</h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="send btn">
                                <a class="send" href="{{asset('/login')}}">OK</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->


            <!--  RIGHT SIDE  -->
        <div class="col-sm-4"><br/><br/>
            <div class="subtitle">CHOOSE ACTIVITIES FOR YOUR ROUTE</div><div class="divUnderline"></div><br/>
            Select the date and activities that you, or you and your
            friends want to do and we will create a route for your.<br/>

   @guest
   <b><a href="{{route('create_route')}}" class="galleryLink">Choose arrival date and activities.(Login first)</a></b>
   @else
   <b><a href="{{route('create_route')}}" class="galleryLink">Choose arrival date and activities.</a></b>
   @csrf
   @endguest

 <br/><br/>

        </div>
        </div><!-- div row -->
    </div><!-- div container -->
    <br/><br/><br/>







    @include('inc.footer')
@endsection