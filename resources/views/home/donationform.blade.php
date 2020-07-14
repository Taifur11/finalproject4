{{--$event->raiser->name--}}
   {{--$event->raiser_id--}}
   {{--$event->id--}}
@extends('layouts.frontend.app')
@push('css')

  <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/form.css">

@endpush
@section('slider')

<!-- Page Header -->
    <div id="page-header">
        <!-- section background -->
        <div class="section-bg" style="background-image: url( {{ asset($event->image)}} );"></div>
        <!-- /section background -->

        <!-- page header content -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-content">
                        <h1>Single Cause Page</h1>
                        <ul class="breadcrumb">
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="#">Causes</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header content -->
    </div>
    <!-- /Page Header -->

@endsection
@section('content')
   <br>
<div class="container">
    <div class="main">
  <h1 class="fromh1">Auto Formatting Currency</h1>
  
  <form method="post" action="{{route('payment')}}">
    @csrf
  <label for="currency-field" class="formlebel">Enter Amount</label>
  <input type="text" name="tk" id="currency-field"  value=""  placeholder="Tk:" class="forminput">
    <input type="text" name="eventid" id="currency-field"  value="{{$event->id}}"  placeholder="Tk:" class="forminput" hidden="1">


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
                            <li><i class="fa fa-map-marker"></i> {{$info->address}}</li>
                            <li><i class="fa fa-phone"></i> {{$info->phone_no}}</li>
                            <li><i class="fa fa-envelope"></i> <a href="https://{{$info->email}}" target="_blank">{{$info->email}}</a></li>
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
