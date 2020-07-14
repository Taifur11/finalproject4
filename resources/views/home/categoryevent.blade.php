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

						<h1>{{$name->name}} Events</h1>
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

	                                    <!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- MAIN -->
			<main id="main" class="col-md-9">
				<div class="row">
					@foreach($events as $event)
					
					<!-- article -->
					<div class="col-md-6">
						<div class="causes">
							<div class="causes-img">
								<a href="{{url('/singleevent/'.$event->id)}}">
									<img src="{{URL::to($event->image)}}" alt="" width="397" height="299">
								</a>
							</div>
							<div class="causes-progress">
								<div class="causes-progress-bar">
									<div style="width: {{($event->raised*100)/$event->goal}}%;">
										<span>{{($event->raised*100)/$event->goal}}%</span>
									</div>
								</div>
								<div>
									<span class="causes-raised">Raised: <strong>{{ $event->raised }} Tk</strong></span>
									<span class="causes-goal">Goal: <strong>{{ $event->goal }} Tk</strong></span>
								</div>
							</div>
							<div class="causes-content">
								<h3><a href="single-cause.html">{{ $event->title }}</a></h3>
								<p>{!! $event->body !!}</p>
								<a href="{{url('/donate/'.$event->id)}}" class="primary-button causes-donate">Donate Now</a>
								<a href="{{url('/singleevent/'.$event->id)}}" class="primary-button causes-donate" style="float: right;">View Details</a>
							</div>
						</div>
					</div>
					<!-- /article -->
					
					@endforeach
					
					</div>

			

					

											<!-- pagination -->
					<div class="pagination1">
					  <a href="#">&laquo;</a>
					  <a href="#">1</a>
					  <a href="#" class="active">2</a>
					  <a href="#">3</a>
					  <a href="#">4</a>
					  <a href="#">5</a>
					  <a href="#">6</a>
					  <a href="#">&raquo;</a>
					</div>
											<!-- /pagination -->
			</main>
			<!-- /MAIN -->

			                                <!-- ASIDE -->
			<aside id="aside" class="col-md-3">
				<!-- category widget -->
				<div class="widget">
					<h3 class="widget-title">Category</h3>
					<div class="widget-category">
						<ul>
							@foreach($categories as $category)
                            <li><a href="{{url('/category/'.$category->id)}}">{{$category->name}}<span>({{$category->events->count()}})</span></a></li>
                            @endforeach
						</ul>
					</div>
				</div>
				<!-- /category widget -->
				<!-- causes widget -->
				
				<div class="widget">
					<h3 class="widget-title">Successfull Events</h3>
@foreach($histories as $history)
					<!-- single causes -->
					<div class="widget-causes">
						<a href="#">
							<div class="widget-img">
								<img src="{{URL::to($history->event_image)}}" alt="">
							</div>
							<div class="widget-content">
								{{$history->event_title}}
								
							</div>
						</a>
						<div>
	                        <div>
	                            <div>Required Day : <strong>{{$history->event_days}}</strong></div>
	                        </div>
                        </div>
						<div>
							<span class="causes-raised">Raised: <strong>{{$history->event_raised}} Tk</strong></span> -
							<span class="causes-goal">Goal: <strong>{{$history->event_goal}} Tk</strong></span>
						</div>
					</div>
					<!-- /single causes -->
@endforeach
				</div>
				
				<!-- causes widget -->
			</aside>
			<!-- /ASIDE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
                                       <!-- /SECTION -->


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