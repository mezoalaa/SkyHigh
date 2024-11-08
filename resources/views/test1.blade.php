<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Top Vacation Destinations</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
  .carousel-item img {
    height: 400px; /* Adjust based on your preference */
    object-fit: cover;
  }
  .carousel-caption {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
  }
</style>
</head>
<body>

<div id="vacationCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#vacationCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#vacationCarousel" data-slide-to="1"></li>
    <li data-target="#vacationCarousel" data-slide-to="2"></li>
    <li data-target="#vacationCarousel" data-slide-to="3"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="yellowstone.jpg" alt="Yellowstone National Park, WY">
      <div class="carousel-caption">
        <h3>Yellowstone National Park, WY</h3>
      </div>
    </div>
    <div class="carousel-item">
      <img src="punta_cana.jpg" alt="Punta Cana, Dominican Republic">
      <div class="carousel-caption">
        <h3>Punta Cana, Dominican Republic</h3>
      </div>
    </div>
    <div class="carousel-item">
      <img src="orlando.jpg" alt="Orlando, FL">
      <div class="carousel-caption">
        <h3>Orlando, FL</h3>
      </div>
    </div>
    <div class="carousel-item">
      <img src="sedona.jpg" alt="Sedona, AZ">
      <div class="carousel-caption">
        <h3>Sedona, AZ</h3>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#vacationCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#vacationCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
