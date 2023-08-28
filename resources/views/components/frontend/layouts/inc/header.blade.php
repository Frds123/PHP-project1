<header id="header" class="headroom bg-white">
    <div class="startp-responsive-nav">
        <div class="container">
            <div class="startp-responsive-menu">
                <div class="logo black-logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('ui/frontend-ui/assets') }}/img/nub-mobile.png" alt="logo">
                    </a>
                </div>
                <div class="logo white-logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('ui/frontend-ui/assets') }}/img/white-logo.png" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="startp-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('index') }}"><img
                        src="{{ asset('ui/frontend-ui/assets') }}/img/nub.png" alt="logo"></a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav nav ml-auto">
                        
                        <li class="nav-item"><a href="{{ route('index') }}"
                                class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                        <li class="nav-item"><a href="{{ route('frontend-committee') }} "
                                class="nav-link {{ Request::is('committee') ? 'active' : '' }}">Committee</a></li>
                        <li class="nav-item"><a href="{{ route('event.index') }}"
                                class="nav-link {{ Request::is('event') ? 'active' : '' }}">Our Events</a></li>
                        <li class="nav-item"><a href="{{ route('members.index') }}"
                                class="nav-link  {{ Request::is('members') ? 'active' : '' }}"> Member Profile <i
                                    data-feather="chevron-down"></i> </a>
                            <ul class="dropdown_menu">
                                @foreach ($facultries as $faculty)
                                    <li class="nav-item"><a href="{{ route('faculties.members', $faculty->id) }}"
                                            class="nav-link">{{ $faculty->title }}</a>
                                    </li>
                                @endforeach

                            </ul>

                        </li>
                        <li class="nav-item"><a href="{{ route('gallary.index') }}"
                                class="nav-link {{ Request::is('gallary') ? 'active' : '' }}">Gallery</a></li>
                        <!-- <li class="nav-item"><a href="register.html" class="nav-link">Online Registration</a></li>						 -->
                        <li class="nav-item"><a href="{{ route('contact.index') }}"
                                class="nav-link {{ Request::is('contact') ? 'active' : '' }}">Contact Us</a></li>
                        <div class="others-option">
                            @auth
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-primary">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Sign In</a>
                            @endauth
                            
                            <!-- <a href="#" class="btn btn-primary">Sign Up</a> -->
                        </div>
                    </ul>
                </div>

                {{-- <div class="others-option">

                    <!-- <a href="cart.html" class="cart-wrapper-btn"><i data-feather="search"></i></a> -->
                    <!-- <a href="cart.html" class="cart-wrapper-btn"><i data-feather="shopping-cart"></i><span>0</span></a> -->
                    @auth
                        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-primary">Dashboard</a>
                    @else
                        <a href="{{route('login')}}" class="btn btn-sm btn-primary">Sign In</a>
                    @endauth
                    <!-- <a href="#" class="btn btn-primary">Sign Up</a> -->
                </div> --}}
            </nav>
        </div>
    </div>
    {{--
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">
                    <div class="others-option">
                        <!-- <a href="cart.html" class="cart-wrapper-btn"><i data-feather="shopping-cart"></i><span>0</span></a> -->
                        <!-- <a href="contact.html" class="btn btn-light">Support</a> -->
                        @auth
                        <a href="{{ route('admin.index') }}" class="btn btn-sm btn-primary">Dashboard</a>
                        @else
                            <a href="{{route('login')}}" class="btn btn-sm btn-primary">Sign In</a>
                        @endauth
                        <!-- <a href="#" class="btn btn-primary">Sign Up</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</header>
