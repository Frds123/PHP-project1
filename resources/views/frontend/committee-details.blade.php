<x-frontend.layouts.master>
    <!-- Start Committee Area -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h2>Committee</h2>
                </div>
            </div>
        </div>

        <div class="shape1"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape1.png" alt="shape"></div>
        <div class="shape2 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape"></div>
        <div class="shape3"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape3.svg" alt="shape"></div>
        <div class="shape4"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
        <div class="shape5"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape5.png" alt="shape"></div>
        <div class="shape6 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape">
        </div>
        <div class="shape7"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
        <div class="shape8 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape">
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Committee Area -->
    {{-- <div id="committee" class="team-area repair-team-area ptb-80 bg-f9f6f6">
        <div class="container">
            <div class="section-title">
                <!-- <h2>Committee</h2> -->
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team">
                        <div class="team-image">
                            <img src="{{ asset('ui/frontend-ui/assets')}}/img/member/MUNMUN-SAHA.jpg" alt="image" width="200" height="130">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Munmun Saha</h3>
                                <span>Senior Officer</span>
                            </div>
                            <p>
                                Blood Group: O+<br>
                                Email: jusarker11@gmail.com<br>
                                Mobile No: 01716928063
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team">
                        <div class="team-image">
                            <img src="{{ asset('ui/frontend-ui/assets')}}/img/member/MUNMUN-SAHA.jpg" alt="image" width="200" height="130">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Munmun Saha</h3>
                                <span>Senior Officer</span>
                            </div>
                            <p>
                                Blood Group: O+<br>
                                Email: jusarker11@gmail.com<br>
                                Mobile No: 01716928063
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team">
                        <div class="team-image">
                            <img src="{{ asset('ui/frontend-ui/assets')}}/img/member/MUNMUN-SAHA.jpg" alt="image" width="200" height="130">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Munmun Saha</h3>
                                <span>Senior Officer</span>
                            </div>
                            <p>
                                Blood Group: O+<br>
                                Email: jusarker11@gmail.com<br>
                                Mobile No: 01716928063
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-team">
                        <div class="team-image">
                            <img src="{{ asset('ui/frontend-ui/assets')}}/img/member/MUNMUN-SAHA.jpg" alt="image" width="200" height="130">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Munmun Saha</h3>
                                <span>Senior Officer</span>
                            </div>
                            <p>
                                Blood Group: O+<br>
                                Email: jusarker11@gmail.com<br>
                                Mobile No: 01716928063
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- End Committee Area -->
    <!-- Start Committee Resulation Area -->
    <div class="services-details-area ptb-80">
        <div class="container">
            <div class="section-title">
                <h2>{{ $committee->committee_name }}</h2>
                <div class="bar"></div>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.</p> --}}
            </div>

            <div class="row align-items-center">
                <div class="col-lg-12 services-details-image">
                    <embed src="{{ asset('storage/committee/' . $committee->image->image) }}" type="application/pdf"
                        width="100%" height="1080px">

                </div>
            </div>
        </div>

        <div class="analytics-shape2"><img src="{{ asset('ui/frontend-ui/assets') }}/img/bigdata-analytics/vector.png"
                alt="image"></div>
    </div>
    {{-- <x-frontend.layouts.partials.committee-resulation/> --}}
    <!-- End Committee Resulation Area -->
</x-frontend.layouts.master>
