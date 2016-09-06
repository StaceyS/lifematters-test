<?php /* Template Name: Caregiver Resources  */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

					<section class="interior-section <?php echo $post->post_name; ?>">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</section>

							<?php if( have_rows('caregiver_resource_section') ): ?>

								<!-- Resource Section List -->
								<ul class="resource-section">

									<?php while( have_rows('caregiver_resource_section') ): the_row(); 

											$sectionTitle = get_sub_field('section_title');

											?>

										<li class="single-resource-section">
											<h2 class="resource-section-title"><?php echo $sectionTitle; ?></h2>

											<!-- List of Individual Resources -->
											<ul class="resources row">
												<?php while( have_rows('single_resource') ): the_row(); 

													$resourceTitle = get_sub_field('resource_title');
													$resourceType = get_sub_field('resource_type');
													$resourceDescription = get_sub_field('resource_description');
													$contactInfo = get_sub_field('contact_info');
													$linkLabel = get_sub_field('link_label');
													$linkUrl = get_sub_field('link_url');

													?>

													<li class="single-resource col-sm-3 col-xs-12">
														<div class="resource-type-icon">															
															<?php if( $resourceType == "Form"): ?>
																<img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_resource_form_ko.svg" alt="<?php echo $resourceTitle; ?>" />

															<?php elseif( $resourceType == "Online Application"): ?>
																<img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_resource_form_ko.svg" alt="<?php echo $resourceTitle; ?>" />

															<?php elseif( $resourceType == "Search Tool"): ?>
																<img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_resource_search_tool_ko.svg" alt="<?php echo $resourceTitle; ?>" />

															<?php elseif( $resourceType == "Clinic or Location"): ?>
																<img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_resource_medical_location_ko.svg" alt="<?php echo $resourceTitle; ?>" />

															<?php endif; ?>
														</div>

														<h3 class="resource-title"><?php echo $resourceTitle; ?></h3>
														<p class="resource-desc"><?php echo $resourceDescription; ?></p>
														<div class="resource-contact"><?php echo $contactInfo; ?></div>
														<a class="resource-link" href="<?php echo $linkUrl; ?>" target="blank" title="<?php echo $linkLabel; ?>"><?php echo $linkLabel; ?> <img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_caret_right.svg" alt="<?php echo $linkLabel; ?>" /> </a>
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