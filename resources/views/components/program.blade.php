<section id="services" class="services section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Program</h2>
        <p>Pendidikan<br></p>
    </div><!-- End Section Title -->

    <div class="container py-5" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center gy-4">
            @if ($data && $data->count())
                @foreach ($data as $program)
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-lg h-100">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ Storage::url($program->image) }}" 
                                         class="img-fluid rounded-start h-100 object-fit-cover" 
                                         alt="{{ $program->title }}">
                                </div>
                                <div class="col-md-7 d-flex flex-column justify-content-center p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        {{-- Jika ada icon simpan di data, kalau tidak pakai default icon --}}
                                        <i class="bi {{ $program->icon ?? 'bi-activity' }} text-primary fs-3 me-2"></i>
                                        <h4 class="mb-0">{{ $program->title }}</h4>
                                    </div>

                                    {{-- Kalau ada subtitle tampilkan sebagai paragraf --}}
                                    @if (!empty($program->subtitle))
                                        <p class="text-muted mb-0">{{ $program->subtitle }}</p>
                                    @elseif (!empty($program->description))
                                        <p class="text-muted mb-0">{{ $program->description }}</p>
                                    @else
                                        {{-- Kalau ada list items (misal untuk non formal), kamu bisa buat struktur data dan loop di sini --}}
                                    @endif

                                    {{-- Contoh jika ingin tampilkan list dari field JSON, sesuaikan dengan data kamu --}}
                                    @if (!empty($program->list_items) && is_array(json_decode($program->list_items, true)))
                                        <ul class="list-unstyled mb-0 mt-2">
                                            @foreach (json_decode($program->list_items) as $item)
                                                <li class="d-flex align-items-center mb-2">
                                                    <i class="bi bi-check-circle text-primary me-2 fs-5"></i>
                                                    <span>{{ $item }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">Belum ada program yang tersedia.</p>
            @endif
        </div>
    </div>
</section>
