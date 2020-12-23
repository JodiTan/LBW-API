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
            <img src="<?php echo 'https://image.tmdb.org/t/p/w500/' . $profile['profile_path']; ?>" style="max-width: 100%;">
        </div>
        <div class="col">
            <!-- Biography -->
            <div class="row mb-1" style="text-align: justify;"><?php echo $profile["biography"]; ?></div>
            <!-- Place of birth -->
            <div class="row mb-1"><b>Place of birth:&nbsp;</b><?php echo $profile["place_of_birth"]; ?></div>
            <!-- Date of birth -->
            <div class="row mb-1"><b>Birthday:&nbsp;</b><?php echo $profile["birthday"]; ?></div>
        </div>
    </div>

    <div class="container mb-2">
        <h3>Acting</h3>
        <!-- Movie credits -->
        <div id="movieCreditCarousel" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row mb-2">
                        <?php
                        $movies = $movieCredits["cast"];
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
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $movie["poster_path"]; ?>" alt="<?php echo $movie["title"] . " Poster"; ?>">
                                    <div class="card-body">
                                        <p class="card-title d-flex h-50"> <a href=""> <?php echo $movie["title"]; ?> </a> </p>
                                        <p class="card-subtitle mb-2 text-muted"> <?php echo isset($movie["release_date"]) ? substr($movie["release_date"], 0, 4) : "Upcoming"; ?> </p>
                                        <p class="card-text d-flex"> as <?php echo $movie["character"]; ?> </p>
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
        </div>

        <div class="row mb-2">
            <div class="col-12">
                <a class="carousel-control-prev text-dark" href="#movieCreditCarousel" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next text-dark" href="#movieCreditCarousel" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <!-- TV credits -->
    </div>
</div>
<?= $this->endSection("content"); ?>