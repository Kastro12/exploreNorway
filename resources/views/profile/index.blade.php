@extends('layouts.app')

@section('content')

    @include('inc.header')
    <br/><br/><br/>
    <hr>


<div class="container">

    @if(!empty(session('successImp')))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('successImp') }}
        </div>
        @endif

 <div class="row">
 <div class="col-sm-12"><br/><br/>
 <center><div class="subtitle">YOUR PROFILE</div><div class="divUnderline"></div></center>
<br/><br/>

     <div class="row">
         <!-- User INFO -->
     <div class="col-sm-3">

         <div class="subtitle">YOUR INFO:</div><div class="divUnderline"></div>
     Name:   {{Auth::user()->name}}<br/>
      Email:  {{Auth::user()->email}}<br/>
      Phone:  {{Auth::user()->phone}}<br/><br/><br/>

         <div class="subtitle">IMPRESSIONS</div><div class="divUnderline"></div><br/>

         We are very interested in your impressions.

     <b><a href="{{route('impressions')}}" class="galleryLink">Write us.</a></b>


         <br/><br/>

     </div>
     <!-- reserves -->
     <div class="col-sm-9">
     <div class="profile">

         @if(count($reserves) > 0)
             <h4><b>Your journey:</b></h4><br/>
         @foreach($reserves as $reserve)
             <table>
                 <tr>
                     <th>Arrival:&nbsp;&nbsp;</th>
                     <td>{{$reserve->route->arrival}}</td>
                 </tr>
                 <tr>
                     <th>Departure:&nbsp;&nbsp;</th>
                     <td>{{$reserve->route->departure}}</td>
                 </tr>
                 <tr>
                     <th>Price:&nbsp;&nbsp;</th>
                     <td>{{$reserve->price}}€</td>
                 </tr>
                 <tr>
                     <th>Paid:&nbsp;&nbsp;</th>
                     <td>{{$reserve->paid}}€</td>
                 </tr>
                 <tr>
                     <th>Route:&nbsp;&nbsp;</th>
                     <td>{{$reserve->route->name}}</td>
                 </tr>
                 <tr>
                     <th></th>
                     <td>{!!$reserve->route->route!!}</td>
                 </tr>
                 <tr>
                     <th>Note:</th>
                     <td>You reported {{$reserve->friends}} friends.</td>
                 </tr>
             </table>

<hr>
          @endforeach

         @else
             <b>Reservation:</b><br/><br/>
             <h3>You do not have a reservation.</h3>
         @endif
     </div>
     </div>
     </div>

</div>
</div><!-- div row -->
</div><!-- div container -->
    <br/><br/><br/>




    @include('inc.footer')



@endsection
