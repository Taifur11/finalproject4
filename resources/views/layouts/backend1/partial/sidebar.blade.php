        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    @if($imagelink=Auth::guard('admin')->user()->image)
                    <img src="{{url($imagelink)}}" width="48" height="48" alt="User" />
                    @endif
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::guard('admin')->user()->name}}</div>
                    <div class="email">{{Auth::guard('admin')->user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
<ul class="dropdown-menu pull-right">
                              <li class="{{ Request::is('admin/profile/*') ? 'active' : '' }}">
                        <a href="{{route('admin.profile.index')}}">
                            <i class="material-icons">settings</i>
                            <span>Profile</span>
                        </a>
                          </li>
                            <li role="separator" class="divider"></li>
                            
                            <li><a href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                
                                <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
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

                    @if(Request::is('admin*'))
                    <li class="{{Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{route('admin.dashboard')}}">
                            <i class="material-icons">dashboard</i>
                            <span>DashBoard</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>Events Details</span>
                        </a>
                    <ul class="ml-menu">

                    <li class="{{ Request::is('admin/event*') ? 'active' : '' }}">
                        <a href="{{route('admin.event.index')}}">
                            <i class="material-icons">library_books</i>
                            <span>All Events</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/pending/event') ? 'active' : '' }}">
                        <a href="{{route('admin.event.pending')}}">
                            <i class="material-icons">help</i>
                            <span>Pending Events</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/withdrawing/event') ? 'active' : '' }}">
                        <a href="{{route('admin.event.withdrawing')}}">
                            <i class="material-icons">unarchive</i>
                            <span>withdrawing Events</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/sliding/event') ? 'active' : '' }}">
                        <a href="{{route('admin.event.sliding')}}">
                            <i class="material-icons">slideshow</i>
                            <span>Sliding Events</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/expending/event') ? 'active' : '' }}">
                        <a href="{{route('admin.event.expending')}}">
                            <i class="material-icons">help</i>
                            <span>Expire Pending Events</span>
                        </a>
                    </li>

                    </ul>

                    </li>
                    

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">menu</i>
                            <span>Options</span>
                        </a>
                    <ul class="ml-menu">

                    <li class="{{ Request::is('admin/category*') ? 'active' : '' }}">
                        <a href="{{route('admin.category.index')}}">
                            <i class="material-icons">apps</i>
                            <span>Categories</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/percentage*') ? 'active' : '' }}">
                        <a href="{{route('admin.percentage.index')}}">
                            <i class="material-icons">apps</i>
                            <span>Percentage</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/logo*') ? 'active' : '' }}">
                        <a href="{{route('admin.logo.index')}}">
                            <i class="material-icons">image</i>
                            <span>Logo</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/info*') ? 'active' : '' }}">
                        <a href="{{route('admin.info.index')}}">
                            <i class="material-icons">image</i>
                            <span>Info</span>
                        </a>
                    </li>

                    </ul>

                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">traffic</i>
                            <span>Users</span>
                        </a>
                    <ul class="ml-menu">
                    <li class="{{ Request::is('admin/subscriber') ? 'active' : '' }}">
                        <a href="{{route('admin.subscriber.index')}}">
                            <i class="material-icons">subscriptions</i>
                            <span>Subscribers</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/donor*') ? 'active' : '' }}">
                        <a href="{{route('admin.donor.index')}}">
                            <i class="material-icons">people_outline</i>
                            <span>Donors</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/raiser') ? 'active' : '' }}">
                        <a href="{{route('admin.raiser.index')}}">
                            <i class="material-icons">people</i>
                            <span>Raisers</span>
                        </a>
                    </li>
                    </ul>
                    </li>
                    <li class="{{ Request::is('admin/services*') ? 'active' : '' }}">
                        <a href="{{route('admin.services.index')}}">
                            <i class="material-icons">subject</i>
                            <span>Services</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/historyevent*') ? 'active' : '' }}">
                        <a href="{{route('admin.historyevent.index')}}">
                            <i class="material-icons">library_books</i>
                            <span>Histories</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/feedback*') ? 'active' : '' }}">
                        <a href="{{route('admin.feedback.index')}}">
                            <i class="material-icons">library_books</i>
                            <span>Feedbacks</span>
                        </a>
                    </li>

                     <li class="{{ Request::is('admin/profile/*') ? 'active' : '' }}">
                        <a href="{{route('admin.profile.index')}}">
                            <i class="material-icons">settings</i>
                            <span>Profile</span>
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