<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row mt-3 mb-2">
		<!-- Title -->
		<h1> <?php echo $profile["name"]; ?> </h1>
    </div>
    
    <div class="row mb-2">
        <!-- Information -->
        <div class="col-md-2">
            <!-- Profile -->
            <img src="<?php echo 'https://image.tmdb.org/t/p/w500/' . $profile['profile_path']; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" style="max-width: 100%;">
        </div>
        <div class="col">
            <!-- Biography -->
            <div class="row mb-1" style="text-align: justify;"><?php echo empty($profile["biography"]) ? "No biography is provided." : $profile["biography"]; ?></div>
            <!-- Place of birth -->
            <div class="row mb-1"><b>Place of birth:&nbsp;</b><?php echo empty($profile["place_of_birth"]) ? "-" : $profile["place_of_birth"]; ?></div>
            <!-- Date of birth -->
            <div class="row mb-1"><b>Birthday:&nbsp;</b><?php echo empty($profile["birthday"]) ? "-" : $profile["birthday"] ; ?></div>
        </div>
    </div>

    <?php
    $movies = $movieCredits["cast"];
    if(count($movies) > 0) {
    ?>
    <div class="container mb-2">
        <h3>Movies Credits</h3>
        <!-- Movie credits -->
        <div id="movieCreditCarousel" class="carousel slide row" data-interval="false">
            <div class="col">
                <a class="carousel-control-prev text-dark" href="#movieCreditCarousel" role="button" data-slide="prev">
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
                            if ($counter < 6) {
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
                            <div class="col-sm">
                                <div class="card h-100">
                                    <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $movie["title"] . " Poster"; ?>">
                                    <div class="card-body">
                                        <p class="card-title d-flex"> <a href=""> <?php echo $movie["title"]; ?> </a> </p>
                                        <p class="card-subtitle mb-2 text-muted"> <?php echo isset($movie["release_date"]) ? substr($movie["release_date"], 0, 4) : "Upcoming"; ?> </p>
                                        <p class="card-text d-flex"> as <?php echo empty($movie["character"]) ? "-" : $movie["character"]; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        if ($counter > 0) {
                            while($counter < 6) {
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
                <a class="carousel-control-next text-dark" href="#movieCreditCarousel" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <?php
    $tvs = $tvCredits["cast"];
    if(count($tvs) > 0) {
    ?>
    <div class="row mb-2">
        <h3>TVs Credits</h3>
        <!-- TVs credits -->
        <div id="tvCreditCarousel" class="carousel slide row" data-interval="false">
            <div class="col">
                <a class="carousel-control-prev text-dark" href="#tvCreditCarousel" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>
            <div class="col-11 carousel-inner">
                <div class="carousel-item active">
                    <div class="row mb-2">
                        <?php
                        $counter = 0;
                        foreach ($tvs as $tv) {
                            if ($counter < 6) {
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
                            <div class="col-sm">
                                <div class="card h-100">
                                    <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $tv["poster_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $tv["name"] . " Poster"; ?>">
                                    <div class="card-body">
                                        <p class="card-title d-flex"> <a href=""> <?php echo $tv["name"]; ?> </a> </p>
                                        <p class="card-subtitle mb-2 text-muted"> <?php echo $tv["episode_count"] . (($tv["episode_count"] > 1) ? " episodes" : " episode"); ?> </p>
                                        <p class="card-text d-flex"> as <?php echo empty($tv["character"]) ? "-" : $tv["character"]; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }

                        if ($counter > 0) {
                            while($counter < 6) {
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
                <a class="carousel-control-next text-dark" href="#tvCreditCarousel" role="button" data-slide="next">
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
<?= $this->endSection("content"); ?>