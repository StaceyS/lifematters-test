<?php
/*
Template Name: News/Press Template
*/

get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<section class="interior-section news">

			<h1><?php the_title(); ?></h1>
			<div><?php the_content();?></div>

		</section>
			
			<ul class="news-press-list row">

				<?php while( have_rows('news_press_releases') ): the_row(); 

					$documentLink = get_sub_field('news_press_file');
					$documentTitle = get_sub_field('document_title');

					?>
					<li class="single-press col-md-3 col-xs-12">
						<a class="news-press-link" href="<?php echo $documentLink['url']; ?>" target="blank" title="<?php echo $documentTitle; ?>">
							<img class="resource-type" src="<?php bloginfo('template_url'); ?>/library/img/icons/icon_news_document.svg" />
							<h3><?php echo $documentTitle; ?></h3>
						 </a>
					</li>

				<?php endwhile; ?>

			</ul>
		 
	<?php endwhile; ?>		
<?php endif; ?> <!-- end the loop -->

<?php get_footer(); ?>