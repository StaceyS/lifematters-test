<?php
/*
Template Name: Blank (No Header/Footer)
*/
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>
    <?php wp_head(); ?>
</head>

<body class="blank">
<div class="container"><div class="row">

<?php while ( have_posts() ) : the_post(); ?>

<?php the_content(); ?>

 <?php endwhile; ?>

</div></div>

<?php edit_post_link( __( 'Edit this page' ), '<span class="edit-link gold_bg">', '</span>' ); ?>
</body>
</html>