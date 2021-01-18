<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
	<div class="container">
    	<div class="row my-3">
		<!-- Title -->
		<h1> What's On Air? </h1>
	</div>

	<div class="row">
		<!-- TV list -->
		<?php
		$tvs = $onAir["results"];
		$counter = 0;
		foreach ($tvs as $tv) {
			$popularityRatio = ($tv["popularity"])/$maximumPopularity * 100;
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
					<a href="<?= base_url("/tv/details/" . $tv["id"]); ?>"><img class="card-img-top custom-card-image" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $tv["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $tv["name"] . " Poster"; ?>"></a>
					<div class="card-body">
						<p class="card-title d-flex"> <a href="<?= base_url("/tv/details/" . $tv["id"]); ?>"> <?php echo $tv["name"]; ?> </a> </p>
                        <p class="card-subtitle mb-2 text-muted"> <?php echo isset($tv["first_air_date"]) ? substr($tv["first_air_date"], 0, 4) : "Upcoming"; ?> </p>
						<div class="progress">
							<div class="progress-bar <?php echo ($popularityRatio > 70) ? 'bg-danger' : '' ?>" role="progressbar" style="width: <?php echo $popularityRatio ?>%" aria-valuenow="<?php echo $popularityRatio; ?>;" aria-valuemin="0" aria-valuemax="100"><?php echo (int) $popularityRatio . "%"; ?></div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<div class="row my-3 justify-content-center">
		<!-- Pagination -->
		<?php $lastPage = $onAir["total_pages"]; ?>

		<nav>
			<ul class="pagination">
				<li class="page-item <?php echo $page == 1 ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/tv/onAir/'); ?>"><i class="fa fa-angle-double-left"></i></a></li>
				<?php
				if ($page > 1) {
				?>
				<li class="page-item"><a class="page-link" href="<?= $page - 1 >= 1 ? base_url('/tv/onAir/' . ($page - 1)) : ""; ?>">
					<?php echo $page - 1 >= 1 ? $page - 1 : ""; ?>
				</a></li>
				<?php
				}
				?>

				<li class="page-item active"><a class="page-link">
					<?php echo $page; ?>
				</a></li>

				<?php
				if ($page < $lastPage) {
				?>
				<li class="page-item"><a class="page-link" href="<?= $page + 1 <= $lastPage ? base_url('/tv/onAir/' . ($page + 1)) : ""; ?>">
					<?php echo $page + 1 <= $lastPage ? $page + 1 : ""; ?>
				</a></li>
				<?php
				}
				?>
				<li class="page-item <?php echo $page == $lastPage ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/tv/onAir/' . $lastPage); ?>"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</nav>
	</div>
</div>
<?= $this->endSection("content"); ?>