<!--=================================
header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ url('/student/dashboard') }}"><img
                src="{{ URL::asset('assets/images/logo-dark.png') }}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('/student/dashboard') }}"><img
                src="{{ URL::asset('assets/images/logo-icon-dark.png') }}"
                alt=""></a>


    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
               href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>

    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">


        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>


        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('assets/images/user_icon.png') }}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <!-- add name and email -->

                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>

                            <span>{{ Auth::user()->email}}</span>

                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>

                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                @if(auth('web')->check())
                    <form method="GET" action="{{ route('logout') }}">

                                        @else
                                            <form method="GET" action="{{ route('logout') }}">
                                                @endif

                                                @csrf
                                                <a class="dropdown-item" href="#"
                                                   onclick="event.preventDefault();this.closest('form').submit();"><i
                                                        class="bx bx-log-out"></i>logout</a>
                                            </form>


            </div>
        </li>
    </ul>
</nav>

<!--=================================
header End-->
