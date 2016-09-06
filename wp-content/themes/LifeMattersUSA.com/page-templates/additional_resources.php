<?php /* Template Name: Additional Resources  */ ?>

<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<section class="interior-section <?php echo $post->post_name; ?>">
				<h1 class="blue"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</section>

					<?php if( have_rows('additional_resource_section') ): ?>

						<!-- Resource Section List -->
						<ul class="resource-section additional">

							<?php while( have_rows('additional_resource_section') ): the_row(); 

									$sectionTitle = get_sub_field('section_title');

									?>

								<li class="single-resource-section">
									<h2 class="resource-section-title"><?php echo $sectionTitle; ?></h2>

									<!-- List of Individual Resources -->
									<ul class="resources row">
										<?php while( have_rows('single_resource') ): the_row(); 

											$resourceTitle = get_sub_field('resource_title');
											$resourceImage = get_sub_field('resource_image');
											$resourceDescription = get_sub_field('resource_description');
											//$contactInfo = get_sub_field('contact_info');
											$linkLabel = get_sub_field('link_label');
											$linkUrl = get_sub_field('link_url');

											?>

											<li class="single-resource col-sm-3 col-xs-12">
												<div class="resource-image-box">															
													<img class="resource-image" src="<?php echo $resourceImage['url']; ?>" alt="<?php echo $resourceImage['alt']; ?>" />
												</div>

												<h3 class="resource-title"><a class="resource-link" href="<?php echo $linkUrl; ?>" target="blank" title="<?php echo $linkLabel; ?>"><?php echo $resourceTitle; ?></a></h3>
												<p class="resource-desc"><?php echo $resourceDescription; ?></p>
												<div class="resource-contact"><?php echo $contactInfo; ?></div>
												<!-- <a class="resource-link" href="<?php echo $linkUrl; ?>" target="blank" title="<?php echo $linkLabel; ?>"><?php echo $linkLabel; ?> <img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_caret_right.svg" /> </a> -->
											</li>

										<?php endwhile; ?>

									</ul>

								</li>

							<?php endwhile; ?> <!-- end list of individual resources -->

						</ul>

					<?php endif; ?> <!-- end Resource Section List -->

					<!-- Display Caregiver contact details -->
					<div class="caregiver-contact-info">
						<?php echo get_field( 'caregiver_contact_info' ); ?>
					</div>

		<?php endwhile; ?>		
	<?php endif; ?> <!-- end the loop -->

<?php get_footer(); ?>