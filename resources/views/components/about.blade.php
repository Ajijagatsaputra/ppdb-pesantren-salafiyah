<section id="about" class="about section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $data->title ?? 'Tentang Kami' }}</h3>
                <img src="{{ Storage::url($data->image) }}"
                    class="img-fluid rounded-4 mb-4 w-100" style="max-width: 800px" alt="about">

                @if($data && $data->description)
                    {!! $data->description !!}
                @else
                <p>tidak ada deskripsi</p>
                @endif
            </div>

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <h4 class="mb-4">Fasilitas</h4>

                    @if($data && $data->facilities && count($data->facilities) > 0)
                        <ul>
                            @foreach($data->facilities as $facility)
                                <li><i class="bi bi-check-circle-fill"></i> <span>{{ $facility }}</span></li>
                            @endforeach
                        </ul>
                    @else
                      <p>tidak ada fasilitaas</p>
                    @endif

                    <div class="position-relative mt-4">
                        <img src="{{ Storage::url($data->thumbnail) }}"
                            class="img-fluid rounded-4" alt="Pondok Pesantren Salafiyah">

                        @if($data && $data->video_link)
                            <a href="{{ $data->video_link }}" class="glightbox pulsating-play-btn"></a>
                        @else
                            <a href="https://youtu.be/mza4qE7QHaI?si=CnyKBiLXN-2tXIQy" class="glightbox pulsating-play-btn"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
