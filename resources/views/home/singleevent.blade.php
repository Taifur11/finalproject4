@extends('layouts.frontend.app')
@section('slider')

<!-- Page Header -->
	<div id="page-header">
		<!-- section background -->
		<div class="section-bg" style="background-image: url({{URL::to($event->image)}});"></div>
		<!-- /section background -->

		<!-- page header content -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-content">
						<h1 >{{$event->title}} Details </h1>
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
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- MAIN -->
            <main id="main" class="col-md-9">
                <!-- article -->
                <div class="article causes-details">
                    <!-- article img -->
                    <div class="article-img">
                        <img src="{{URL::to($event->image)}}" class="img-responsive" alt="" 
                        width="825" height="515">
                    </div>
                    <!-- article img -->
                    <!-- causes progress -->
                    <div class="clearfix">
                        <div class="causes-progress">
                            <div class="causes-progress-bar">
                                <div style="width: {{($event->raised*100)/$event->goal}}%;">
                                    <span>{{($event->raised*100)/$event->goal}}%</span>
                                </div>
                            </div>
                            <div>
                                <span class="causes-raised">Raised: <strong>{{ $event->raised }} Tk</strong></span>
                                <span class="causes-goal">Goal: <strong>{{$event->goal}} Tk</strong></span>
                            </div>
                        </div>
                        <a href="{{url('/donate/'.$event->id)}}" class="primary-button causes-donate">Donate Now</a>
                    </div>
                    <!-- /causes progress -->

                    <!-- article content -->
                    <div class="article-content">
                        <!-- article title -->
                        <h2 class="article-title">{{$event->title}}</h2>
                        <!-- /article title -->

                        <!-- article meta -->
                        <ul class="article-meta">
                            <li> <strong>Event Cretaed At: </strong>{{$event->created_at}}</li>
                            <li><strong>Event Creator Name: </strong>{{$event->raiser->name}}</li>
                        </ul>
                        <!-- /article meta -->

                        <p>{!!$event->body!!}</p>
                    </div>
                    <!-- /article content -->



                </div>
                <!-- /article -->
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
            </aside>
            <!-- /ASIDE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

    <!-- <div class="container">
      <div class="row block-9">
        <div class="col-md-6 pr-md-5">
          <form action="{{route('comment')}}" method="post">
            @csrf
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" placeholder="Your Name" name="name">
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" placeholder="Phone Number" name="phone">
            </div>
            <div class="form-group">
              <input type="text" class="form-control px-3 py-3" placeholder="Phone Number" name="id" hidden="1" value="{{$event->id}}">
            </div>
            <div class="form-group">
              <textarea id="" cols="30" rows="7" class="form-control px-3 py-3" placeholder="Comment" name="comment"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary py-3 px-5">Feedback</button>
              
            </div>
          </form>
        
        </div>
    
      </div>
    </div> -->


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