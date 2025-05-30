<section id="services-2" class="services-2 section" style="background-color: #f8f9f8;">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2 style="color: #e92907;">Program & Keunggulan</h2>
        <p style="color: #e92907;">Pesantren Salafiyah Kauman Pemalang</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach($data as $index => $item)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                    <div class="service-item d-flex position-relative h-100">
                        <!-- Gambar atau Icon -->
                        @if($item->icon)
                            <img src="{{ Storage::url($item->icon) }}" alt="{{ $item->title }}" class="flex-shrink-0 me-3" style="width: 2rem; height: 2rem;">
                        @else
                            <i class="bi bi-star icon flex-shrink-0" style="color: #e92907; font-size: 2rem;"></i>
                        @endif

                        <div>
                            <h4 class="title">{{ $item->title }}</h4>
                            <p class="description">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section><!-- /Program & Keunggulan Section -->
