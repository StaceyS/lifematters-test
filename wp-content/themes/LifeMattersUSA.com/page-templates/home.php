<?php /* Template Name: Home Page  */ ?>

<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>


			<!-- Intro Section -->

			<section class="main-section">	
  			<?php the_content(); ?>
			</section>


			<!-- Blockquote #1 -->

			<?php if( have_rows('blockquote_1') ): ?>

				<blockquote class="green_tx col-md-12">

				<?php while( have_rows('blockquote_1') ): the_row(); 
					$quoteText = get_sub_field('quote_text');
					$buttonLabel = get_sub_field('button_label');
					$buttonUrl = get_sub_field('button_url');
					?>

					  <div><?php echo $quoteText; ?></div>
					  <a class="learn-more-link" href="<?php echo $buttonUrl; ?>"><?php echo $buttonLabel; ?></a>
					</blockquote>

				<?php endwhile; ?>
			<?php endif; ?>


			<!-- How We Can Help Section -->

			<?php if( have_rows('section_overview_1') ): ?>

				<section class="main-section">	

				<?php while( have_rows('section_overview_1') ): the_row(); 
					$section_title = get_sub_field('section_title');
					$section_icon = get_sub_field('section_icon');
					$section_summary_text = get_sub_field('section_summary_text');
					$button_label = get_sub_field('button_label');
					$button_link = get_sub_field('button_link');
					?>
					<img class="section-hdr-icon hdricon img-circle blue_bg" src="<?php echo $section_icon['url']; ?>" alt="<?php echo $section_icon['alt']; ?>" />		
				  <h2 class="blue"><?php echo $section_title; ?></h2>
				  <hr class="blue_bg" />
				  <p><?php echo $section_summary_text; ?></p>
				  <?php if ($button_link): ?>
					  <a class="learn-more-link" title="<?php echo $button_label; ?>" href="<?php echo $button_link; ?>"><?php echo $button_label; ?></a>
				  <?php endif ?>				
				</section>

				<?php endwhile; ?>
			<?php endif; ?>			


		<!-- Callout Columns -->

		<?php if( have_rows('callout_columns_1') ): ?>

			<div class="row row-centered vrtpnl_row howwecanhelp">

				<?php while( have_rows('callout_columns_1') ): the_row(); 
					$section_detail_title = get_sub_field('section_detail_title');
					$section_detail_icon = get_sub_field('section_detail_icon');
					$short_description = get_sub_field('short_description');
					$button_link = get_sub_field('button_link');
					?>
				  <div class="vrtpnl col-sm-2">
					  <img class="hdricon img-circle" src="<?php echo $section_detail_icon['url']; ?>" alt="$section_detail_icon['alt']; ?>" width="86" height="86" />
					  <h3><?php echo $section_detail_title; ?></h3>
					  <p><?php echo $short_description; ?></p>
					  <?php if ($button_link): ?>
						  <a class="sm-link" title="Read More" href="<?php echo $button_link; ?>">Read More</a>
					  <?php endif ?>				  
					</div>	
				<?php endwhile; ?>

			</div>
		
		<?php endif; ?>			


			<!-- Blockquote #2 -->

			<?php if( have_rows('blockquote_2') ): ?>

					<blockquote class="gold_tx col-md-12">

					<?php while( have_rows('blockquote_2') ): the_row(); 
						$quoteText = get_sub_field('quote_text');
						$buttonLabel = get_sub_field('button_label');
						$buttonUrl = get_sub_field('button_url');
						?>

						  <div><?php echo $quoteText; ?></div>
						  <a class="learn-more-link" href="<?php echo $buttonUrl; ?>"><?php echo $buttonLabel; ?></a>
						</blockquote>

					<?php endwhile; ?>
				<?php endif; ?>


			<!-- How We Work Section -->

			<?php if( have_rows('section_overview_2') ): ?>

				<section class="main-section">	

				<?php while( have_rows('section_overview_2') ): the_row(); 
					$section_title = get_sub_field('section_title');
					$section_icon = get_sub_field('section_icon');
					$section_summary_text = get_sub_field('section_summary_text');
					$button_label = get_sub_field('button_label');
					$button_link = get_sub_field('button_link');
					?>
					<img class="section-hdr-icon hdricon img-circle blue_bg" src="<?php echo $section_icon['url']; ?>" alt="<?php echo $section_icon['alt']; ?>" />		
				  <h2 class="blue"><?php echo $section_title; ?></h2>
				  <hr class="blue_bg" />
				  <p><?php echo $section_summary_text; ?></p>
				  <?php if ($button_link): ?>
					  <a class="learn-more-link" title="<?php echo $button_label; ?>" href="<?php echo $button_link; ?>"><?php echo $button_label; ?></a>
				  <?php endif ?>				
				</section>

				<?php endwhile; ?>
			<?php endif; ?>		

			<!-- Callout Columns -->

			<?php if( have_rows('callout_columns_2') ): ?>

				<div class="row row-centered vrtpnl_row howwework">

					<?php while( have_rows('callout_columns_2') ): the_row(); 
						$section_detail_title = get_sub_field('section_detail_title');
						$section_detail_icon = get_sub_field('section_detail_icon');
						$short_description = get_sub_field('short_description');
						$button_link = get_sub_field('button_link');
						?>
					  <div class="vrtpnl col-sm-3 col-md-offset-1">
						  <img class="hdricon img-circle" src="<?php echo $section_detail_icon['url']; ?>" alt="$section_detail_icon['alt']; ?>" width="86" height="86" />
						  <h3><?php echo $section_detail_title; ?></h3>
						  <p><?php echo $short_description; ?></p>
						  <?php if ($button_link): ?>
							  <a class="sm-link" title="Read More" href="<?php echo $button_link; ?>">Read More</a>
						  <?php endif ?>				  
						</div>	
					<?php endwhile; ?>

				</div>
			
			<?php endif; ?>			


			<!-- Blockquote #3 -->
	
			<?php if( have_rows('blockquote_3') ): ?>

					<blockquote class="teal_tx col-md-12">

					<?php while( have_rows('blockquote_3') ): the_row(); 
						$quoteText = get_sub_field('quote_text');
						$buttonLabel = get_sub_field('button_label');
						$buttonUrl = get_sub_field('button_url');
						?>

						  <div><?php echo $quoteText; ?></div>
						  <a class="learn-more-link" href="<?php echo $buttonUrl; ?>"><?php echo $buttonLabel; ?></a>
						</blockquote>

					<?php endwhile; ?>
				<?php endif; ?>

			
			<!-- Who We Are Section -->

			<?php if( have_rows('section_overview_3') ): ?>

				<section class="main-section">	

				<?php while( have_rows('section_overview_3') ): the_row(); 
					$section_title = get_sub_field('section_title');
					$section_icon = get_sub_field('section_icon');
					$section_summary_text = get_sub_field('section_summary_text');
					$button_label = get_sub_field('button_label');
					$button_link = get_sub_field('button_link');
					?>
					<img class="section-hdr-icon hdricon img-circle blue_bg" src="<?php echo $section_icon['url']; ?>" alt="<?php echo $section_icon['alt']; ?>" />		
				  <h2 class="blue"><?php echo $section_title; ?></h2>
				  <hr class="blue_bg" />
				  <p><?php echo $section_summary_text; ?></p>
				  <?php if ($button_link): ?>
					  <a class="learn-more-link" title="<?php echo $button_label; ?>" href="<?php echo $button_link; ?>"><?php echo $button_label; ?></a>
				  <?php endif ?>				
				</section>

				<?php endwhile; ?>
			<?php endif; ?>		


			<!-- Blockquote #4 -->

			<?php if( have_rows('blockquote_4') ): ?>

					<blockquote class="red_tx col-md-12">

					<?php while( have_rows('blockquote_4') ): the_row(); 
						$quoteText = get_sub_field('quote_text');
						$buttonLabel = get_sub_field('button_label');
						$buttonUrl = get_sub_field('button_url');
						?>

						  <div><?php echo $quoteText; ?></div>
						  <a class="learn-more-link" href="<?php echo $buttonUrl; ?>"><?php echo $buttonLabel; ?></a>
						</blockquote>

					<?php endwhile; ?>
				<?php endif; ?>


			<!-- Our Story Section -->
			
			<?php if( have_rows('section_overview_4') ): ?>

				<section class="main-section">	

				<?php while( have_rows('section_overview_4') ): the_row(); 
					$section_title = get_sub_field('section_title');
					$section_icon = get_sub_field('section_icon');
					$section_summary_text = get_sub_field('section_summary_text');
					$button_label = get_sub_field('button_label');
					$button_link = get_sub_field('button_link');
					?>
					<img class="section-hdr-icon hdricon img-circle blue_bg" src="<?php echo $section_icon['url']; ?>" alt="<?php echo $section_icon['alt']; ?>" />		
				  <h2 class="blue"><?php echo $section_title; ?></h2>
				  <hr class="blue_bg" />
				  <p><?php echo $section_summary_text; ?></p>

				  <?php if ($button_link): ?>
					  <a class="learn-more-link" title="<?php echo $button_label; ?>" href="<?php echo $button_link; ?>"><?php echo $button_label; ?></a>
				  <?php endif ?>

				</section>

				<?php endwhile; ?>
			<?php endif; ?>		

			<!-- Callout Columns -->

				<?php if( have_rows('callout_columns_4') ): ?>

					<div class="row row-centered vrtpnl_row ourstory">

						<?php while( have_rows('callout_columns_4') ): the_row(); 
							$section_detail_title = get_sub_field('section_detail_title');
							$section_detail_icon = get_sub_field('section_detail_icon');
							$short_description = get_sub_field('short_description');
							$button_link = get_sub_field('button_link');
							?>
						  <div class="vrtpnl col-sm-2">
							  <img class="hdricon img-circle" src="<?php echo $section_detail_icon['url']; ?>" alt="$section_detail_icon['alt']; ?>" width="86" height="86" />
							  <h3><?php echo $section_detail_title; ?></h3>
							  <p><?php echo $short_description; ?></p>
							  <?php if ($button_link): ?>
								  <a class="sm-link" title="Read More" href="<?php echo $button_link; ?>">Read More</a>
							  <?php endif ?>				  
							</div>	
						<?php endwhile; ?>

					</div>
				
				<?php endif; ?>			
			

			<!-- Awards Section -->

			<?php if( have_rows('awards') ): ?>

				<section class="main-section">	
				<h2 class="blue">Awards</h2>
				<hr class="blue_bg" />
				</section>

				<div class="row row-centered vrtpnl_row awards">

					<?php while( have_rows('awards') ): the_row(); 
						$awards_title = get_sub_field('awards_title');
						$awards_image = get_sub_field('awards_image');
						?>
					  <div class="vrtpnl col-sm-2">
  						<div class="award-img-wrapper">
								<img src="<?php echo $awards_image['url']; ?>" alt="$awards_image['alt']; ?>"/>
							</div>
							<h4><?php echo $awards_title; ?></h4>	
						</div>

					<?php endwhile; ?>

				</div>
			
			<?php endif; ?>			

		<?php endwhile; ?>		
	<?php endif; ?> <!-- end the loop -->


	<!-- Popup: Removed per client request 08.19.16
	<div class="overlay"></div>

	<div class="popup">

		<div class="popup-close">
			<a id="closepopup">X</a>
		</div>
		
		<a class="popup-link">continue to the full site</a>
		
		<div class="popup-logo"><img src="<?php echo get_bloginfo('template_url'); ?>/library/img/lm_logo.svg" width="100%" /></div>
		
		<h2>Welcome to Lifematters. <br />What can we help you with today?</h2>
		<div class="inline-blocks">
			<a class="sm-link-blue direct-link" href="<?php echo get_bloginfo('url'); ?>/contactus/" title="I need a caregiver.">I need a <br />caregiver.</a>
		</div>
		<div class="inline-blocks">
			<a class="sm-link-blue direct-link" href="https://lifemattersusa.applicantpro.com/jobs/" title="I am looking for career opportunities.">I am looking for career opportunities.</a>
		</div>
		<div class="inline-blocks">
			<a class="sm-link-blue direct-link" href="<?php echo get_bloginfo('url'); ?>/resources/thelifemattersdifference/" title="I am looking for career opportunities.">I want more information on Lifematters.</a>
		</div>
		<div class="inline-blocks">
			<a class="sm-link-blue direct-link" href="<?php echo get_bloginfo('url'); ?>/resources/blog/" title="I want to learn more about home care.">I want to learn more about home care.</a>
		</div>
	</div>

	 End popup -->


<?php get_footer(); ?>