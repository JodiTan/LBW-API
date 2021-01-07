<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<div class="row-my-3">
		<h1> Recommendation </h1>
	</div>
	<div class="row">
		<!-- Movie list -->
		<?php
		$movies = $recommendation["results"];
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

