@extends('layout.master')

{{-- @section('title', 'Book Hotels') --}}

@section('content')








		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Popular hotel &amp; hostel destinations</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
                @isset($singlePackage)

				<div class="row row-bottom-padded-md">
					<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
						<div href="#"><img src="{{ asset('' . $singlePackage->reservationPackage->image) }}" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
							<div class="desc">
								<span></span>
								<h2>{{$singlePackage->reservationPackage->title}}</h2>
								<span>3 nights</span>
                                <h3> {{ $singlePackage->reservationPackage->country }}</h3> <!-- Display the city and country -->
                                <p>{{ $singlePackage->description }}</p>

								<span class="price">${{ $singlePackage->reservationPackage->price }}<</span>
								<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
							</div>
						</div>
					</div>

                    @else
                    <p>Package details are not available.</p>
                    @endisset

				</div>
			</div>
		</div>
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">





@endsection
