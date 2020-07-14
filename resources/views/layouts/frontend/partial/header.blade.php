    <header class="header_area">
        <div class="main_menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="{{route('index')}}"><img src="
                                <?php if($logo){ ?>
                            {{URL::to($logo->image)}}
                                <?php } ?>" alt="Logo Here">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">

                                
                                <li class="nav-item" class="{{ (request()->is('/')) ? 'active' : '' }}"><a class="nav-link" href="{{url('/')}}">Home</a></li>
                    
                                 <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Star As Fundraiser</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{url('login/raiser')}}">Login</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('register/raiser')}}">Register</a></li>
                                    </ul>
                                </li>

                             <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Donate</a>
                                    <ul class="dropdown-menu">
                                        

                                        @if(session()->get('email')== null)
                                        <li class="nav-item"><a class="nav-link" href="{{url('donor/login')}}">Sign In</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{ url('donor/register') }}">Sign Up</a></li>
                                        @else
                                        <li class="nav-item"><a class="nav-link" href="{{ url('/donorlogout') }}">Sign Out</a></li>
                                        @endif
                                    </ul>
                                </li>

                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{route('events')}}">Running Events</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('successevents')}}">Successfull Events</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item"><a class="nav-link" href="{{route('contactus')}}">Contact</a></li>
                                
                                <li class="nav-item"><a class="nav-link" href="{{url('login/admin')}}">Admin Login</a></li>

                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </div>
    </header>
    