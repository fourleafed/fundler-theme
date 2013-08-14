<?php get_header(); ?>

<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					
<div class="blog_post">

							<?php if (is_category()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Posts Categorized:", "fundler"); ?></span> <?php single_cat_title(); ?>
								</h1>

							<?php } elseif (is_tag()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Posts Tagged:", "fundler"); ?></span> <?php single_tag_title(); ?>
								</h1>

							<?php } elseif (is_author()) {
								global $post;
								$author_id = $post->post_author;
							?>
								<h1 class="archive-title h2">

									<span><?php _e("Posts By:", "fundler"); ?></span> <?php the_author_meta('display_name', $author_id); ?>

								</h1>
							<?php } elseif (is_day()) { ?>
								<h1 class="archive-title h2">
									<span><?php _e("Daily Archives:", "fundler"); ?></span> <?php the_time('l, F j, Y'); ?>
								</h1>

							<?php } elseif (is_month()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Monthly Archives:", "fundler"); ?></span> <?php the_time('F Y'); ?>
									</h1>

							<?php } elseif (is_year()) { ?>
									<h1 class="archive-title h2">
										<span><?php _e("Yearly Archives:", "fundler"); ?></span> <?php the_time('Y'); ?>
									</h1>
							<?php } ?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
<div class="blog_post_single_img"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('blog-single-image');
} 
?></a></div>
								<header class="article-header">

									<div class="blog_post_single_databg"><div class="blog_post_single_title_2"><h2 class="blog_post_single_title_1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2></div>
									<div class="blog_post_single_data"><?php
										printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time> <span class="amp"> | </span> by <span class="author">%3$s</span>', 'fundler'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), fundler_get_the_author_posts_link(), get_the_category_list(', '));
									?></div></div>
								</header> <!-- end article header -->

								<section class="entry-content clearfix">

									<?php echo excerpt(45); ?>

								</section> <!-- end article section -->

							 <div class="blog_post_content_box_bottomline"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Read More!</a></div>

							</article> <!-- end article -->

							<?php endwhile; ?>

									<?php if (function_exists('fundler_page_navi')) { ?>
										<?php fundler_page_navi(); ?>
									<?php } else { ?>
										<nav class="wp-prev-next">
											<ul class="clearfix">
												<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "fundler")) ?></li>
												<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "fundler")) ?></li>
											</ul>
										</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Oops, Post Not Found!", "fundler"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "fundler"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the archive.php template.", "fundler"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div> 
<div class="blog_sidebar">
						<?php get_sidebar(); ?></div>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
</div></div>

<?php get_footer(); ?>
