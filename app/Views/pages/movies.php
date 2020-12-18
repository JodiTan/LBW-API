<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
	<h1> Movies Page</h1>
</div>
<br>
<div>
	<div>
		<h2 class="container">
			Now Playing
		</h2>
	</div>
	<div>
		
	<div id="carouselExampleControls" class="carousel slide container" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active bg-dark">
				<div alt="First Slide" class="row justify-content-center">
					<div class="mx-2">
						<image src=<?php echo base_url('images/A_Beautiful_Mind.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/Black_Panther.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/Frozen_2.jpg') ?> style="width:150px; height:200px"/>
					</div>
				</div>
			</div>
			<div class="carousel-item container">
				<div alt="Second Slide" class="row justify-content-center bg-dark">
					<div class="mx-2">
						<image src=<?php echo base_url('images/Frozen_2.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/A_Beautiful_Mind.jpg') ?> style="width:150px; height:200px"/>
					</div>
					<div class="mx-2">
						<image src=<?php echo base_url('images/Black_Panther.jpg') ?> style="width:150px; height:200px"/>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
</div>	
<?= $this->endSection('content'); ?>