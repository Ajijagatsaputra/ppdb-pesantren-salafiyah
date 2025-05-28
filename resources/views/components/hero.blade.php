        @if ($data)
            <section id="hero" class="hero section dark-background">

                <img src="{{ Storage::url($data->background_image) }}" alt="" data-aos="fade-in">

                <div class="container d-flex flex-column align-items-center">
                    <h2 data-aos="fade-up" data-aos-delay="100">{{ $data->title }}</h2>
                    @if ($data->subtitle)
                        <p data-aos="fade-up" data-aos-delay="200">{{ $data->subtitle }}</p>
                    @endif
                    @if ($data->description)
                        <p class="hero-description">{{ $data->description }}</p>
                    @endif
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        @if ($data->button_text && $data->button_link)
                            <a href="{{ $data->button_link }}" class="btn-get-started">{{ $data->button_text }}</a>
                        @endif
                        @if ($data->button_text && $data->button_link)
                            <a href="{{ $data->vidios }}" class="glightbox btn-watch-video d-flex align-items-center">
                                <i class="bi bi-play-circle"></i>{{ $data->button_text_vidio }}</a>
                        @endif
                    </div>
                </div>
            </section>
        @endif
