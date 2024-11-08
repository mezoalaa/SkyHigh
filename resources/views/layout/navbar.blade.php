<div id="fh5co-wrapper">
    <div id="fh5co-page">
        <header id="fh5co-header-section" class="sticky-banner">
            <div class="container">
                <div class="nav-header">
                    <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
                    <h1 id="fh5co-logo"><a href="{{route('index')}}"><i class="icon-airplane"></i>SkyHigh</a></h1>
                    <!-- START #fh5co-menu-wrap -->
                    <nav id="fh5co-menu-wrap" role="navigation">
                        <ul class="sf-menu" id="fh5co-primary-menu">
                            <!-- Integrated Search Bar -->
                            <form action="{{ route('place.search') }}" method="GET">
                                <li class="main-search-input-wrap">
                                    <input type="text" name="search" placeholder="Search Places..." value="{{ request('search') }}" aria-label="Search Products">
                                    <button type="submit" class="main-search-button">Search</button>
                                </li>
                            </form>

                            <li class="active"><a href="{{route('index')}}">Home</a></li>
                            {{-- <li><a href="{{ route('package.index') }}">Packages</a></li> --}}
                            <li><a href="{{route('contact.create')}}">Contact us</a></li>

                            {{-- @if(auth()->user()) --}}
                            @if(auth()->check())
                                <li><a href="{{ route('signout') }}">Logout</a></li>
                                {{-- <li><a href="{{ route('signout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                             <form id="signout-form" action="{{ route('signout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form> --}}
                            @else
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>

                             @endif
                            {{-- @dd(auth()->user()) --}}


                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    </div>
</div>
{{-- @if(auth()->check())
<li><a href="{{route('login')}}">Login</a></li>
<li><a href="{{route('register')}}">Register</a></li>
@else
<li>
    <li><a href="{{route('login')}}">Logout</a></li>
</li>
@endif --}}
