<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row my-3">
        <ul class="list-group">
            <?php
            $results = $searchResult["results"];
            foreach ($results as $result) {
            ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php if ($result["media_type"] == "movie") { ?>
                <?php echo $result["title"]; ?>
                <div class="search-list-image">
                    <img src="<?php echo "https://image.tmdb.org/t/p/w500/" . $result["poster_path"]; ?>" class="img-fluid" alt="quixote">
                </div>
            <?php
            } else if ($result["media_type"] == "tv") {
            ?>
                <?php echo $result["name"]; ?>
                <div class="search-list-image">
                    <img src="<?php echo "https://image.tmdb.org/t/p/w500/" . $result["poster_path"]; ?>" class="img-fluid" alt="quixote">
                </div>
            <?php
                } else if ($result["media_type"] == "person") {
            ?>
                <?php echo $result["name"]; ?>
                <div class="search-list-image">
                    <img src="<?php echo "https://image.tmdb.org/t/p/w500/" . $result["profile_path"]; ?>" class="img-fluid" alt="quixote">
                </div>
            <?php
                }
            }
            ?>
            </li>
        </ul>
    </div>
</div>
<?= $this->endSection("content"); ?>