
@php
use Illuminate\Support\Str;
@endphp

@extends('layout.master')

@section('title', 'Search ')

@section('content')
<div class="slideshow-container">
<div class="row row-bottom-padded-md">
    <div class="col-12">
        <h1>Search Results</h1>
        @forelse ($data as $item)
            <div class="slider-wrapper">
                <div class="slider">
                    @foreach ($item->images as $image)
                        @php
                            $imageUrl = Str::startsWith($image->url, ['http://', 'https://']) ? $image->url : asset('storage/'.$image->url);
                        @endphp
                        <div class="slide full-width-container">
                            <img class="img-responsivee" src="{{ $imageUrl }}" alt="Image of {{ $item->name }}" role="none">
                        </div>
                    @endforeach
                </div>

                <br>

                <div class="slider-nav">
                    @foreach ($item->images as $index => $image)
                        <span class="dot" onclick="currentSlide({{ $index + 1 }})"></span>
                    @endforeach
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <div class="blog-text">
                    <h3><a href="#">{{ $item->name }}</a></h3>
                    <p>{{ $item->description }}</p>
                </div>
            </div>
        @empty
            <p>No places found matching your search.</p>
        @endforelse
    </div>
</div>
</div>
@endsection










{{-- @extends('layout.master')

@section('title', 'Place Details')

@section('content')
<div class="container">
    <h1>Place Details</h1>
    <div class="row">
        <div class="col-12">
            @if ($data)
                <div class="slider-wrapper">
                    <div class="slider">
                        @foreach ($data->images as $image)
                            @php
                                $imageUrl = Str::startsWith($image->url, ['http://', 'https://']) ? $image->url : asset('storage/'.$image->url);
                            @endphp
                            <div class="slide">
                                <img class="img-responsive" src="{{ $imageUrl }}" alt="Image of {{ $data->name }}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="blog-text">
                    <h3>{{ $data->name }}</h3>
                    <p>{{ $data->description }}</p>
                </div>
            @else
                <p>No details available for this place.</p>
            @endif
        </div>
    </div>
</div>
@endsection --}}
