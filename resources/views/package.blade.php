@extends('layout.master')

@section('content')
<div id="fh5co-tours" class="fh5co-section-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
                <h3>Tourist Spots</h3>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
        </div>
        <div class="row">
            @foreach($packages as $pkg)
                <div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
                    <div href="#">
                        <img src="{{ asset($pkg->reservationPackage->image) }}" class="img-responsive">
                        <div class="desc">
                            <h3>{{ $pkg->reservationPackage->title }}</h3>
                            <h3>{{ $pkg->reservationPackage->country }}</h3>
                            <span class="price">${{ $pkg->reservationPackage->price }}</span>
                            <a class="btn btn-primary btn-outline" href="{{ route('singlePackage', ['id' => $pkg->id]) }}">Book Now <i class="icon-arrow-right22"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- {{ $packages->links() }} --}}
    </div>
</div>
@endsection

