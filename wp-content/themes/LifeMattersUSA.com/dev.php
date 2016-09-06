<?php
/*
Template Name: ---dev---
*/

get_header(); ?>

<div id="primary" class="container page-content">
	<div class="row" role="main">
		<div id="content" class="col-lg-12">

			<?php $afl_groups=array();

while ( have_posts() ) : the_post();

get_template_part( 'content', 'page' );

if(is_page( 'DEV' )){

	if( get_field('add_grpd_afl') )  {

		while( has_sub_field('add_grpd_afl') ) {

			$term = get_sub_field('afl_grp_hdr');
			$name = $term->name;

			if( $term ){ array_push($afl_groups,$name); }
		}
	}
}

endwhile;

foreach ($afl_groups as $afl_name) {?>

	<div class="row">

	<?php echo '<strong>' . $afl_name . '</strong><br>';

	$query = new WP_Query( array( 'affiliate_groups' => $afl_name ) );

	if ( $query->have_posts() ):

		while ( $query->have_posts() ): $query->the_post();
		$afl_pid = get_the_ID();
		$afl_imgurl = get_field('afl_logo',$afl_pid);
		$afl_link = get_field('afl_link',$afl_pid);
		$afl_link = trim($afl_link, '/');
		if (!preg_match('#^http(s)?://#', $afl_link)) {
			$afl_link = 'http://' . $afl_link;
		}
		$urlParts = parse_url($afl_link);
		$domain = preg_replace('/^www\./', '', $urlParts['host']);?>

						<div class="col-xs-6 col-sm-2 indv_afl">
							<?php if($afl_imgurl){ ?> <img class="afl_logo" src="<?php echo $afl_imgurl; ?>" width="100%" height="auto"> <?php }?>
							<h4><?php the_title(); ?></h4>
							<?php if($afl_link){ ?> <a href="<?php echo $afl_link; ?>" target="_blank"><?php echo $domain; ?></a><?php } ?>
						</div>

				<?php endwhile; endif; wp_reset_query(); ?>

				</div>

			<?php } ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>