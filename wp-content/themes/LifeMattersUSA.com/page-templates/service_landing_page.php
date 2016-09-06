<?php 

/* Template Name: Service Landing Page Template  */

get_header(); ?>

	<div class="row main col-lg-12 interior-section service-landing" role="main">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<section class="service-summary row">
					<?php the_title('<h1 class="hidden">','</h1>');  ?>					
					<div class="service-intro col-lg-7">
						<?php the_content(); ?>
						<a class="learn-more-link" href="#service-contact-form">Contact</a>
					</div>
					<?php $service_header = get_field('service_header_image'); ?>
					<img class="col-lg-5" src="<?php echo $service_header['url']; ?>" alt="<?php echo $service_header['alt']; ?>" />	

				</section>

				<section class="service-details row">
					<div class="service-details-text col-lg-6">
						<?php the_field('service_details'); ?>
					</div>
					<div class="testimonial col-lg-5 col-lg-offset-1">
						<p class="bubble"><?php the_field('featured_testimonial'); ?></p>
						<h3 class="name"><?php the_field('testimonial_citation'); ?></h3>
						<?php if (get_field('featured_testimonial_2')) { ?>
							<p class="bubble"><?php the_field('featured_testimonial_2'); ?></p>
							<h3 class="name"><?php the_field('testimonial_citation_2'); ?></h3>
						<?php } ?>
					</div>
				</section>
				<section class="service-contact-form row" id="service-contact-form">
					<div class="lg-col-6"><?php the_field('service_contact_form'); ?></div>
				</section>

					
				<?php endwhile; ?>

			<?php endif; ?>
	
	</div>


<?php get_footer(); ?>