<div id="blog" class="blog-area ptb-80">
    <div class="container">
        <div class="section-title">
            <h2>Our Events</h2>
            <div class="bar"></div>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.</p> --}}
        </div>

        <div class="row">
            @foreach ($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog-post">
                        <div class="blog-image">
                            <a href="{{ route('single-event.show', $event->id) }}">
                                @if (@isset($event->image))
                                    <img src="{{ asset('storage/events/' . $event->image->image) }}" width="356"
                                        height="240">
                                @else
                                    <img src="{{ asset('default.png') }}" width="356" height="240" />
                                @endif
                            </a>
                            <div class="date">
                                <i data-feather="calendar"></i> {{ $event->event_start_date ?? '' }}
                            </div>
                        </div>

                        <div class="blog-post-content">
                            <h3><a href="{{ route('single-event.show', $event->id) }}">{{ $event->title ?? '' }}</a></h3>

                            <span>by <a href="blog-1.html">admin</a></span>

                            <p>
                                {!! Str::words( $event->description ?? '', 10, ' ...') !!}
                            </p>

                            <a href="{{ route('single-event.show', $event->id) }}" class="read-more-btn">Read More <i
                                    data-feather="arrow-right"></i> </a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 col-md-6 d-flex
                justify-content-center">
                <a href="{{ route('event.index') }}" class="btn btn-primary">Discover
                    More</a>
            </div>
        </div>
    </div>
    <div class="shape1"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape1.png" alt="shape"></div>
    <div class="shape2 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape"></div>
    <div class="shape3"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape3.svg" alt="shape"></div>
    <div class="shape4"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
    <div class="shape6 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
    <div class="shape7"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape4.svg" alt="shape"></div>
    <div class="shape8 rotateme"><img src="{{ asset('ui/frontend-ui/assets') }}/img/shape2.svg" alt="shape"></div>
</div>
