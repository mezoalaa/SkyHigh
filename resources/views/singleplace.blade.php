@extends('layout.master')

@section('title', 'Search Places')

@section('content')
<div class="place-container">
    <div class="row">
        <div class="col-12">
            <h1>{{ $data->name }}</h1>
            @forelse($data->images ?? [] as $index =>  $image)
                    <div class="place-slider">
                        <!-- Slider Main -->
                        <div class="slides">
                                @php
                                    $imageUrl = Str::startsWith($image->url, ['http://', 'https://']) ? $image->url : asset('storage/'.$image->url);
                                @endphp
                                <div class="slide-image">
                                    <img src="{{ $imageUrl }}" alt="Image of {{ $data->name }}">
                                </div>
                        </div>

                        <!-- Navigation -->
                        <div class="slider-navigation">
                            <a class="slider-prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="slider-next" onclick="plusSlides(1)">&#10095;</a>
                        </div>

                        <!-- Dots -->
                        <div class="slider-dots">


                                <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
                        </div>

                        <!-- Text Description -->
                        <p>{{ $data->description }}</p>

                    </div>

            @empty
                <p>No places found matching your search.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
