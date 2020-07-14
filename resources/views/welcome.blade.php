@extends('layouts.frontend.app')
@section('slider')
<br><br><br>
        <div id="home-owl" class="owl-carousel owl-theme">


            

        @foreach($sliders as $slider)

        <!-- home item -->
        <div class="home-item">
            <!-- section background -->
            <div class="section-bg" style="background-image: url({{ $slider->image }});"></div>
            <!-- /section background -->

            <!-- home content -->
            <div class="home">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="home-content">
                                <h1>{{$slider->title}}</h1>
                                <p class="lead">{!! $slider->body !!}</p>
                                <a href="{{url('/singleevent/'.$slider->id)}}" class="primary-button">View Causes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /home content -->
        </div>
        <!-- /home item -->
            @endforeach


            

        </div>
    

@endsection
@section('content')


    <section class="causes_area">
    <div class="container">
        <div class="main_title">
        
            <h2>Our major Services</h2>
            <p>Donate Helpless People.Build A Beautiful Contry</p>
            
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4">
                <div class="single_causes">
                
                    <h4>{{$service->heading}}</h4>
                    <img src="{{URL::to($service->image)}}" alt="">
                    <p>
                        {!!$service->body!!}
                    </p>
                    
                </div>
            </div>

            @endforeach
        </div>
    </div>
</section>

                                            <!-- /Causes_area -->

                                            <!-- Events Area -->


<div>
    <!-- container -->
    <div class="container">
        <div class="main_title">
            <h2> Recent Approved Events</h2>
            <p>Donate Helpless People.Build A Beautiful Contry</p>
        </div>
        <!-- row -->
        <div class="row">
            
            @foreach($events as $event)
            <!-- causes -->
            <div class="col-md-4">
                <div class="causes">
                    <div class="causes-img">
                        <a href="{{url('/singleevent/'.$event->id)}}">
                            <img src="{{ $event->image }}" alt="" width="350" height="263">
                        </a>
                    </div>
                    <div class="causes-progress">
                        <div class="causes-progress-bar">
                            <div style="width: {{($event->raised*100)/$event->goal}}%;">
                                <span>
                                    <?php 
                                    $var=($event->raised*100)/$event->goal;
                                    $var1=number_format($var, 2, '.', ',');
                                    
                                    ?>
                                        {{$var1}}%
                                    </span>
                            </div>
                        </div>
                        <div>
                            <span class="causes-raised">Raised: <strong>

                                <?php 
                                    
                                    $var2=number_format($event->raised, 2, '.', ',');
                                    
                                    ?>
                                {{ $var2 }}Tk</strong></span>
                            <span class="causes-goal">Goal: <strong><?php 
                                    
                                    $var3=number_format($event->goal, 2, '.', ',');
                                    
                                    ?>
                                {{ $var3 }} TK</strong></span>
                        </div>
                    </div>
                    <div class="causes-content">
                        <h3><a href="{{url('/singleevent/'.$event->id)}}">{{ $event->title }}</a></h3>
                        <p>{!! $event->body !!}</p>
                        <a href="{{url('/donate/'.$event->id)}}" class="primary-button causes-donate " style="float: left;">Donate Now</a>
                        <a href="{{url('/singleevent/'.$event->id)}}" class="primary-button causes-donate" style="float: right;">View Details</a>
                    </div>
                </div>
            </div>
            <!-- /causes -->
            @endforeach
            
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
    
<br><br><br>
    <div class="container">
        <div class="main_title">
            <h2>Successfull Events</h2>
            <p>Donate Helpless People.Build A Beautiful Contry</p>
        </div>
        <!-- row -->
        <div class="row">
            
            @foreach($histories as $history)
            <!-- causes -->
            <div class="col-md-4">
                <div class="causes">
                    <div class="causes-img">
                                <a href="{{url('/successfullsingleevent/'.$history->id)}}">
                                    <img src="{{ $history->event_image }}" alt="" width="397" height="299">
                                </a>
                    </div>
                            <div class="causes-progress">

                                <div>
                                    <span class="causes-raised">Raised: <strong>{{ $history->event_raised }} Tk</strong></span>
                                    <span class="causes-goal">Goal: <strong>{{ $history->event_goal }} Tk</strong></span>
                                </div>
                            </div>
                    <div class="causes-content">
                                <h3>{{ $history->event_title }}</h3>
                                <p><strong>{{ $history->event_raised }} Tk</strong> raised in only {{ $history->event_days }} days.</p>
                            
                                <a href="{{url('/successfullsingleevent/'.$history->id)}}" class="primary-button causes-donate">View Details</a>
                    </div>
                </div>
            </div>
            <!-- /causes -->
            @endforeach
            
        </div>
        <!-- /row -->
        <div class="text-center">
            <a href="{{route('successevents')}}">
        <button type="button" class="btn btn-outline-success btn-lg">More..</button>
        </a>
        </div>
    </div>
    <!-- /container -->
    <br><br>


                
              
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
                                <?php } ?>" alt="Logo Here">
                            </a>
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
                            <li><a href="{{url('/singleevent/'.$gallery->id)}}"><img src="{{ $gallery->image }}" alt="" width="110" height="110"></a></li>
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