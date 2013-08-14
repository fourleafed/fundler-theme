<?php get_header(); ?>

<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div id="inner-content" class="wrap clearfix">

					
<div class="blog_post">
						<h1 class="archive-title text-center"><span><?php _e('Search Results for:', 'fundler'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

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

								<section class="entry-content">
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
                                 <div class="page_404">

									<article id="post-not-found" class="hentry clearfix">
										<header class="article-header">
											<h1 class="big404"><?php _e("Sorry, No Results.", "fundler"); ?></h1>
										</header>
										<section class="content_404">
											<p><?php _e("Try your search again.", "fundler"); ?></p>
										</section>
										<section class="search">

									<div class="content_404_search"><form method="get" id="searchform" action="<?php echo home_url(); ?>/"><div class="content_404_search_input"><input type="text" size="" name="s" id="s" value="search here..." onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/></div><div class="content_404_search_submit"><input type="submit" id="searchsubmit" value="" class="content_404_search_button" /></div></form></div>

							</section> <!-- end search section -->
									</article></div>

							<?php endif; ?>

						</div> 
<div class="blog_sidebar">
						<?php get_sidebar(); ?></div>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->
</div></div>

<?php get_footer(); ?>
