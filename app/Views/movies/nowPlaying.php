<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div>
		

	<!-- Movies list -->
	<?php
	$movies = $nowPlaying["results"];
	if(count($movies) > 0) {
		?>
		<div class="container mb-2">
			<h1>Now Playing</h1>
			<div id="moviesCarousel" class="carousel slide row" data-interval="false">
				<div class="col">
					<a class="carousel-control-prev text-dark" href="#moviesCarousel" role="button" data-slide="prev">
						<span class="fa fa-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
				</div>
	
				<div class="col-11 carousel-inner">
					<div class="carousel-item active">
						<div class="row mb-2">
							<?php
							$counter = 0;
							foreach ($movies as $movie) {
								if ($counter < 2) {
									$counter++;
								} else {
									$counter = 1;
									?>
										</div>
									</div>
									<div class="carousel-item">
										<div class="row mb-2">
									<?php
								}
								?>
								<div class="col-sm ">
									
										<div class="card">
											<div class="card-body">
												<a href=" <?= base_url("/movie/" . $movie["id"]) ?> "> 
													<h3 class="card-title d-flex text-dark"><?php echo $movie["title"]; ?></h3>
												</a>

												<i class="fa fa-fire" style="color:red;"></i> <?php echo $movie["popularity"]; ?>
											</div>

											<a href=" <?= base_url("/movie/" . $movie["id"]) ?> "> 
												<img class="card-img" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $movie["title"] . " Poster"; ?>">
											</a>
										</div>
									
								</div>
								<?php
							}
	
							if ($counter > 0) {
								while($counter < 2) {
									$counter++;
									?>
									<div class="col-sm">&nbsp;</div>
									<?php
								}
							}
							?>
						</div>
					</div>
				</div>
	
				<div class="col">
					<a class="carousel-control-next text-dark" href="#moviesCarousel" role="button" data-slide="next">
						<span class="fa fa-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<?php
		}
		?>
</div>	
<?= $this->endSection('content'); ?>