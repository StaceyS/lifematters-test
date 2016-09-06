<?php $afl_groups=array();

while ( have_posts() ) : the_post();

if( get_field('add_grpd_afl') )  {

	while( has_sub_field('add_grpd_afl') ) {

		$term = get_sub_field('afl_grp_hdr');
		$name = $term->name;

		if( $term ){ array_push($afl_groups,$name); }
	}
}
endwhile;

foreach ($afl_groups as $afl_name) { ?>

	<div class="container"><div class="row">

	<?php echo '<h3 class="afl_row">' . $afl_name . '</h3><br>';
		
	$args = array(
		'tax_query' => array(
			array(
				'taxonomy' => 'affiliate_groups',
				'field'    => 'name',
				'terms'    => $afl_name,
			),
		),
	);

	$query = new WP_Query( $args );

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

	<div class="col-xs-6 col-sm-3 indv_afl">
		<?php if($afl_imgurl){ ?> <a href="<?php echo $afl_link; ?>" target="_blank"><div class="afl_logo" style="background:url(<?php echo $afl_imgurl; ?>) no-repeat center bottom; background-size: 90% auto;" ></div></a><?php }?>
		<h4><?php the_title(); ?></h4>
		<?php if($afl_link){ ?> <a href="<?php echo $afl_link; ?>" target="_blank"><?php echo $domain; ?></a><?php } ?>
	</div>

	<?php endwhile; endif; wp_reset_query(); ?>

	</div></div>

<?php } ?>