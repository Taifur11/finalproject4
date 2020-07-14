<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            @if($imagelink=Auth::guard('raiser')->user()->image)
                    <img src="{{url($imagelink)}}" width="48" height="48" alt="User" />
                    @endif
        </div>
        <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('raiser')->user()->name}}</div>
                    <div class="email">{{Auth::guard('raiser')->user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li class="{{ Request::is('raiser/profile/*') ? 'active' : '' }}">
                        <a href="{{route('raiser.profile.index')}}">
                            <i class="material-icons">settings</i>
                            <span>Profile</span>
                        </a>
                          </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" onclick="event.preventDefault();document.querySelector('#raiser-logout-form').submit();">
                                
                                <form id="raiser-logout-form" action="{{ route('raiser.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                                <i class="material-icons">input</i>Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>


                    
                    

                    @if(Request::is('raiser/*'))
                    <li class="{{Request::is('raiser/dashboard') ? 'active' : '' }}">
                        <a href="{{route('raiser.dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <span>DashBoard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('raiser/event*') ? 'active' : '' }}">
                        <a href="{{route('raiser.event.index')}}">
                            <i class="material-icons">library_books</i>
                            <span>Events</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('raiser/withdraw/event') ? 'active' : '' }}">
                        <a href="{{route('raiser.event.withdraw')}}">
                            <i class="material-icons">unarchive</i>
                            <span>Withdraw</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('raiser/profile/*') ? 'active' : '' }}">
                        <a href="{{route('raiser.profile.index')}}">
                            <i class="material-icons">settings</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('raiser/expire*') ? 'active' : '' }}">
                        <a href="{{route('raiser.event.expire')}}">
                            <i class="material-icons">unarchive</i>
                            <span>Expire Events</span>
                        </a>
                    </li>
    
                    @endif


                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">Taifur Ahmed</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>