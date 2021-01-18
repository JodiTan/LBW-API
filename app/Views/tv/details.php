<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row mt-3 mb-2">
		<!-- Title -->
		<h1> <?php echo $information["name"]; ?> </h1>
    </div>
    <div class="row">
        <!-- Additional Info -->
        <h6>
            <?php
                echo $information['first_air_date'] . ' - ' . $information['last_air_date'];
                $temp_genre = "";
                for($i = 0; $i < count($information["genres"])-1; $i++){
                    $temp_genre = $temp_genre.$information["genres"][$i]["name"].", ";
                }
                $temp_genre = $temp_genre.$information["genres"][$i]["name"];
                echo " · ";
                echo $temp_genre;
            ?>
        </h6>
    </div>
    
    <div class="row my-2">
        <!-- Information -->
        <div class="col-md-2">
            <!-- Profile -->
            <img src="<?php echo 'https://image.tmdb.org/t/p/w500/' . $information['poster_path']; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" style="max-width: 100%;">
        </div>
        <div class="col">
            <!-- Overview -->
            <div class="row mb-1" style="text-align: justify;"><?php echo empty($information["overview"]) ? "No overview is provided." : $information["overview"]; ?></div>
            <!-- Place of birth -->
            <div class="row mb-1"><b>Number of seasons:&nbsp;</b><?php echo empty($information["number_of_seasons"]) ? "-" : $information["number_of_seasons"]; ?></div>
            <!-- Date of birth -->
            <div class="row mb-1"><b>Number of episodes:&nbsp;</b><?php echo empty($information["number_of_episodes"]) ? "-" : $information["number_of_episodes"] ; ?></div>
        </div>
    </div>

    <?php
    $castCredits = $credits["cast"];
    $crewCredits = $credits["crew"];
    if (count($castCredits) > 0) {
    ?>
    <div class="row my-4">
        <h3>Casts</h3>
        <!-- Casts -->
        <div id="castCreditCarousel" class="carousel slide row" data-interval="false">
            <div class="col">
                <a class="carousel-control-prev text-dark" href="#castCreditCarousel" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>

            <div class="col-11 carousel-inner">
                <div class="carousel-item active">
                    <div class="row mb-2">
                        <?php
                        $counter = 0;
                        foreach ($castCredits as $credit) {
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
                                    <a href="<?= base_url('/people/details/' . $credit["id"]) ?>">
                                        <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $credit["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $credit["name"] . " Profile"; ?>">
                                    </a>
                                    <div class="card-body">
                                    <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/people/details/' . $credit["id"]) ?>"> <?php echo $credit["name"]; ?> </a> </p>
                                    <p class="card-text d-flex text-truncate"> as <?php echo empty($credit["character"]) ? "-" : $credit["character"]; ?> </p>
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
                <a class="carousel-control-next text-dark" href="#castCreditCarousel" role="button" data-slide="next">
                    <span class="fa fa-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <?php
    }

    if (count($crewCredits) > 0) {
    ?>
    <div class="row my-4">
        <h3>Crews</h3>
        <!-- Crew -->
        <div id="crewCreditCarousel" class="carousel slide row" data-interval="false">
            <div class="col">
                <a class="carousel-control-prev text-dark" href="#crewCreditCarousel" role="button" data-slide="prev">
                    <span class="fa fa-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>

            <div class="col-11 carousel-inner">
                <div class="carousel-item active">
                    <div class="row mb-2">
                        <?php
                        $counter = 0;
                        foreach ($crewCredits as $credit) {
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
                                    <a href="<?= base_url('/people/details/' . $credit["id"]) ?>">
                                        <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $credit["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $credit["name"] . " Profile"; ?>">
                                    </a>
                                    <div class="card-body">
                                    <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/people/details/' . $credit["id"]) ?>"> <?php echo $credit["name"]; ?> </a> </p>
                                    <p class="card-text d-flex text-truncate"> <?php echo empty($credit["department"]) ? "-" : $credit["department"]; ?> </p>
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
                <a class="carousel-control-next text-dark" href="#crewCreditCarousel" role="button" data-slide="next">
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