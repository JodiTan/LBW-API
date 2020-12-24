<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3">
	<h1> Movies Page</h1>
</div>

<div>
	<div>
		<h2 class="container mt-3">
			Now Playing
		</h2>
	</div>
		
	<!-- <div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active bg-dark">
				<div alt="First Slide" class="row justify-content-center">
					<div class="mx-2">
						<image src=<?php echo base_url('images/A_Beautiful_Mind.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/Black_Panther.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/Frozen_2.jpg') ?> style="width:150px; height:200px"/>
					</div>
				</div>
			</div>
			<div class="carousel-item container">
				<div alt="Second Slide" class="row justify-content-center bg-dark">
					<div class="mx-2">
						<image src=<?php echo base_url('images/Frozen_2.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/A_Beautiful_Mind.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/Black_Panther.jpg') ?> style="width:150px; height:200px"/>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div> -->
	<div class="row">
		<!-- People list -->
		<?php
		$movies = $nowPlaying["results"];
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