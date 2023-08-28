<x-frontend.layouts.master>
    <!-- Start Page Title -->
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <h2>Gallery</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="our-latest-projects ptb-80 pt-80">
        <div class="container">
            <div class="projects-items">
                @forelse ($gallaries as $galary)
                    <div class="col-lg-4 col-sm-6 design grid-item">
                        <div class="gallery">
                            @isset($galary->image)
                                @foreach ($galary->image as $photo)
                                    @if (file_exists(storage_path() . '/app/public/gallaries/' . $photo->image) && !is_null($photo->image))
                                        <a href="{{ asset('storage/gallaries/' . $photo->image) }}"><img
                                                src="{{ asset('storage/gallaries/' . $photo->image) }}" class="big"
                                                width="320" height="240" /></a>
                                    @else
                                        <a href=""><img src="{{ asset('default.png') }}" width="320"
                                                height="240" /></a>
                                    @endif
                                @endforeach
                            @endisset
                            <div class="content">
                            </div>
                            <a href="#" class="link-btn"></a>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
            {{-- <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <nav aria-label="Page navigation">
                        {{ $gallaries->links() }}
                    </nav>
                </div>
            </div> --}}
        </div>

    </div>

    @push('css')
        <link rel="stylesheet" href="{{ asset('ui/frontend-ui/assets') }}/css/simple-lightbox.css">
        <style>
            .clear {
                clear: both;
            }

            a {
                color: #009688;
                text-decoration: none;
            }

            a:hover {
                color: #01695f;
                text-decoration: none;
            }

            .gallery a img {
                /* float: left;
                    width: 25%;
                    height: auto;
                    border: 2px solid #fff; */
                -webkit-transition: -webkit-transform .15s ease;
                -moz-transition: -moz-transform .15s ease;
                -o-transition: -o-transform .15s ease;
                -ms-transition: -ms-transform .15s ease;
                transition: transform .15s ease;
                position: relative;
            }
        </style>
    @endpush
    @push('script')
        <script src="{{ asset('ui/frontend-ui/assets') }}/js/simple-lightbox.js"></script>
        <script type="text/javascript">
            (function() {
                var $gallery = new SimpleLightbox('.gallery a', {});
            })();
        </script>
    @endpush
</x-frontend.layouts.master>
