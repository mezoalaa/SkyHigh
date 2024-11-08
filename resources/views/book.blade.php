{{-- @extends('layout.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Package Booking</title>
<style>



</head>
<body>
<h2>AD</h2>
    <div class="ad-container">
        <div class="image-section">
          <!-- The image is set in the CSS background property -->
        </div>
        <div class="content-section">
          <div>
            <h2>International Hotels</h2>
            <p>Enjoy up to 20% off on International Hotels</p>
            <p>Make the most of this deal on your first booking with trvl.</p>
          </div>
          <button>Book Now</button>
        </div>
      </div>


      <div class="search-bar">
        <span class="icon">🔍</span> <!-- Placeholder for search icon -->
        <input type="text" placeholder="Search destinations, hotels">
        <span class="icon">📅</span> <!-- Placeholder for calendar icon -->
        <input type="date">
        <span class="icon">📅</span> <!-- Placeholder for calendar icon -->
        <input type="date">
        <span class="icon">👤</span> <!-- Placeholder for user icon -->
        <select>
            <option>1 room, 2 adults</option>
            <option>2 rooms, 4 adults</option>
        </select>
        <button>Search</button>
    </div>



    <div class="card">
      <article class="card-group-item">
        <header class="card-header">
          <h6 class="title">Range input </h6>
        </header>
        <div class="filter-content">
          <div class="card-body">
          <div class="form-row">
          <div class="form-group col-md-6">
            <label>Min</label>
            <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
          </div>
          <div class="form-group col-md-6 text-right">
            <label>Max</label>
            <input type="number" class="form-control" placeholder="$1,0000">
          </div>
          </div>
          </div> <!-- card-body.// -->
        </div>
      </article> <!-- card-group-item.// -->
      <article class="card-group-item">
        <header class="card-header">
          <h6 class="title">Selection </h6>
        </header>
        <div class="filter-content">
          <div class="card-body">
            <div class="custom-control custom-checkbox">
              <span class="float-right badge badge-light round">52</span>
                <input type="checkbox" class="custom-control-input" id="Check1">
                <label class="custom-control-label" for="Check1">Samsung</label>
            </div> <!-- form-check.// -->

            <div class="custom-control custom-checkbox">
              <span class="float-right badge badge-light round">132</span>
                <input type="checkbox" class="custom-control-input" id="Check2">
               <label class="custom-control-label" for="Check2">Black berry</label>
            </div> <!-- form-check.// -->

            <div class="custom-control custom-checkbox">
              <span class="float-right badge badge-light round">17</span>
                <input type="checkbox" class="custom-control-input" id="Check3">
                <label class="custom-control-label" for="Check3">Samsung</label>
            </div> <!-- form-check.// -->

            <div class="custom-control custom-checkbox">
              <span class="float-right badge badge-light round">7</span>
                <input type="checkbox" class="custom-control-input" id="Check4">
                <label class="custom-control-label" for="Check4">Other Brand</label>
            </div> <!-- form-check.// -->
          </div> <!-- card-body.// -->
        </div>
      </article> <!-- card-group-item.// -->
    </div> <!-- card.// -->

  <div class="flight-results">
      <div class="flight-card">
          <div class="flight-header">
              <span class="flight-company">Wizz Air</span>
              <span class="flight-price">EGP 1,469</span>
          </div>
          <div class="flight-details">
              <span class="flight-time">08:10 - 09:00</span>
              <span class="flight-duration">0h 50m</span>
              <span class="flight-stops">Direct</span>
          </div>
      </div>

      <!-- Add more flight-cards here -->
  </div>


<script>
  document.querySelectorAll('.book-button').forEach(button => {
    button.addEventListener('click', function() {
      alert('Booking now...');
      // Here, you would add the logic to handle the booking.
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const priceSlider = document.getElementById('price');
    const priceOutput = document.getElementById('price-output');

    priceSlider.addEventListener('input', function() {
        priceOutput.value = `EGP ${this.value}`;
    });
});

</script>

</body>
</html>



@endsection --}}
