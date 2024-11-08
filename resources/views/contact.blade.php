@extends('layout.master')

{{-- @section('title', 'Book Hotels') --}}

@section('content')





		<div id="fh5co-contact" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h3>Contact Us</h3>
						<p>let us help you if have any problem in our site please send us message to tell us what happend</p>
					</div>
				</div>
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
					<div class="row animate-box">
						<div class="col-md-6">
							<h3 class="section-title">Our Address</h3>
							<p>here is our mail and phone number to contact us</p>
							<ul class="contact-info">
								<li><i class="icon-location-pin"></i>Alexandria-Egypt</li>
								<li><i class="icon-phone2"></i>01555903363</li>
								<li><i class="icon-mail"></i><a href="https://www.facebook.com/mazen.alaa.7524">info@yoursite.com</a></li>
								<li><i class="icon-globe2"></i><a href="https://www.facebook.com/mazen.alaa.7524">www.yoursite.com</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
                                        <textarea class="form-control" cols="30" rows="7" placeholder="Message" name="message" required></textarea>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input type="submit" value="Send Message" class="btn btn-primary">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>




@endsection
