<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
	<div class="row mb-2">
		<!-- Title -->
		<h1> Who's Popular? </h1>
	</div>	

	<div class="row mb-3 justify-content-center">
		<!-- People list -->
		<?php
		$peoples = $popularPeoples["results"];
		$counter = 0;
		foreach ($peoples as $people) {
			if ($counter < 5) {
				$counter++;
			} else {
				$counter = 1;
				?>
				</div>
				<div class="row mb-3">
				<?php
			}
			?>
			<div class="col">
				<div class="card m-2">
					<img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $people["profile_path"] ?>" alt="<?php echo $people["name"] . " Profile" ?>">
					<div class="card-body">
						<p class="card-title d-flex h-50"> <a href=""> <?php echo $people["name"] ?> </a> </p>
						<p class="card-text"> <i class="fa fa-fire" style="color:red;"></i> <?php echo $people["popularity"] ?> </p>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<div class="row mb-2 justify-content-center">
		<!-- Pagination -->
		<?php $lastPage = $popularPeoples["total_pages"]; ?>

		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item <?php echo $page == 1 ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/peoples/') ?>">First</a></li>
				<li class="page-item"><a class="page-link" href="<?= $page - 1 >= 1 ? base_url('/peoples/' . ($page - 1)) : ""; ?>">
					<?php echo $page - 1 >= 1 ? $page - 1 : ""; ?>
				</a></li>
				<li class="page-item active"><a class="page-link">
					<?php echo $page ?>
				</a></li>
				<li class="page-item"><a class="page-link" href="<?= $page + 1 <= $lastPage ? base_url('/peoples/' . ($page + 1)) : ""; ?>">
					<?php echo $page + 1 <= $lastPage ? $page + 1 : ""; ?>
				</a></li>
				<li class="page-item <?php echo $page == $lastPage ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/peoples/' . $lastPage) ?>">Last</a></li>
			</ul>
		</nav>
	</div>
</div>
<?= $this->endSection("content"); ?>