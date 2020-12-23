<?= $this->extend("layout/template"); ?>

<?= $this->section("content"); ?>
<div class="container">
    <div class="row mt-3 mb-2">
		<!-- Title -->
		<h1> <?php echo $profile["name"]; ?> </h1>
    </div>
    
    <div class="row mb-2">
        <!-- Information -->
        <div class="col-md-2"><img src="<?php echo 'https://image.tmdb.org/t/p/w500/' . $profile['profile_path'] ?>" style="max-width: 100%;"></div>
        <div class="col">
            <!-- Biography -->
            <div class="row mb-1" style="text-align: justify;"><?php echo $profile["biography"]; ?></div>
            <!-- Place of birth -->
            <div class="row mb-1"><b>Place of birth:&nbsp;</b><?php echo $profile["place_of_birth"]; ?></div>
            <!-- Date of birth -->
            <div class="row mb-1"><b>Birthday:&nbsp;</b><?php echo $profile["birthday"]; ?></div>
        </div>
    </div>

    <div class="row mb-2">
        <!-- Movie credits -->
    </div>

    <div class="row mb-2">
        <!-- TV credits -->
    </div>
</div>
<?= $this->endSection("content"); ?>