@extends('layouts.frontend.app')
@push('css')

  <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/form.css">

@endpush
@section('content')
   <br><br>
   <br><br>
<div class="container">
    <div class="main">
  <h1 class="fromh1">Dnonor Registration</h1>
  
  <form method="post" action="{{ route('donors.store') }}" enctype="multipart/form-data">
    @csrf

  <label for="name" class="formlebel">Enter Name</label>
  <input type="text" name="name" id="name"  value=""  placeholder="name" class="forminput">


  <label for="email" class="formlebel">Enter Email</label>
  <input type="email" name="email" id="email"  value=""  placeholder="Email" class="forminput">

  <label for="password" class="formlebel">Password</label>
  <input type="password" name="password" id="password"  value=""  placeholder="password" class="forminput">

  <label for="image" class="formlebel">Image</label>
  <input type="file" name="image" id="image"  value=""  placeholder="image" class="forminput">

    <label for="phone_no" class="formlebel">Phone No</label>
  <input type="text" name="phone_no" id="phone_no"  value=""  placeholder="phone_no" class="forminput">

    <label for="address" class="formlebel">Adress</label>
  <input type="text" name="address" id="address"  value=""  placeholder="address" class="forminput">

  <button type="submit" class="formbutton">Submit</button>
</form>


</div>
</div>
@endsection
@section('footer')
<footer id="footer" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- footer contact -->
                <div class="col-md-4">
                    <div class="footer">
                        <div class="footer-logo">
                            <a class="logo" href="{{route('index')}}"><img src="
                                <?php if($logo){ ?>
                                {{URL::to($logo->image)}}
                                <?php } ?>" alt=""></a>
                        </div>
                        <p>Online Donation Platform.Safe and Secure Donation.Make World Fine and Peacefull.</p>
                        <ul class="footer-contact">
                            <li><i class="fa fa-map-marker"></i> Maijdee Noakhali</li>
                            <li><i class="fa fa-phone"></i> 01759453031</li>
                            <li><i class="fa fa-envelope"></i> <a href="https://shovon1432@gmail.com" target="_blank">shovon1432@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer contact -->

                <!-- footer galery -->
                <div class="col-md-4">
                    <div class="footer">
                        <h3 class="footer-title">Galery</h3>
                        <ul class="footer-galery">
                            @foreach($galleries as $gallery)
                            <li><a href="{{url('/singleevent/'.$gallery->id)}}"><img src="{{URL::to($gallery->image)}}" alt="" width="110" height="110"></a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
                <!-- /footer galery -->

                <!-- footer newsletter -->
                <div class="col-md-4">
                    <div class="footer">
                        <h3 class="footer-title">Please Subscribe</h3>
                        <p>Please Subscribe For getting next notification.</p>
                        <form class="footer-newsletter" method="POST" action="{{ route('subscriber.store') }}">
                            @csrf
                            <input class="input" type="email" placeholder="Enter your email" name="email">
                            <button class="primary-button">Subscribe</button>
                        </form>
                        <ul class="footer-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer newsletter -->
            </div>
            <!-- /row -->

            <!-- footer copyright & nav -->
            <div id="footer-bottom" class="row">
                

                
                    <div class="footer-copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made  by <a href="https://google.com" target="_blank">Taifur Ahmed </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                
            </div>
            <!-- /footer copyright & nav -->
        </div>
        <!-- /container -->
    </footer>
@endsection