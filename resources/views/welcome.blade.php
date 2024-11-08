@extends('layout.master')

@section('content')





<div class="fh5co-hero">
    <div class="fh5co-overlay"></div>
    <div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/cover_bg_3.jpg);">
        <div class="desc">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <!-- <a href="index.html" id="main-logo">Travel</a> -->
                        <div class="tabulation animate-box">

                          <!-- Nav tabs -->
                           <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active">
                                  <a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Flights</a>
                              </li>

                              <li role="presentation">
                                   <a href="#packages" aria-controls="packages" role="tab" data-toggle="tab">Packages</a>
                              </li>
                           </ul>

                           <!-- Tab panes -->
                           <form action="{{ route('flights.search') }}" method="GET"> <!-- Adjust method and route as necessary -->
                            <div class="tab-content">
                             <div role="tabpanel" class="tab-pane active" id="flights">
                                <div class="row">
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="from-place">From:</label>
                                            <input type="text" class="form-control" id="from-place" name="from" placeholder="Los Angeles, USA"/>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="to-place">To:</label>
                                            <input type="text" class="form-control" id="to-place" name="to" placeholder="Tokyo, Japan"/>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt alternate">
                                        <div class="input-field">
                                            <label for="date-start">Check In:</label>
                                            <input type="text" class="form-control" id="date_start" name="date_start" placeholder="mm/dd/yyyy"/>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt alternate">
                                        <div class="input-field">
                                            <label for="date-end">Check Out:</label>
                                            <input type="text" class="form-control" id="date-end" name="date_end" placeholder="mm/dd/yyyy"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt">
                                        <section>
                                            <label for="class">Class:</label>
                                            <select class="cs-select cs-skin-border" name="class">
                                                <option value="" disabled selected>Economy</option>
                                                <option value="economy">Economy</option>
                                                <option value="first">First</option>
                                                <option value="business">Business</option>
                                            </select>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <section>
                                            <label for="adult">Adult:</label>
                                            <select class="cs-select cs-skin-border" name="adult">
                                                <option value="" disabled selected>1</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </section>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <section>
                                            <label for="children">Children:</label>
                                            <select class="cs-select cs-skin-border" name="children">
                                                <option value="" disabled selected>1</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </section>
                                    </div>
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block">Search Flight</button>
                                    </div>

                                </div>
                             </div>
                            </form>

                            <div role="tabpanel" class="tab-pane" id="packages">
                                <form action="{{ route('packages.searchByCountry') }}" method="GET">

                                <div class="row">
                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <div class="input-field">
                                            <label for="city">country:</label>
                                            <input type="text" class="form-control" id="country" name="country" placeholder="Los Angeles, USA"/>
                                        </div>
                                    </div>

                                    <div class="col-xxs-12 col-xs-6 mt alternate">
                                        <div class="input-field">
                                            <label for="depart-date">Departs:</label>
                                            <input type="text" class="form-control" id="depart-date" name="depart_date" placeholder="mm/dd/yyyy"/>
                                        </div>
                                    </div>
                                    <div class="col-xxs-12 col-xs-6 mt alternate">
                                        <div class="input-field">
                                            <label for="return-date">Return:</label>
                                            <input type="text" class="form-control" id="return-date" name="return_date" placeholder="mm/dd/yyyy"/>
                                        </div>
                                    </div>


                                    <div class="col-xxs-12 col-xs-6 mt">
                                        <section>
                                            <label for="children">Children:</label>
                                            <select class="cs-select cs-skin-border" id="children" name="children">
                                                <option value="" disabled selected>1</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </section>
                                    </div>
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-block">Search Packages</button>
                                    </div>
                                </div>
                             </div>
                            </div>

                        </div>
                    </div>
                    <div class="desc2 animate-box">
                        <div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
                            <h2>The World Between Your Hands</h2>
                            <h3>Always say yes to new adventures</h3>
                            <!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

		<div id="fh5co-tours" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Hot Tours</h3>

					</div>
				</div>
				<div class="row">
                    @foreach ($package as $package)
                    <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                        <div class="tour-package">
                            <img src="{{ $package->reservationPackage->image }}" alt="{{ $package->reservationPackage->title }}" class="img-responsive">
                            <div class="desc">
                                <h3>{{ $package->reservationPackage->title }}</h3>
                                <p>{{ $package->reservationPackage->description }}</p>
                                <p class="price">${{ $package->reservationPackage->price }}</p>
                                <a class="btn btn-primary btn-outline" href="{{ route('singlePackage', ['id' => $package->id]) }}">Book Now <i class="icon-arrow-right22"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

					<div class="col-md-12 text-center animate-box">
						<p><a class="btn btn-primary btn-outline btn-lg" href="{{route('package.index')}}">See All Offers <i class="icon-arrow-right22"></i></a></p>
					</div>
				</div>
			</div>
		</div>

		<div id="fh5co-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-hotairballoon"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Book Your Next Adventure</h3>
                                <p>Discover amazing places at exclusive deals with Booking.com. Start your adventure now!</p>
                                <p><a href="https://www.booking.com/index.en-gb.html?aid=2336990&label=ar-eg-booking-desktop-hzQ3PvSAQDRTlM4c2IcKhAS652735545271%3Apl%3Ata%3Ap1%3Ap2%3Aac%3Aap%3Aneg%3Afi%3Atikwd-17880772277%3Alp9073639%3Ali%3Adec%3Adm&ws=&gclid=CjwKCAjwl4yyBhAgEiwADSEjeP-bNf6Ib38i8UMTD0bNvQFGuJsp0_wJ5mAc6iVGOvfAZdZqoU2okBoCFcYQAvD_BwE&lang=en-gb&soz=1&lang_changed=1" class="btn btn-primary">Visit Booking.com</a></p>
                            </div>
                        </div>
                    </div>

                    <!-- Other columns remain unchanged or can be modified similarly if needed -->

                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-globe"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Explore New Destinations</h3>
                                <p>Find the best travel deals from Cairo to Jeddah on Kiwi.com. Book your perfect trip today!</p>
                                <p><a href="https://www.kiwi.com/en/?destination=jeddah-saudi-arabia&origin=cairo-egypt" class="btn btn-primary">Book Now</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 animate-box">
                        <div class="feature-left">
                            <span class="icon">
                                <i class="icon-wallet"></i>
                            </span>
                            <div class="feature-copy">
                                <h3>Plan Your Dream Honeymoon</h3>
                                <p>Explore top honeymoon destinations with TripAdvisor. Find the best deals, read real traveler reviews, and book your romantic getaway!</p>
                                <p><a href="https://www.tripadvisor.com/" class="btn btn-primary">Visit TripAdvisor</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>





		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Recent From Blog</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit est facilis maiores, perspiciatis accusamus asperiores sint consequuntur debitis.</p>
					</div>
				</div>
			</div>
            <div class="container">
                <h1>Newest Places</h1>
                <div class="row row-bottom-padded-md d-flex align-items-stretch">
                    @foreach($places as $place) <!-- Use $places here -->
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="fh5co-blog animate-box">
                                <a href="{{ route('place.detail', $place->id) }}">
                                    <img class="img-responsive" src="{{ asset(  $place->image) }}" alt="{{ $place->name }}">
                                </a>
                                <div class="blog-text">
                                    <div class="prod-title">
                                        <h3><a href="{{ route('place.detail', $place->id) }}">{{ $place->name }}</a></h3> <!-- Use the correct route here -->
                                        <p>{{ $place->description }}</p>
                                        <p><a href="{{ route('place.detail', $place->id) }}">Learn More...</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $places->links() }} <!-- For pagination links -->
            </div>


                    <div class="clearfix visible-md-block"></div>
                </div>

                <div class="col-md-12 text-center animate-box">
                    <p><a class="btn btn-primary btn-outline btn-lg" href="{{ route('flight') }}">See All Flights <i class="icon-arrow-right22"></i></a></p>
                </div>
            </div>

		</div>
		<!-- fh5co-blog-section -->
		<div id="fh5co-testimonial" style="background-image:url(images/img_bg_1.jpg);">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Happy Clients</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="" target="_blank"></a> <span class="subtext">Creative Director</span></p>
					</div>

				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, CEO <a href="" target="_blank"></a> <span class="subtext">Creative Director</span></p>
					</div>


				</div>
				<div class="col-md-4">
					<div class="box-testimony animate-box">
						<blockquote>
							<span class="quote"><span><i class="icon-quotes-right"></i></span></span>
							<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
						</blockquote>
						<p class="author">John Doe, Founder <a href="#"></a> <span class="subtext">Creative Director</span></p>
					</div>

				</div>
			</div>
		</div>
	</div>



    {{-- @include('layout.footer') --}}

@endsection
