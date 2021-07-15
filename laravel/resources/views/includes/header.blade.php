<header id="header">
    <div class="header-body">
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="#">
                                <img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="{{asset('public/img/logo.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row pt-3">
                        <nav class="header-nav-top">
                            <ul class="nav nav-pills">
                                <li class="nav-item d-none d-sm-block">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-angle-right"></i> About Us
                                    </a>
                                </li>
                                <li class="nav-item d-none d-sm-block">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-angle-right"></i> Contact Us
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <span class="ws-nowrap">
                                        <i class="fa fa-phone"></i> (123) 456-789
                                    </span>
                                </li>
                            </ul>
                        </nav>

                    </div>
                    <div class="header-row">
                        <div class="header-nav">
                            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">

                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        @if(Auth::check())
                                            @if(Auth::user()->role == 'admin')
                                                @include('includes.admin-nav')
                                            @else
                                                @include('includes.user-nav')
                                            @endif
                                        @else
                                            <li>
                                                <a class="nav-link" href="{{url('login')}}">Login</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="{{url('/')}}">Register</a>
                                            </li>
                                            <li>
                                                <a class="nav-link" href="http://new.naa.org.ng">Back to Main Site</a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                                
                            </div>
                            <ul class="header-social-icons social-icons d-none d-sm-block">
                                <li class="social-icons-facebook">
                                    <a href="#" ><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="social-icons-twitter">
                                    <a href="#"" target="_blank"S><i class="fa fa-twitter"></i></a>
                                </li>
                                <li class="social-icons-linkedin">
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>