<?php get_header(); ?>
<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="blog_post" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
<div class="blog_post_date_bg"><div class="blog_post_date_bg2"><div class="blog_post_date">
<div class="blog_post_date1"><?php the_time('M'); ?></div>
<div class="blog_post_date2"><?php the_time('d'); ?></div>
<div class="blog_post_date3"><?php the_time('Y'); ?></div>
</div></div><div class="blog_social_share">
<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink() ?>" target="_blank" title="Click to share"><img src="<?php bloginfo('template_directory'); ?>/images/share_fb.png" alt="" /></a>
<a href="http://twitter.com/share?text=<?php the_title_attribute(); ?>&url=<?php the_permalink() ?>" target="_blank" title="Click to share"><img src="<?php bloginfo('template_directory'); ?>/images/share_tw.png" alt="" /></a>
<a href="https://plus.google.com/share?url=<?php the_permalink() ?>" target="_blank" title="Click to share"><img src="<?php bloginfo('template_directory'); ?>/images/share_g.png" alt="" /></a>
<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_permalink() ?>" target="_blank" title="Click to share"><img src="<?php bloginfo('template_directory'); ?>/images/share_li.png" alt="" /></a>
</div>

</div>
<div class="blog_post_content">

<div class="blog_post_content_imgbox"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
<?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('blog-image');
} 
?></a>
<div class="blog_post_content_img_content">
<div class="blog_post_content_img_content_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo short_title('', 15);?></a></div>
<div class="blog_post_content_img_content_author"><p>by<br /><?php the_author(); ?></p><span><?php
	$author_email = get_the_author_meta('email');
	echo get_avatar($author_email, '96');
?>
</span></div>
</div>

</div>

</div>

<div class="blog_post_content_box"><?php echo excerpt(45); ?>
								</div> 
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
												<p><?php _e("This is the error message in the index.php template.", "fundler"); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>  <!-- end #main -->
<div class="blog_sidebar">
						<?php get_sidebar(); ?></div>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
</div></div>
<?php get_footer(); ?>
