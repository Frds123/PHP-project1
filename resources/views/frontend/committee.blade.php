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

    <!-- End Committee Area -->
    <!-- Start Committee Resulation Area -->
    <div class="industries-serve-area ptb-80">
        <div class="container">
            {{-- <div class="section-title">
                <h2>Committee Resulation</h2>
                <div class="bar"></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.</p>
            </div> --}}

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

        <div class="analytics-shape2"><img src="{{ asset('ui/frontend-ui/assets') }}/img/bigdata-analytics/vector.png"
                alt="image"></div>
    </div>
    {{-- <x-frontend.layouts.partials.committee-resulation/> --}}
    <!-- End Committee Resulation Area -->
</x-frontend.layouts.master>
