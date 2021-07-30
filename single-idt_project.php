<?php 

the_post();

get_header();
?>

<div class="section-heading">
	<div class="container">
		<ul class="breadcrumbs">
			<li>
				<a href=""></a>
			</li>
		</ul>
		
		<div class="section__title">
			<h1></h1>
		</div><!-- /.section__title -->
	</div><!-- /.container -->
</div><!-- /.section-heading -->

<div class="section-project-detail">
	<div class="container">
		<div class="section__content">
			
		</div><!-- /.section__content -->
	</div><!-- /.container -->

	<div class="section__gallery">
		<div class="my-gallery" itemscope itemtype="http://schema.org/ImageGallery">
			<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
				<a href="large-image.jpg" itemprop="contentUrl" data-size="600x400">
					<img src="small-image.jpg" itemprop="thumbnail" alt="Image description" />
				</a>
				<figcaption itemprop="caption description">Image caption</figcaption>
			</figure>

			<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
				<a href="large-image.jpg" itemprop="contentUrl" data-size="600x400">
					<img src="small-image.jpg" itemprop="thumbnail" alt="Image description" />
				</a>
				<figcaption itemprop="caption description">Image caption</figcaption>
			</figure>
		</div>
	</div><!-- /.section__gallery -->
</div><!-- /.section-project-detail -->

<div class="section-other-projects">
	<div class="container">
		<h2></h2>

		<div class="section__projects">
			<div class="section-cols section-cols--three">
				<div class="section__col">
					<div class="section__image">
						<img src="" alt="">
					</div><!-- /.section__image -->

					<div class="section__details">
						<p><a href=""></a></p>

						<p></p>
					</div><!-- /.section__details -->
				</div><!-- /.section__col -->
			</div><!-- /.section-cols section-cols--three -->
		</div><!-- /.section__projects -->
	</div><!-- /.container -->
</div><!-- /.section-other-projects -->

<?php
get_footer();