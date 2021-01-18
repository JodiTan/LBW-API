<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
	<div class="row my-3">
		<!-- Title -->
		<h1> Who's Popular? </h1>
	</div>

	<div class="row">
		<!-- People list -->
		<?php
		$peoples = $popularPeoples["results"];
		$counter = 0;
		foreach ($peoples as $people) {
			$popularityRatio = ($people["popularity"])/$maximumPopularity * 100;
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
					<a href="<?= base_url("/people/details/" . $people["id"]); ?>"><img class="card-img-top custom-card-image" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $people["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $people["name"] . " Profile"; ?>"></a>
					<div class="card-body d-flex flex-column">
						<p class="card-title d-flex"> <a href="<?= base_url("/people/details/" . $people["id"]); ?>"> <?php echo $people["name"]; ?> </a> </p>
						<div class="progress mt-auto" <?php echo ($popularityRatio > 70) ? 'data-toggle="tooltip" data-placement="top" title="It\'s getting popular right now!"' : '';?> >
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
		<?php $lastPage = $popularPeoples["total_pages"]; ?>

		<nav>
			<ul class="pagination">
				<li class="page-item <?php echo $page == 1 ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/people/popular/'); ?>"><i class="fa fa-angle-double-left"></i></a></li>
				<?php
				if ($page > 1) {
				?>
				<li class="page-item"><a class="page-link" href="<?= $page - 1 >= 1 ? base_url('/people/popular/' . ($page - 1)) : ""; ?>">
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
				<li class="page-item"><a class="page-link" href="<?= $page + 1 <= $lastPage ? base_url('/people/popular/' . ($page + 1)) : ""; ?>">
					<?php echo $page + 1 <= $lastPage ? $page + 1 : ""; ?>
				</a></li>
				<?php
				}
				?>
				<li class="page-item <?php echo $page == $lastPage ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/people/popular/' . $lastPage); ?>"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</nav>
	</div>
</div>
<?= $this->endSection("content"); ?>