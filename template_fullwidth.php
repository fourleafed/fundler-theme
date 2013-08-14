<?php
/**
 * Template Name: Full Width
 *
 */

get_header(); ?>

<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div class="clearfix">

					


							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						
			
									<h2 class="blog_post_single_title_full"><?php the_title(); ?></h2>
								

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
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

						

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
</div></div>

<?php get_footer(); ?>
