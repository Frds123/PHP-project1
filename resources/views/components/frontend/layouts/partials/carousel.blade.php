<div class="agency-portfolio-home-slides owl-carousel owl-theme">
    @foreach ($sliders as $slider)
    @foreach ($slider->image as $gallary)
            <div class="agency-portfolio-main-banner" style="background-image: url('{{ asset('storage/gallaries/' . $gallary->image) }}')">
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
@endforeach
</div>
