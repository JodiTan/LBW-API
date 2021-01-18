<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row my-3">
		<!-- Title -->
		<h2> Search result for : <b> <?php echo $query; ?> </b> </h2>
	</div>

    <div class="row my-3">
        <!-- Search result list -->
        <ul class="list-group w-100">
            <?php
            $results = $searchResult["results"];
            foreach ($results as $result) {
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php if ($result["media_type"] == "movie") { ?>
                <div>
                    <a href="<?= base_url('/movies/details/' . $result["id"]) ?>"><?php echo $result["title"]; ?></a>
                    <br>
                    Movie
                </div>
                <div class="search-list-image">
                    <a href="<?= base_url('movies/details/' . $result["id"]) ?>">
                        <img src="<?php echo "https://image.tmdb.org/t/p/w500/" . $result["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" class="img-fluid" alt="quixote">
                    </a>
                </div>
            <?php
            } else if ($result["media_type"] == "tv") {
            ?> 
                <div>
                    <a href="<?= base_url('/tv/details/' . $result["id"]); ?>"><?php echo $result["name"]; ?></a>
                    <br>
                    TV Shows
                </div>
                <div class="search-list-image">
                    <a href="<?= base_url('/tv/details/' . $result["id"]); ?>">
                        <img src="<?php echo "https://image.tmdb.org/t/p/w500/" . $result["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" class="img-fluid" alt="quixote">
                    </a>
                </div>
            <?php
                } else if ($result["media_type"] == "person") {
            ?>
                <div>
                    <a href="<?= base_url("/people/details/" . $result["id"]); ?>"><?php echo $result["name"]; ?></a>
                    <br>
                    Person
                </div>
                <div class="search-list-image">
                    <a href="<?= base_url("/people/details/" . $result["id"]); ?>">
                        <img src="<?php echo "https://image.tmdb.org/t/p/w500/" . $result["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" class="img-fluid" alt="quixote">
                    </a>
                    </div>
            <?php
                }
            }
            ?>
            </li>
        </ul>
    </div>

    <div class="row my-3 justify-content-center">
		<!-- Pagination -->
		<?php $lastPage = $searchResult["total_pages"]; ?>

		<nav>
			<ul class="pagination">
				<li class="page-item <?php echo $page == 1 ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/search?query=' . $query); ?>"><i class="fa fa-angle-double-left"></i></a></li>
				<?php
				if ($page > 1) {
				?>
				<li class="page-item"><a class="page-link" href="<?= $page - 1 >= 1 ? base_url('/search/' . ($page - 1) . '?query=' . $query) : ""; ?>">
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
				<li class="page-item"><a class="page-link" href="<?= $page + 1 <= $lastPage ? base_url('/search/' . ($page + 1) . '?query=' . $query) : ""; ?>">
					<?php echo $page + 1 <= $lastPage ? $page + 1 : ""; ?>
				</a></li>
				<?php
				}
				?>
				<li class="page-item <?php echo $page == $lastPage ? "disabled" : ""; ?>"><a class="page-link" href="<?= base_url('/search/' . $lastPage . '?query=' . $query); ?>"><i class="fa fa-angle-double-right"></i></a></li>
			</ul>
		</nav>
	</div>
</div>
<?= $this->endSection("content"); ?>