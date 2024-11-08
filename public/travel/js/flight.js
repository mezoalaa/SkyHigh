function addFlight() {
    const flights = document.getElementById('flights');
    const newFlight = document.createElement('p');
    newFlight.textContent = 'New Flight Details Here';
    flights.appendChild(newFlight);
}

function addHotel() {
    const hotels = document.getElementById('hotels');
    const newHotel = document.createElement('p');
    newHotel.textContent = 'New Hotel Details Here';
    hotels.appendChild(newHotel);
}


let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let slides = document.querySelectorAll('.slide');
    let dots = document.querySelectorAll('.dot');

    if (n > slides.length) {
        slideIndex = 1;
    }

    if (n < 1) {
        slideIndex = slides.length;
    }

    slides.forEach(slide => slide.style.display = 'none');
    dots.forEach(dot => dot.className = dot.className.replace(' active', ''));

    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className += ' active';
}
