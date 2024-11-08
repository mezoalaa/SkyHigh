@extends(layout.master)

@section('content')


            <!--  Start slider -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide"><img src="assests/istockphoto-155439315-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-471231941-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-529405258-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-534056300-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-1345893732-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-172124867-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-1213285262-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-176810586-2048x2048.jpg" alt="plane "></div>
              <div class="swiper-slide"><img src="assests/istockphoto-1182528617-2048x2048.jpg" alt="plane "></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>

    <!--  Start Home Section  -->
    <section class="home" id="home">
        <h4 class="text-center">Find your dream flight!</h4>
        <!--  start Search Input  -->
        <div class="searchBox">
            <div class="searchBar">
                <input  type="text" placeholder="Search Your Flight" autocomplete="off">
                <button>
                    <i style="color: #ffffff; font-size: 25px; cursor: pointer;" class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
        <!--  Start Flight  Cards  -->
        <div class=" flights  container mx-auto mt-5">
          <div class="flightCards">
             <div class="w-100 upper-card d-flex justify-content-between align-items-center ">
              <div class="l-upper d-flex justify-content-around align-items-center">
                    <img style="width: 100px; height: 100px;" src="assests/EgyptAir-Logo.wine.png" alt="">
                    <div>
                      <span style="color:black;" >Cairo</span>
                      <br>
                      <span  style="color:var(--texted-color);" >Line 790</span>
                    </div>

              </div>
              <div class="m-upper">
                <div class="dropdown">
                  <button class="btn  dropdown-toggle" style="border: 1px solid var(--texted-color);" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Arrival Airport
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Emirates</a></li>
                    <li><a class="dropdown-item" href="#">Turkey</a></li>
                    <li><a class="dropdown-item" href="#">Germany</a></li>
                  </ul>
                </div>
              </div>
                <div class="r-upper px-3">
                  <button type="button" class="btn btn-outline-primary px-5">Submit</button>
                </div>

             </div>

             <div class="w-100 lower-card d-flex justify-content-between align-items-center">
              <div class="dropdown l-lower">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  More flights
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
              <div class="r-lower d-flex justify-content-around align-items-center">
                <button type="button" class="btn">Business class</button>
                <button type="button" class="btn">adult</button>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Flight Details
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>
              </div>
             </div>
          </div>
          <div class="flightCards">
             <div class="w-100 upper-card d-flex justify-content-between align-items-center ">
              <div class="l-upper d-flex justify-content-around align-items-center">
                    <img style="width: 100px; height: 100px;" src="assests/pngegg.png" alt="">
                    <div>
                      <span style="color:black;" >Cairo</span>
                      <br>
                      <span  style="color:var(--texted-color);" >Line 790</span>
                    </div>

              </div>
              <div class="m-upper">
                <div class="dropdown">
                  <button class="btn  dropdown-toggle" style="border: 1px solid var(--texted-color);" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Arrival Airport
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Emirates</a></li>
                    <li><a class="dropdown-item" href="#">Turkey</a></li>
                    <li><a class="dropdown-item" href="#">Germany</a></li>
                  </ul>
                </div>
              </div>
                <div class="r-upper px-3">
                  <button type="button" class="btn btn-outline-primary px-5">Submit</button>
                </div>

             </div>

             <div class="w-100 lower-card d-flex justify-content-between align-items-center">
              <div class="dropdown l-lower">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  More flights
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
              <div class="r-lower d-flex justify-content-around align-items-center">
                <button type="button" class="btn">Business class</button>
                <button type="button" class="btn">adult</button>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Flight Details
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>
              </div>
             </div>
          </div>
          <div class="flightCards">
             <div class="w-100 upper-card d-flex justify-content-between align-items-center ">
              <div class="l-upper d-flex justify-content-around align-items-center">
                    <img style="width: 100px; height: 100px;" src="assests/pngegg (1).png" alt="">
                    <div>
                      <span style="color:black;" >Cairo</span>
                      <br>
                      <span  style="color:var(--texted-color);" >Line 790</span>
                    </div>

              </div>
              <div class="m-upper">
                <div class="dropdown">
                  <button class="btn  dropdown-toggle" style="border: 1px solid var(--texted-color);" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Arrival Airport
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Emirates</a></li>
                    <li><a class="dropdown-item" href="#">Turkey</a></li>
                    <li><a class="dropdown-item" href="#">Germany</a></li>
                  </ul>
                </div>
              </div>
                <div class="r-upper px-3">
                  <button type="button" class="btn btn-outline-primary px-5">Submit</button>
                </div>

             </div>

             <div class="w-100 lower-card d-flex justify-content-between align-items-center">
              <div class="dropdown l-lower">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  More flights
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
              <div class="r-lower d-flex justify-content-around align-items-center">
                <button type="button" class="btn">Business class</button>
                <button type="button" class="btn">adult</button>
                <div class="dropdown">
                  <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Flight Details
                  </button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </div>
              </div>
             </div>
          </div>
        </div>
        <!-- The end of flight cards code and u can double it as u want mazen -->
    </section>
    <!-- Footer -->
    <footer>




    </footer>


@endsection
