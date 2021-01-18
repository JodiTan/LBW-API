<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row mt-3 mb-2">
        <!-- Title -->
		<h1> <?php echo $details['title'];  ?> </h1>
    </div>
    <div class="row">
        <!-- Additional Info -->
        <h6>
            <?php
                echo $details['release_date'];
                echo " · ";
                $temp_minute = $details['runtime']%60;
                $temp_hour = ($details['runtime']-$temp_minute)/60;
                if($temp_hour > 0){
                    echo $temp_hour."h ".$temp_minute."m";
                }
                else {
                    echo "$temp_minute minutes";
                }
                $temp_genre = "";
                for($i = 0; $i < count($details["genres"])-1; $i++){
                    $temp_genre = $temp_genre.$details["genres"][$i]["name"].", ";
                }
                $temp_genre = $temp_genre.$details["genres"][$i]["name"];
                echo " · ";
                echo $temp_genre;
            ?>
        </h6>
    </div>
        
    <div class="row my-2">
        <!-- Information -->
        <div class="col-md-2">
            <!-- Poster -->
            <img src="<?php echo 'https://image.tmdb.org/t/p/w500/' . $details['poster_path']; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" style="max-width: 100%;">
        </div>
        <div class="col">
            <!-- Overview -->
            <div class="row mb-1" style="text-align: justify;"><?php echo  $details["overview"]?></div>
        </div>
    </div>

    <?php
    if (count($credits["cast"]) > 0) {
    ?>
        <!-- Cast -->
        <div class="my-4">
            <h3>Casts</h3>
            <div id="castCarousel" class="carousel slide row" data-interval="false">
                <div class="col">
                    <a class="carousel-control-prev text-dark" href="#castCarousel" role="button" data-slide="prev">
                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>

                <div class="col-11 carousel-inner">
                    <div class="carousel-item active">
                        <div class="row mb-2">
                            <?php
                            $counter = 0;
                            foreach ($credits["cast"] as $cast) {
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
                                        <a href="<?= base_url('/people/details/' . $cast["id"]); ?>">
                                            <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $cast["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $cast["name"]; ?>">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/people/details/' . $cast["id"]); ?>"> <?php echo $cast["name"]; ?> </a> </p>
                                            <p class="card-text d-flex text-truncate"> as <?php echo empty($cast["character"]) ? "-" : $cast["character"]; ?> </p>
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
                    <a class="carousel-control-next text-dark" href="#castCarousel" role="button" data-slide="next">
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
    if (count($credits["crew"]) > 0) {
    ?>
        <!-- Crew -->
        <div class="my-1">
            <h3>Crews</h3>
            <div id="crewCarousel" class="carousel slide row" data-interval="false">
                <div class="col">
                    <a class="carousel-control-prev text-dark" href="#crewCarousel" role="button" data-slide="prev">
                        <span class="fa fa-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </div>

                <div class="col-11 carousel-inner">
                    <div class="carousel-item active">
                        <div class="row mb-2">
                            <?php
                            $counter = 0;
                            foreach ($credits["crew"] as $crew) {
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
                                        <a href="<?= base_url('/people/details/' . $crew["id"]); ?>">
                                            <img class="card-img-top" src="<?php echo "https://image.tmdb.org/t/p/w500/" . $crew["profile_path"]; ?>" onerror="this.onerror=null;this.src='<?= base_url('images/not-available.png') ?>'" alt="<?php echo $crew["name"]; ?>">
                                        </a>
                                        <div class="card-body">
                                            <p class="card-title d-flex text-truncate"> <a href="<?= base_url('/people/details/' . $crew["id"]); ?>"> <?php echo $crew["name"]; ?> </a> </p>
                                            <p class="card-text d-flex text-truncate"><?php echo empty($crew["department"]) ? "-" : $crew["department"]; ?> </p>
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
                    <a class="carousel-control-next text-dark" href="#crewCarousel" role="button" data-slide="next">
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