<section id="team" class="team section light-background">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>PENGURUS</h2>
        <p>PENGASUH</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-5">
            @if ($data && $data->count())
                @foreach ($data as $member)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic">
                                <img src="{{ Storage::url($member->photo) }}" class="img-fluid" alt={{ $member->name }}>
                            </div>
                            <div class="member-info">
                                <h4>{{ $member->name }}</h4>
                                <span>{{ $member->position }}</span>

                                @if (!empty($member->social_media) && is_array($member->social_media))
                                    <div class="mt-3 d-flex flex-wrap gap-2">
                                        @foreach ($member->social_media as $social)
                                            <a href="{{ $social['url'] }}" class="btn btn-primary btn-sm"
                                                target="_blank" rel="noopener">
                                                <i class="bi bi-{{ strtolower($social['platform']) }}"></i>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div><!-- End Team Member -->
                @endforeach
            @else
                <p class="text-center">Belum ada pengurus yang tersedia.</p>
            @endif
        </div>

    </div>

</section><!-- /Team Section -->
