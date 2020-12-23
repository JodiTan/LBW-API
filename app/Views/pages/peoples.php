<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
	<div class="row">
		<!-- Title -->
		<h1> Who's Popular? </h1>
	</div>	

	<div class="row">
		<!-- People list -->
		<?php
		$result_list = $popular_peoples["results"];
		foreach ($result_list as $people) {
			?>
			<div class="card m-2" style="width: 10%;">
				<img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $people["profile_path"] ?>" alt="<?php echo $people["name"] . "Profile" ?>">
				<div class="card-body">
					<p class="card-title d-flex h-50"> <a href=""> <?php echo $people["name"] ?> </a> </p>
					<p class="card-text"> <i class="fa fa-fire" style="color:red;"></i> <?php echo $people["popularity"] ?> </p>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<div>
		<!-- Pagination -->
	</div>
</div>
<?= $this->endSection("content"); ?>