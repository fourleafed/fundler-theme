<?php
/**
 * Template Name: Submit Template
 *

 */

get_header(); ?>

<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					
<div class="blog_post">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
<div class="blog_post_single_img"><?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail('');
} 
?></div>
			
									<h2 class="blog_post_single_title_color"><?php the_title(); ?></h2>
								

								<section class="entry-content clearfix" itemprop="articleBody">
									<div class="profile_block"><?php the_content(); ?></div>
							</section> <!-- end article section -->

								


							</article> <!-- end article -->

							<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1><?php _e("Oops, Post Not Found!", "fundler"); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "fundler"); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e("This is the error message in the page.php template.", "fundler"); ?></p>
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
