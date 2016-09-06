<?php
/*
Template Name: Newsletters Page
*/ 

get_header(); ?>

<div id="primary" class="container page-content newsletter-content">
	<div class="row" role="main">
		<div id="content" class="col-lg-12">
		
		<?php the_title( '<div class="row title-row hdr"><h1 class="entry-title blue">', '</h1>' ); the_content();?></div>
		
		<?php $newsltrargs = array( 'post_type' => array( 'newsletter' ),'posts_per_page' => '-1','orderby' => 'title', 'order' => 'ASC' ); 
		 
		$main_query = new WP_Query( $newsltrargs );
		
		echo '<div class="row ">';
					
		while ( $main_query->have_posts() ) : $main_query->the_post();
		
		$image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumb' );
		$postid = get_the_ID(); $medialink = get_post_meta( $postid, 'newsletterlinktomedia', 'true'); ?>
		
		
		<div class="col-xs-4 col-md-2 mediadwnld"><span class="thumbnail">
		<?php echo '<a class="center-block" href="'.$medialink.'" target="_blank" title="Click to download" alt="'.get_the_title().' thumbnail">' ?>
		<?php echo '<img class="center-block" src="'. $image_url[0] . '" alt="Click here to view">' ?>
		<?php echo '<h4 class="header center-block">'.get_the_title().'</h4></a>'?>
		</span></div>
		
		<?php endwhile; ?>
		
		</div>
		 
</div></div></div>

<?php get_footer(); ?>