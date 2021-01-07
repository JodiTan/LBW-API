<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<h1>Home</h1>

  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block" src="public/images/iklan1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block" src="public/images/iklan2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block" src="public/images/iklan3.jpg" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div> -->

  <div class="row">
      <!-- Movie list -->
      <?php
      $movies = $home["results"];
      $counter = 0;
      foreach ($movies as $movie) {
        if ($counter < 5) {
          $counter++;
        } else {
          $counter = 1;
          ?>
          </div>
          <div class="row">
          <?php
        }
        ?>
        <div class="col m-2">
          <div class="card h-100">
            <img class="card-img-top custom-card-image" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $movie["title"] . " Title"; ?>">
            <div class="card-body">
              <p class="card-title d-flex"> <a href="<?= base_url("/profile/" . $movie["id"]); ?>"> <?php echo $movie["title"]; ?> </a> </p>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
</div>
<?= $this->endSection('content'); ?>