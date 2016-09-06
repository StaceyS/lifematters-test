<?php /* Default Page Template  */

get_header(); ?>

	<div class="row main col-lg-12 interior-section" role="main">
			
			<?php if(is_page()){ get_template_part( 'content/content', 'sections' ); } ?>

				<?php while ( have_posts() ) : the_post();

					the_title('<h1>','</h1>');
					the_content();
				
				endwhile; ?>
	</div>

<?php if(is_page( 'ourstory' )){ get_template_part( 'content/content', 'ourstory' ); } ?>

<?php get_footer(); ?>