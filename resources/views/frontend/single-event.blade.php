<x-frontend.layouts.master>
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h2>Event Details</h2>
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

    <!-- Start Event Area -->
    <div class="blog-details-area ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-6">
                    <div class="blog-details-desc">
                        @if (@isset($events[0]->image))
                            <div class="article-image d-flex justify-content-center">
                                <img src="{{ asset('storage/events/' . $events[0]->image->image) }}" alt="image">
                            </div>
                        @else
                            <div class="article-image d-flex justify-content-center">
                                <img src="{{ asset('default.png') }}" />
                            </div>
                        @endif


                        <div class="article-content">
                            <div class="entry-meta">
                                <ul>
                                    <li><i data-feather="clock"></i> <a
                                            href="#">{{ $events[0]->event_start_date ?? '' }}</a></li>
                                    {{-- <li><i data-feather="user"></i> <a href="#">{{ $events->created_by ?? '' }}</a></li> --}}
                                </ul>
                            </div>

                            <h3>{{ $events[0]->title ?? '' }}</h3>

                            {!! Str::words($events[0]->description ?? '') !!}


                            {{-- <ul class="wp-block-gallery columns-3">
                                <li class="blocks-gallery-item">
                                    <figure>
                                        <img src="{{asset('ui/frontend-ui/assets')}}/img/blog-image/8.jpg" alt="image">
                                    </figure>
                                </li>

                                <li class="blocks-gallery-item">
                                    <figure>
                                        <img src="{{asset('ui/frontend-ui/assets')}}/img/blog-image/7.jpg" alt="image">
                                    </figure>
                                </li>

                                <li class="blocks-gallery-item">
                                    <figure>
                                        <img src="{{asset('ui/frontend-ui/assets')}}/img/blog-image/9.jpg" alt="image">
                                    </figure>
                                </li>
                            </ul> --}}

                            {{-- <h3>Four major elements that we offer:</h3> --}}

                            {{-- <ul class="features-list">
                                <li><i data-feather="check"></i> Scientific Skills For getting a better result</li>
                                <li><i data-feather="check"></i> Communication Skills to getting in touch</li>
                                <li><i data-feather="check"></i> A Career Overview opportunity Available</li>
                                <li><i data-feather="check"></i> A good Work Environment For work</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-frontend.layouts.master>
