<section id="visi-misi" class="features section">
    <div class="container">
        @php
            // Handle data structure
            if (isset($data->visi) && isset($data->misi)) {
                // Format: object with separate visi/misi properties
                $visi = $data->visi;
                $misi = $data->misi;
            } else {
                // Format: collection or array
                $items = is_iterable($data) ? collect($data) : collect([$data]);
                $visi = $items->where('type', 'visi')->first();
                $misi = $items->where('type', 'misi')->first();
            }
        @endphp

        {{-- Tab Navigation --}}
        <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
            @if($visi)
                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-visi">
                        <i class="bi bi-globe"></i>
                        <h4 class="d-none d-lg-block">Visi</h4>
                    </a>
                </li>
            @endif
            @if($misi)
                <li class="nav-item col-3">
                    <a class="nav-link {{ !$visi ? 'active show' : '' }}" data-bs-toggle="tab" data-bs-target="#features-tab-misi">
                        <i class="bi bi-list-check"></i>
                        <h4 class="d-none d-lg-block">Misi</h4>
                    </a>
                </li>
            @endif
        </ul>

        {{-- Tab Content --}}
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            {{-- Visi Tab --}}
            @if($visi)
                <div class="tab-pane fade active show" id="features-tab-visi">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $visi->title }}</h3>
                            
                            @if(!empty($visi->points))
                                <ul class="points-list">
                                    @foreach($visi->points as $point)
                                        <li>
                                            <i class="bi bi-check2-all"></i>
                                            <span>{{ is_array($point) ? ($point['text'] ?? $point) : $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="alert alert-info">Tidak ada poin visi tersedia</div>
                            @endif
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ Storage::url($visi->image) }}"
                                 alt="Visi"
                                 class="img-fluid w-100" 
                                 style="max-height: 600px; object-fit:cover;">
                        </div>
                    </div>
                </div>
            @endif

            {{-- Misi Tab --}}
            @if($misi)
                <div class="tab-pane fade {{ !$visi ? 'active show' : '' }}" id="features-tab-misi">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                            <h3>{{ $misi->title }}</h3>
                            
                            @if(!empty($misi->points))
                                <ul class="points-list">
                                    @foreach($misi->points as $point)
                                        <li>
                                            <i class="bi bi-check2-all"></i>
                                            <span>{{ is_array($point) ? ($point['text'] ?? $point) : $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="alert alert-info">Tidak ada poin misi tersedia</div>
                            @endif
                        </div>
                        <div class="col-lg-6 order-1 order-lg-2 text-center">
                            <img src="{{ Storage::url($misi->image) }}"
                                 alt="Misi"
                                 class="img-fluid w-100" 
                                 style="max-height: 600px; object-fit:cover;">
                        </div>
                    </div>
                </div>
            @endif
        </div>

        {{-- Empty State --}}
        @if(!$visi && !$misi)
            <div class="alert alert-warning text-center">
                <h4>Data Visi dan Misi Belum Tersedia</h4>
                <p>Silakan hubungi administrator untuk mengisi data visi dan misi</p>
            </div>
        @endif
    </div>
</section>