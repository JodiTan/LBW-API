<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
  <div class="row-my-3">
    <br>
	  <h1>Welcome to MovieLBW !</h1>
  </div>

  <div class="row-my-3">
	  <p>Upcoming Event</p>
  </div>

  <div class="row">
      <!-- Movie list -->
      <?php
      $movies = $home["results"];
      $counter = 0;
      foreach ($movies as $movie) {
        $popularityRatio = ($movie["popularity"])/$maximumPopularity * 100;
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
          <a href="<?= base_url("/movies/details/" . $movie["id"]); ?>">
						<img class="card-img-top custom-card-image" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $movie["title"] . " Title"; ?>">
					</a>
            <div class="card-body  d-flex flex-column">
              <p class="card-title d-flex"> <a href="<?= base_url("/movies/details/" . $movie["id"]); ?>"> <?php echo $movie["title"]; ?> </a> </p>
              <p class="card-subtitle mb-2 text-muted"> <?php echo isset($movie["release_date"]) ? substr($movie["release_date"], 0, 4) : "Upcoming"; ?> </p>
              <div class="progress mt-auto" <?php echo ($popularityRatio > 70) ? 'data-toggle="tooltip" data-placement="top" title="It\'s getting popular right now!"' : '';?>>
							  <div class="progress-bar font-weight-bold <?php echo ($popularityRatio > 70) ? 'bg-danger' : '' ?>" role="progressbar" style="width: <?php echo $popularityRatio ?>%" aria-valuenow="<?php echo $popularityRatio; ?>;" aria-valuemin="0" aria-valuemax="100"><?php echo (int) $popularityRatio . "%"; ?></div>
						</div>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
</div>
<?= $this->endSection('content'); ?>