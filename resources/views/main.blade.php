{{-- @extends('layout')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        @include('components.hero')
        <!-- About Section -->
        @include('components.about')
        <!-- Stats Section -->
        @include('components.stats')
        <!-- Program Section -->
        @include('components.program')
        <!-- Clients Section -->
        @include('components.clients')
        <!-- Visi & Misi Section -->
        @include('components.visi-misi')
        <!-- Program & Keunggulan Section -->
        @include('components.keunggulan')
        <!-- Testimonials Section -->
        @include('components.testimonials')
        <!-- Ekstrakulikuler Section -->
        @include('components.ekstrakulikuler')
        <!-- Team Section -->
        @include('components.team')
        <!-- Contact Section -->
        @include('components.contact')
    </main>
@endsection --}}

@extends('layout')

@section('content')
    <main class="main">
        <!-- Hero Section -->
        @include('components.hero', ['data' => $content['hero']])
        
        <!-- About Section -->
        @include('components.about', ['data' => $content['about']])
        
        <!-- Stats Section -->
        @include('components.stats', ['data' => $content['stats']])
        
        <!-- Program Section -->
        @include('components.program', ['data' => $content['programs']])
        
        <!-- Clients Section -->
        @include('components.clients', ['data' => $content['clients']])
        
        <!-- Visi & Misi Section -->
        @include('components.visi-misi', ['data' => $content['visi_misi']])
        {{-- @include('components.debug-visi-misi', ['data' => $content['visi_misi']]) --}}
        
        <!-- Program & Keunggulan Section -->
        @include('components.keunggulan', ['data' => $content['keunggulan']])
        
        <!-- Testimonials Section -->
        @include('components.testimonials', ['data' => $content['testimonials']])
        
        <!-- Ekstrakulikuler Section -->
        @include('components.ekstrakulikuler', ['data' => $content['ekstrakulikuler']])
        
        <!-- Team Section -->
        @include('components.team', ['data' => $content['team']])
        
        <!-- Contact Section -->
        @include('components.contact', ['data' => $content['contact']])
    </main>
@endsection