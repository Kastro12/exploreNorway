@extends('layouts.app')
@section('content')
    @include('inc.header')
    <br/><br/><br/>
    <hr>

    <div class="container">
    <div class="row">
        <!-- LEFT SIDE -->
    <div class="col-sm-8"><br/><br/>
        <div class="subtitle">GALLERY</div><div class="divUnderline"></div><br/>
    It is a long established fact that a reader will be distracted by the readable
    content of a page when looking at its layout. The point of using Lorem Ipsum is
    that it has a more-or-less normal distribution of letters, as opposed to using
    'Content here, content here', making it look like readable English.
    <br/><br/><br/>
        <!--  IMAGES   -->
    <div class="container-fluid">
    <div class="row">
        <!-- foreach start here  -->
        @foreach($gallery as $image)

            <div class="col-sm-4">
    <a href="/norway/public/images/gallery/{{$image->name}}" data-fancybox="group">
                <div class="show_img">

                <img src="images/gallery/{{$image->name}}" class="img-responsive"/>

                </div>
            </a>
            </div>

        @endforeach
    </div>
    </div>
        <!-- END IMAGES -->

    </div>
        <!--  RIGHT SIDE  -->
        <div class="col-sm-4"><br/><br/>
                <!-- ABOUT US -->
                <div class="subtitle">ABOUT US</div><div class="divUnderline"></div><br/>
                It is a long established fact that a reader will be distracted by the readable
                content of a page when looking at its layout. The point of using Lorem Ipsum is
                that it has a more-or-less normal distribution of letters, as opposed to using
                'Content here, content here', making it look like readable English. Many desktop
                publishing packages and web page editors now use Lorem Ipsum as their default model
                text, and a search for 'lorem ipsum' will uncover many web sites still in their
                infancy.

                <br/><br/><br/>

                <div class="subtitle">FOLLOW US</div><div class="divUnderline"></div><br/>
            <i class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <i class="fab fa-instagram"></i>
                <br/><br/><br/>


                <!-- Impressions - utisci -->
                <div class="subtitle">IMPRESSIONS</div><div class="divUnderline"></div><br/>
                <div class="impressions">

        @foreach($impressions as $impression)

        <i>{{$impression->user->name}}</i><br/><br/>
        {!!$impression->text!!}<hr><br/>

        @endforeach

                </div>
        </div>


    </div><!-- div row -->
    </div><!-- div container -->
    <br/><br/><br/>




@include('inc.footer')
@endsection