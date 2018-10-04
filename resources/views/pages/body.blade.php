<br/><br/><br/>
<div class="container">
    <div class="row">
    <div class="col-sm-8">


        <!-- OUR ROUTES  -->
 <center><div class="subtitle">OUR ROUTE</div><div class="divUnderline"></div><br></center>
   <div class="routeText">
        Discover the beautiful nature in a diverse way: hiking, rafting, jeep safary.<br/>
        Get to know the culture, the long history of these people.<br/>
        Enjoy hospitality, and delicious food from these areas.<br/>
   </div><br/>
   <a href="{{asset('/routes')}}">
   <img src="{{asset('images/gallery/rafting.jpg')}}" class="route"><br/><br/>
   </a>
   <center><div class="readMore"><a href="{{asset('/routes')}}"> READ MORE </a></div></center><br/>
   <hr><br/><br/>

        <!--  CONTACT FORM   -->
        <div id="contact_form">
        Do you have any questions? Contact us. We will get in touch with you soon…<br/>
            <form action="{{asset('/sendEmail')}}" method="post">
                {{ csrf_field() }}
                <label class="col-form-label">Email</label>
                <input type="email" name="email" class="form-control" required/>
                <label class="col-form-label">Subject</label>
                <input id="subject" name="subject" class="form-control" required/>
                <label class="col-form-label">Message</label>
                <textarea class="form-control" rows="4" id="bodyMmessage" name="bodyMessage" required></textarea><br/>
                <center><input type="submit" value="Send Message" class="send btn btn-lg"></center>

            </form>
        </div>


    </div>
    <div class="col-sm-4">
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

        <!-- GALLERY -->
        <div class="subtitle">GALLERY</div><div class="divUnderline"></div><br/>
       <a href="{{asset('/gallery')}}" class="galleryLink">
               Look at the pictures from our adventures.
           </a>


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

    </div>
</div>
<br/><br/><br/>