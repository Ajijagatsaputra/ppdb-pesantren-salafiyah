<section id="testimonials" class="testimonials section dark-background">

    <img src="{{ asset('frontend/assets/img/testimonials-bg.jpg') }}" class="testimonials-bg" alt="">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    }
                }
            </script>

            <div class="swiper-wrapper">
                @if ($data && $data->count())
                    @foreach ($data as $item)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ Storage::url($item->avatar) }}"
                                     class="testimonial-img" alt="{{ $item->name }}">
                                <h3>{{ $item->name }}</h3>
                                <h4>{{ $item->role }}</h4>
                                <div class="stars">
                                    @for ($i = 0; $i < ($item->stars ?? 5); $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $item->content }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach
                @else
                    <div class="swiper-slide">
                        <div class="testimonial-item text-center">
                            <p class="text-light">Belum ada testimoni.</p>
                        </div>
                    </div>
                @endif
            </div>

            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
