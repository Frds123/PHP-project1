<x-frontend.layouts.master>
    <!-- Start Main Banner Area -->
    <x-carousel />
    <!-- End Main Banner Area -->
    {{-- Notice-area --}}

    <!-- Start What We Do Area -->
    <div class="what-we-do-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                        <div class="d-flex col-md-3 mt-2 flex-row flex-grow-1 flex-fill justify-content-center bg-info py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;Important Notice:</span></div>
                        <marquee class="news-scroll mt-2" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"> @foreach ($notice as $item)
                            <span>{{$item->title}}</span><span class="text-danger"> &nbsp;&nbsp; &#x2605 &#x2605 &#x2605 &nbsp;&nbsp;</span>
                        @endforeach </a> <span class="dot"></span>  </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="what-we-do-area ptb-70">
        <div class="container">
            <div class="section-title">
                <h2>What We Do</h2>
                <div class="bar"></div>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.</p> --}}
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-what-we-do-box">
                        <div class="icon">
                            <i class="flaticon-monitor"></i>
                        </div>
                        <h3><a href="#">Alumni
                                Registration</a></h3>
                        {{-- <p>Lorem ipsum dolor sit consectetur, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <a href="{{route('register')}}"
                            class="read-more-btn"><i
                                data-feather="arrow-right"></i>Sign Up</a> --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                    <div class="single-what-we-do-box">
                        <div class="icon">
                            <i class="flaticon-idea"></i>
                        </div>
                        <h3><a href="#">Reunion</a></h3>
                        {{-- <p>Lorem ipsum dolor sit consectetur, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <a href="{{route('register')}}"
                            class="read-more-btn"><i
                                data-feather="arrow-right"></i>Sign Up</a> --}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0
                    offset-md-3 offset-sm-3">
                    <div class="single-what-we-do-box">
                        <div class="icon">
                            <i class="flaticon-software"></i>
                        </div>
                        <h3><a href="#">Welfare Fund</a></h3>
                        {{-- <p>Lorem ipsum dolor sit consectetur, consectetur
                            adipiscing elit, sed do eiusmod tempor
                            incididunt.</p>
                        <a href="{{route('register')}}"
                            class="read-more-btn"><i
                                data-feather="arrow-right"></i>Sign Up</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-frontend.layouts.partials.doing-area /> --}}
    <!-- End What We Do Area -->


    <!-- Start Engaging Area -->
    <x-frontend.layouts.partials.engaging />
    <!-- End Engaging Area -->

    <!-- Start Member Profile Area -->
    <x-member-profile />
    <!-- End Member Profile Area -->

    <!-- Start Services Area -->
    {{-- <x-frontend.layouts.partials.service/> --}}
    <!-- End Services Area -->

    <!-- Start Committee Area -->
    {{-- <x-frontend.layouts.partials.committee/> --}}
    <!-- End Committee Area -->
    <!-- Start Committee Resulation Area -->
    <div class="industries-serve-area ptb-80">
        <div class="container">
            <div class="section-title">
                <h2>Committee Resulation</h2>
                <div class="bar"></div>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                      sed do eiusmod tempor incididunt ut labore et dolore
                      magna aliqua.</p> --}}
            </div>

            <div class="row">
                @foreach ($committees as $committee)
                    <div class="col-lg-4 col-6 col-sm-6 col-md-4">
                        <div class="single-industries-serve-box">
                            <div class="icon">
                                <i class='bx bx-group'></i>
                            </div>
                            {{ $committee->committee_name }}
                            <a href="{{ route('frontend-committee-details', $committee->id) }}" class="link-btn"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="analytics-shape2">
            {{-- <iframe src="{{ asset('storage/committee/'.$committee->image )}}" type="application/pdf" width="100%" height="600px"> --}}
            <img src="{{ asset('ui/frontend-ui/assets') }}/img/bigdata-analytics/vector.png" alt="image">
        </div>
    </div>
    {{-- <x-frontend.layouts.partials.committee-resulation/> --}}
    <!-- End Committee Resulation Area -->


    <!-- Start Alumni and Friends Enggement Area -->
    {{-- <x-frontend.layouts.partials.friend-enggement/> --}}
    <!-- End Alumni and Friends Enggement Area -->

    <!-- Start Feedback Area -->
    {{-- <x-frontend.layouts.partials.feedback/> --}}
    <!-- End Feedback Area -->

    <!-- Start Events Area -->
    <x-event />
    <!-- End Events Area -->

    <!-- Start Newsletter Area -->

    <!-- End Newsletter Area -->
</x-frontend.layouts.master>
