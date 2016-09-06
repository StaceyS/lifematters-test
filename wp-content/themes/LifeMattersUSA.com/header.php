<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title(''); ?></title>
			
	<meta name="keywords" content="home care assistance, home health bethesda, home health maryland, home health virginia, home health washington dc, home care maryland, caregiver maryland, home care virginia, home health care maryland, in home care, care management, care management virginia, care management maryland, care management washington dc, home nursing services, home care giver, home elder care, home care, home assistance, in home nursing, LifeMatters, Home Care Washington DC, In Home Nursing, Health Aide Fairfax, Caregiver Alexandria, home health care washington dc, home health aide washington dc, home care washington dc, in home nursing washington dc, caregiver dc, caregivers washington dc, home care dc, elder care dc, adult home care washington dc, senior sitter dc, senior assistance dc, long term care washington dc, home health care alexandria, home health care fairfax, home health care bethesda, home health care woodbridge, home care services dc, elderly assistance rockville, home care agency woodbridge, home care bethesda, assisted living silver spring, assisted living dc, assisted living fairfax, assisted living bethesda, assisted living washington dc, senior care dc, senior transportation dc, assisted living rockville, home care silver spring, long term care fairfax"/>

	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="apple-touch-icon" href="<?php echo get_bloginfo('template_url'); ?>/library/img/apple-icon-touch.png">
	<!-- <link rel="icon" href="<?php echo get_bloginfo('url'); ?>/favicon.ico"> -->

	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo get_bloginfo('template_url'); ?>/library/img/win8-tile-icon.png">

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	
	<?php wp_head(); ?>

</head>


<body <?php body_class('container-fluid'); ?>>

	<!-- Google Analytics -->
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-15280566-1', 'auto');
	ga('send', 'pageview');

	</script>
	<!-- End Google Analytics -->

	<header id="header" class="header row clearfix">
				<div class="logo">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
						<img src="<?php echo get_bloginfo('template_url'); ?>/library/img/lm_logo.svg" onerror="this.onerror=null; this.src='<?php echo get_bloginfo('template_url'); ?>/img/lm_logo.svg'" alt="Lifematters: Delivering Peace of Mind">
						</a>
				</div>
					
				<div class="header_contact">
						<p class="supltxt"><?php if(!is_page( 103 ) ){ echo 'Available 24 Hours a Day, 7 Days a Week'; } else { echo 'Contact Us for Job Opportunities'; } ?></p>

					<a class="phone_num" href="tel:<?php if(!is_page( 103 ) ){ echo '1-800-293-8973'; } else {  echo '1-703-839-8000'; } ?>">
						<img src="<?php echo get_bloginfo('template_url'); ?>/library/img/icons/icon_phone.svg" alt="Call Lifematters"> <?php if(!is_page( 103 ) ){ echo '(800) 293-8973'; } else {  echo '(703) 839-8000'; } ?>
					</a>

					<!-- Remove link functionality per HR request
					<a class="header_email" href="mailto:<?php if(!is_page( 103 ) ){ echo 'info@lifemattersusa.com'; } else {  echo 'hr@lifemattersusa.com'; } ?>" target="blank"><img src="<?php echo get_bloginfo('template_url'); ?>/library/img/icons/icon_email.svg" alt="Email Lifematters" /> 
						 <?php if(!is_page( 103 ) ){ echo 'info@lifemattersusa.com'; } else {  echo 'hr@lifemattersusa.com'; } ?>
					</a>	 -->

					<p class="header_email">
						<img src="<?php echo get_bloginfo('template_url'); ?>/library/img/icons/icon_email.svg" alt="Email Lifematters" /> <?php if(!is_page( 103 ) ){ echo 'info@lifemattersusa.com'; } else {  echo 'hr@lifemattersusa.com'; } ?>
					</p>					

				</div>
				
				<div class="col-sm-2 login_btn hidden"><a href=""><img src="<?php echo get_bloginfo('template_url'); ?>/library/img/icons/user_blk.svg" alt="User" class="hidden-xs"><img src="<?php echo get_bloginfo('template_url'); ?>/library/img/icons/user.svg" alt="user" class="visible-xs-inline-block">Client Login</a></div>
	</header>

	<button class="mobile-nav-icon"><img src="<?php echo get_bloginfo('template_url'); ?>/library/img/icons/icon_mobile_nav.svg" alt="Mobile Navigation"/></button>

	<?php 
		wp_nav_menu( array(
	    'menu' => 'Main Menu',
	    'container_class' => false , 
	    'menu_class' => 'primary_nav col-lg-12'
				) );
	 	?>
