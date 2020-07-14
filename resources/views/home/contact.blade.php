@extends('layouts.frontend.app')
@section('slider')

<!-- Page Header -->
	<div id="page-header">
		<!-- section background -->
		<div class="section-bg" style="background-image: url( {{ asset('assets/frontend') }}/img/images.png);"></div>
		<!-- /section background -->

		<!-- page header content -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-content">
						<h1>Contact Us</h1>
						<ul class="breadcrumb">
							<li><a href="{{route('index')}}">Home</a></li>
							
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
<div class="section">
	

    <div class="container">
      <div class="row block-9">
        <div class="col-md-6 pr-md-5">
          <form action="{{route('contactusstore')}}" method="post">
          	@csrf
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" placeholder="Your Name" name="name">
            </div>
            <div class="form-group">
              <input type="email" class="form-control px-3 py-3" placeholder="Your Email" name="email">
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" placeholder="Phone Number" name="phone_no">
            </div>
            <div class="form-group">
              <textarea id="" cols="30" rows="7" class="form-control px-3 py-3" placeholder="Comment" name="comments"></textarea>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary py-3 px-5">Feedback</button>
              
            </div>
          </form>
        
        </div>

        <div class="col-md-6" id="map">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3678.2752760812264!2d91.10007051443799!3d22.792261630617066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3754af712aaac0b7%3A0x4bab3d112f6b6f3f!2sNoakhali%20Science%20and%20Technology%20University!5e0!3m2!1sen!2sbd!4v1579889085570!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
      </div>
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