<?php /* Template Name: Interior Long Scroll  */ ?>

<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<!-- <section class="interior-section">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</section> -->

		<?php if( have_rows('add_section') ): ?>

			<?php while( have_rows('add_section') ): the_row(); ?>

				<?php if( have_rows('indv_section') ): ?>

					<?php while( have_rows('indv_section') ): the_row();
						// vars
						$image = get_sub_field('section_img');
						$sectionHeader = get_sub_field('section_hdr'); 
						$content = get_sub_field('section_body');
						$linkName = get_sub_field('section_lnk_nm');
					 ?>

						<?php if( $image ) { ?>
							<div id="<?php echo $linkName; ?>" class="section-header-image">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
							</div>
						<?php	} ?>

						<section class="interior-section">
							<?php if( $sectionHeader ) { ?>
								<h2><?php echo $sectionHeader; ?></h2>
							<?php	} ?>
					    <?php echo $content; ?>
						</section>

	  			<?php endwhile; ?>

				<?php endif; ?>


			<?php endwhile; ?>

		<?php endif; ?>

	<?php endwhile; ?>		
<?php endif; ?> <!-- end the loop -->


<?php get_footer(); ?>