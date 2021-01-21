<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row-my-4">
    <br>
	  <h1>Welcome to MovieLBW !</h1>
  </div>

  <!-- Now playing -->
  <div class="row-my-3">
	  <h3>Get the most newly created movie.</h3>
  </div>
  <div class="row mb-4">
    <?php
    $nowPlaying = $nowPlaying['results'];
    $counter = 0;
    foreach($nowPlaying as $movie) {
      if ($counter < 5) {
    ?>
    <div class="col-sm">
      <div class="card h-100">
          <a href="<?= base_url('/movies/details/' . $movie["id"]); ?>">
              <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $movie["title"]; ?>">
          </a>
          <div class="card-body">
              <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/movies/details/' . $movie["id"]); ?>"> <?php echo $movie["title"]; ?> </a> </p>
          </div>
      </div>
    </div>
    <?php
      }
    $counter = $counter + 1;
    }
    ?>
    <div class="col-sm">
      <div class="card card-navigation h-100">
        <div class="card-body align-items-center d-flex justify-content-center">
          <a href="<?= base_url('/movies/nowPlaying/'); ?>">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <h4>See more</h4>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- On air -->
  <div class="row-my-3">
	  <h3>Get the airing TV show.</h3>
  </div>
  <div class="row mb-4">
    <?php
    $onAir = $onAir['results'];
    $counter = 0;
    foreach($onAir as $tv) {
      if ($counter < 5) {
    ?>
    <div class="col-sm">
      <div class="card h-100">
          <a href="<?= base_url('/tv/details/' . $tv["id"]); ?>">
              <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $tv["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $tv["name"]; ?>">
          </a>
          <div class="card-body">
              <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/movies/details/' . $tv["id"]); ?>"> <?php echo $tv["name"]; ?> </a> </p>
          </div>
      </div>
    </div>
    <?php
      }
    $counter = $counter + 1;
    }
    ?>
    <div class="col-sm">
      <div class="card card-navigation h-100">
        <div class="card-body align-items-center d-flex justify-content-center">
          <a href="<?= base_url('/tv/onAir/'); ?>">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <h4>See more</h4>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Popular people -->
  <div class="row-my-3">
    <h3>Get the most popular celebrities.</h3>
  </div>
  <div class="row mb-4">
    <?php
    $popularPeople = $popular['results'];
    $counter = 0;
    foreach($popularPeople as $people) {
      if ($counter < 5) {
    ?>
    <div class="col-sm">
      <div class="card h-100">
          <a href="<?= base_url('/people/details/' . $people["id"]); ?>">
              <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $people["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $people["name"]; ?>">
          </a>
          <div class="card-body">
              <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/people/details/' . $people["id"]); ?>"> <?php echo $people["name"]; ?> </a> </p>
          </div>
      </div>
    </div>
    <?php
      }
    $counter = $counter + 1;
    }
    ?>
    <div class="col-sm">
      <div class="card card-navigation h-100">
        <div class="card-body align-items-center d-flex justify-content-center">
          <a href="<?= base_url('/people/popular/'); ?>">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <h4>See more</h4>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection('content'); ?>