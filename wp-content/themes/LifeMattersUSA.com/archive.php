<?php get_header(); ?>

			<div id="primary_blog" class="container blog-content">
				<div class="row content" role="main">

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Categorized:'); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Posts Tagged:'); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e( 'Posts By:'); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e( 'Daily Archives:'); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Monthly Archives:'); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e( 'Yearly Archives:'); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class($classes = array('cf','col-sm-4' )); ?> role="article">
							
								<div class="media">
										<a class="pull-left" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php if ( has_post_thumbnail() ) {the_post_thumbnail('full',  array( 'class' => 'media-object img-circle' )); ?>
									  <?php } else { ?>
									  		<img class="media-object img-circle orng_bg" src="http://lifematters.digitalhealthstrategies.com/wp-content/themes/LifeMattersUSA.com/img/icons/blog.svg" alt="Icon"/>
									  <?php } ?>
									  </a>
								</div>

								<div class="article-header">

									<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<p class="byline vcard"><?php
										printf(__( 'Posted') . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by') . ' <span class="author">%3$s</span> <span class="amp">&</span> ' . __('filed under', 'bonestheme') .  ' %4$s.', get_the_time('Y-m-j'), get_the_time(__( 'F jS, Y')), get_the_author_link( get_the_author_meta( 'ID' ) ), get_the_category_list(', '));
									?></p>

								</div>

								<section class="entry-content cf media-body">

									<?php the_excerpt(); ?>

								</section>

								<div class="article-footer">

								</div>

							</article>

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!'); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.'); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.'); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

			</div>

<?php get_footer(); ?>
