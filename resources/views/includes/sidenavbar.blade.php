<!-- Side Navbar -->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img src="{{ asset('storage/img/avatar-1.jpg') }}" alt="person" class="img-fluid rounded-circle">
                <h2 class="h5">Welcome</h2><span>{{ Auth::user()->firstname }}</span>
            </div>
            <!-- Small Brand information, appears on minimized sidebar-->
            <div class="sidenav-header-logo"><strong class="text-primary brand-small text-center">{{ config('app.name') }}</strong></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
            <h5 class="sidenav-heading">Main</h5>
            <ul id="side-main-menu" class="side-menu list-unstyled">
                <li><a href="#userdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-user"></i>User </a>
                    <ul id="userdropdownDropdown" class="collapse list-unstyled ">
                        <li>
                            <a href="/user"><i class="icon-list"></i>User List
                                @if(isset($userCount))
                                    <div class="badge badge-info"> {{ $userCount }} </div>
                                @endif
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="#serverdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-website"></i>Server </a>
                    <ul id="serverdropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="/server"><i class="icon-list"></i>Server List
                                @if(isset($serverCount))
                                    <div class="badge badge-info"> {{ $serverCount }} </div>
                                @endif
                            </a>
                        </li>
                    </ul>
                </li>
                {{--<li><a href="index.html"> <i class="icon-home"></i>Home                             </a></li>
                <li><a href="forms.html"> <i class="icon-form"></i>Forms                             </a></li>
                <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
                <li><a href="tables.html"> <i class="icon-grid"></i>Tables                             </a></li>
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
                    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                    </ul>
                </li>
                <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page                             </a></li>
                <li> <a href="#"> <i class="icon-mail"></i>Demo
                        <div class="badge badge-warning">6 New</div></a>
                </li>--}}
            </ul>
        </div>
        <div class="admin-menu">
            <h5 class="sidenav-heading">Second menu</h5>
            <ul id="side-admin-menu" class="side-menu list-unstyled">
                <li> <a href="#"> <i class="fa fa-bar-chart"> </i>Statistics</a></li>
                <li> <a href="#"> <i class="icon-form"> </i>Settings</a></li>
                {{--<li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
                <li> <a href="#"> <i class="icon-flask"> </i>Demo
                        <div class="badge badge-info">Special</div></a></li>
                <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
                <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>--}}
            </ul>
        </div>
    </div>
</nav>