<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div>
	<div class="container">
    	<div class="row my-3">
		<!-- Title -->
		<h1> Movie Recommendations </h1>
	</div>

	<div class="row">
		<?php
		$movies = $topRated["results"];
		$counter = 0;
		foreach ($movies as $movie) {
            $rating = $movie["vote_average"] * 10;
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
					<a href="<?= base_url("/movies/details/" . $movie["id"]); ?>"><img class="card-img-top custom-card-image" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $movie["title"] . " Poster"; ?>"></a>
					<div class="card-body d-flex flex-column">
						<p class="card-title d-flex"> <a href="<?= base_url("/movies/details/" . $movie["id"]); ?>"> <?php echo $movie["title"]; ?> </a> </p>
						<p class="card-subtitle mb-2 text-muted"> <?php echo isset($movie["release_date"]) ? substr($movie["release_date"], 0, 4) : "Upcoming"; ?> </p>
                        <div class="progress mt-auto" <?php echo ($rating > 90) ? 'data-toggle="tooltip" data-placement="top" title="It\'s highly rated!"' : '';?>>
							<div class="progress-bar <?php echo ($rating > 90) ? 'bg-danger' : '' ?>" role="progressbar" style="width: <?php echo $rating ?>%" aria-valuenow="<?php echo $rating; ?>;" aria-valuemin="0" aria-valuemax="100"><?php echo (int) $rating . "%"; ?></div>
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
		<?php $lastPage = $topRated["total_pages"]; ?>

		<nav>
			<ul class="pagination">
				<li class="page-item <?php echo $page == 1 ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/movies/recommendation/'); ?>"><i class="fa fa-angle-double-left"></i></a></li>
				<?php
				if ($page > 1) {
				?>
				<li class="page-item"><a class="page-link" href="<?= $page - 1 >= 1 ? base_url('/movies/recommendation/' . ($page - 1)) : ""; ?>">
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
				<li class="page-item"><a class="page-link" href="<?= $page + 1 <= $lastPage ? base_url('/movies/recommendation/' . ($page + 1)) : ""; ?>">
					<?php echo $page + 1 <= $lastPage ? $page + 1 : ""; ?>
				</a></li>
				<?php
				}
				?>
				<li class="page-item <?php echo $page == $lastPage ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/movies/recommendation/' . $lastPage); ?>"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</nav>
	</div>
</div>	
<?= $this->endSection('content'); ?>