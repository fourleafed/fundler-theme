<?php
/**
 * Template Name: Homepage 2
 *
 */

get_header(); ?>

<?php echo do_shortcode('[infinite_slider]') ?>
<div class="bigcontainer3">
	<div class="container">
		<?php if ( get_theme_mod( 'infobar_switch' ) == "on") { ?>
		<div class="top_info_line">
			<div class="top_info_line_left">
				<div class="top_info_line_box">
					<div class="top_info_line_box_left">
						<a href="<?php echo get_theme_mod( 'infobar_left_link' ); ?>">
							<?php if ( get_theme_mod( 'infobar_left_icon' ) ) : ?>
    							<img src="<?php echo get_theme_mod( 'infobar_left_icon' ); ?>" alt="<?php echo get_theme_mod( 'infobar_left_title' ); ?>">
							<?php else : ?>
        						<img src="<?php bloginfo('template_directory'); ?>/images/topinfo_icon1.png" alt="" >
							<?php endif; ?>
						</a>
					</div>
					<div class="top_info_line_box_right">
						<div class="top_info_line_box_title" id="infobar_left_title">
							<?php echo get_theme_mod( 'infobar_left_title' ); ?>
						</div>
						<div class="top_info_line_box_content" id="infobar_left_desc">
							<?php echo get_theme_mod( 'infobar_left_desc' ); ?>
						</div>
						<div class="top_info_line_box_button">
							<a href="<?php echo get_theme_mod( 'infobar_left_link' ); ?>" id="infobar_left_button"><?php echo get_theme_mod( 'infobar_left_button' ); ?></a>
						</div>
					</div>
				</div>
			</div>
			<div class="top_info_line_right">
				<div class="top_info_line_box">
					<div class="top_info_line_box_left">
						<a href="<?php echo get_theme_mod( 'infobar_right_link' ); ?>">
							<?php if ( get_theme_mod( 'infobar_right_icon' ) ) : ?>
    							<img src="<?php echo get_theme_mod( 'infobar_right_icon' ); ?>" alt="<?php echo get_theme_mod( 'infobar_right_title' ); ?>">
							<?php else : ?>
        						<img src="<?php bloginfo('template_directory'); ?>/images/topinfo_icon2.png" alt="" >
							<?php endif; ?>
						</a>
					</div>
					<div class="top_info_line_box_right">
						<div class="top_info_line_box_title" id="infobar_right_title">
							<?php echo get_theme_mod( 'infobar_right_title' ); ?>
						</div>
						<div class="top_info_line_box_content" id="infobar_right_desc">
							<?php echo get_theme_mod( 'infobar_right_desc' ); ?>
						</div>
						<div class="top_info_line_box_button">
							<a href="<?php echo get_theme_mod( 'infobar_right_link' ); ?>" id="infobar_right_button"><?php echo get_theme_mod( 'infobar_right_button' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div><?php } ?>
	</div>
	</div>
	<div class="bigcontainer4">
	<div class="container">
		<div class="homepage_quote">
			<?php echo get_theme_mod( 'home_page_quote' ); ?>
		</div>
		<div class="homepage_line3">
			<?php 
							$featured = new ATCF_Campaign_Query( array( 
								'posts_per_page' => 1,
								'meta_query'     => array(
									array(
										'key'     => '_campaign_featured',
										'value'   => 1,
										'compare' => '=',
										'type'    => 'numeric'
									)
								)
							) ); 

							while ( $featured->have_posts() ) : $featured->the_post();
								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-single-image' );
							$campaign = new ATCF_Campaign( $post ); ?>
			<div class="homepage_featured">
				<div class="homepage_featured_title">
					<div class="ftitle"><p>Featured</p><span>Campaign</span></div>
				</div>
				<div class="homepage_featured_img">
					<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" alt=""></a>
				</div>
				<div class="homepage_featured_content">
					<div class="homepage_featured_content_left">
						<div class="homepage_featured_content_left_data">
							<ul>
								<li>
									<?php echo $campaign->days_remaining(); ?>
								</li>
								<li>
									<?php echo $campaign->current_amount(); ?>
								</li>
								<li>
									<?php echo $campaign->backers_count(); ?>
								</li>
							</ul>
						</div>
						<div class="homepage_featured_content_left_data_name">
							<ul>
								<li>
									Days to go
								</li>
								<li>
									Pledged
								</li>
								<li>
									Funders
								</li>
							</ul>
						</div>
					</div>
					<div class="homepage_featured_content_right">
					  <div class="homepage_featured_content_right_title">
					<a href="<?php the_permalink(); ?>"><?php echo short_title('...', 6);?></a>
				</div>
						<?php echo wp_trim_words(get_the_excerpt(), 65); ?>
						<div class="top_info_line_box_button" id="homepage_featured_button">
							<a href="<?php the_permalink(); ?>">view project</a>
						</div>
					</div>
				</div>
			</div><?php endwhile; wp_reset_postdata(); ?>
			<div class="homepage_news">
				<div class="homepage_news_title">
					<p>
						Recent
					</p><span>News</span>
				</div>
				<ul>
					<?php
					global $post;
					$myposts = get_posts('numberposts=4&order=DESC&orderby=post_date');
					foreach($myposts as $post) :
					setup_postdata($post);
					?>
					<li>
						<div class="homepage_news_box">
							<div class="homepage_news_box_left">
								<h4>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo short_title('...', 6);?></a>
								</h4><span><?php echo excerpt(15); ?></span>
							</div>
							<div class="homepage_news_box_right">
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(array(250,250)); ?></a>
							</div>
						</div>
					</li><?php endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="homepage_line2">
			<div class="simpleTabs">       
				<ul class="simpleTabsNavigation">
					<li class="current"><a href="#">Featured Projects</a></li>
					<li><a href="#">Latest Projects</a></li>
					<li><a href="#">Ending Soon</a></li>
					<li class="tab_disp"><a href="<?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'view_all_projects_link' ); ?>">View All Projects</a></li>
				</ul>
				<div class="simpleTabsContent">
					<?php 
									$featured = new ATCF_Campaign_Query( array( 
										'posts_per_page' => 4,
										'meta_query'     => array(
											array(
												'key'     => '_campaign_featured',
												'value'   => 1,
												'compare' => '=',
												'type'    => 'numeric'
											)
										)
									) ); 

									while ( $featured->have_posts() ) : $featured->the_post();
										$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), '240' );
									$campaign = atcf_get_campaign( $post ); ?>
					<div class="project_list_box">
						<div class="project_list_box_title">
							<div class="project_list_box_img">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" alt=""></a>
							</div>
							<h3>
								<a href="<?php the_permalink(); ?>"><?php echo short_title('...', 6);?></a>
							</h3>
						</div>
						<div class="project_list_box_loader">
							<div class="project_list_box_loaderbar"><span style="width: <?php echo $campaign->percent_completed(); ?>"></span></div>
						</div>
						<div class="project_list_box_dataline">
							<div class="project_list_box_dataline_left">
								<p>
									Backers
								</p><span><?php echo $campaign->backers_count(); ?></span>
							</div>
							<div class="project_list_box_dataline_right">
								<div class="project_list_box_dataline_right_top">
									<div class="project_list_box_dataline_right_line1">
										<p>
											Pledged:
										</p><span><?php echo $campaign->current_amount(); ?></span>
									</div>
									<div class="project_list_box_dataline_right_line2">
										<p>
											Time Left:
										</p><span><?php echo $campaign->days_remaining(); ?> d</span>
									</div>
								</div>
							</div>
						</div>
						<div class="project_list_box_content_bg">
							<div class="project_list_box_content_bg2">
								<div class="project_list_box_content">
									<?php echo wp_trim_words(get_the_excerpt(), 23); ?>
								</div>
							</div>
							<div class="project_list_box_nav">
								<p>
									<?php echo $campaign->location(); ?>
								</p>
							</div>
						</div>
					</div><?php endwhile; wp_reset_postdata(); ?>
				</div>
				<div class="simpleTabsContent">
					<?php 
									$latest_projects = new ATCF_Campaign_Query( array( 
										'posts_per_page' => 4,
										'orderby' => 'date',
										'order' => 'ASC'

									) ); 

									while ( $latest_projects->have_posts() ) : $latest_projects->the_post();
										$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), '240' );
									$campaign_latest = atcf_get_campaign( $post ); ?>
					<div class="project_list_box">
						<div class="project_list_box_title">
							<div class="project_list_box_img">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" alt=""></a>
							</div>
							<h3>
								<a href="<?php the_permalink(); ?>"><?php echo short_title('...', 6);?></a>
							</h3>
						</div>
						<div class="project_list_box_loader">
							<div class="project_list_box_loaderbar"><span style="width: <?php echo $campaign_latest->percent_completed(); ?>"></span></div>
						</div>
						<div class="project_list_box_dataline">
							<div class="project_list_box_dataline_left">
								<p>
									Backers
								</p><span><?php echo $campaign_latest->backers_count(); ?></span>
							</div>
							<div class="project_list_box_dataline_right">
								<div class="project_list_box_dataline_right_top">
									<div class="project_list_box_dataline_right_line1">
										<p>
											Pledged:
										</p><span><?php echo $campaign_latest->current_amount(); ?></span>
									</div>
									<div class="project_list_box_dataline_right_line2">
										<p>
											Time Left:
										</p><span><?php echo $campaign_latest->days_remaining(); ?> d</span>
									</div>
								</div>
							</div>
						</div>
						<div class="project_list_box_content_bg">
							<div class="project_list_box_content_bg2">
								<div class="project_list_box_content">
									<?php echo wp_trim_words(get_the_excerpt(), 23); ?>
								</div>
							</div>
							<div class="project_list_box_nav">
								<p>
									<?php echo $campaign_latest->location(); ?>
								</p>
							</div>
						</div>
					</div><?php endwhile; wp_reset_postdata(); ?>
				</div>
				<div class="simpleTabsContent">
					<?php 
						$ending_soon_ids = ending_soon( 4 );
						$ending_soon_query = new ATCF_Campaign_Query( array( 
							'posts_per_page' => 4,
							'post__in' => array(81, 74, 205, 82),
							'orderby' => 'post__in',
						) );

						while ( $ending_soon_query->have_posts() ) : $ending_soon_query->the_post();
							$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id(), '240' );
						$ending_soon_projects = new ATCF_Campaign( $post ); ?>
					<div class="project_list_box">
						<div class="project_list_box_title">
							<div class="project_list_box_img">
								<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail[0]; ?>" alt="" ></a>
							</div>
							<h3>
								<a href="<?php the_permalink(); ?>"><?php echo short_title('...', 6);?></a>
							</h3>
						</div>
						<div class="project_list_box_loader">
							<div class="project_list_box_loaderbar"><span style="width: <?php echo $ending_soon_projects->percent_completed(); ?>"></span></div>
						</div>
						<div class="project_list_box_dataline">
							<div class="project_list_box_dataline_left">
								<p>
									Backers
								</p><span><?php echo $ending_soon_projects->backers_count(); ?></span>
							</div>
							<div class="project_list_box_dataline_right">
								<div class="project_list_box_dataline_right_top">
									<div class="project_list_box_dataline_right_line1">
										<p>
											Pledged:
										</p><span><?php echo $ending_soon_projects->current_amount(); ?></span>
									</div>
									<div class="project_list_box_dataline_right_line2">
										<p>
											Time Left:
										</p><span><?php echo $ending_soon_projects->days_remaining(); ?> d</span>
									</div>
								</div>
							</div>
						</div>
						<div class="project_list_box_content_bg">
							<div class="project_list_box_content_bg2">
								<div class="project_list_box_content">
									<?php echo wp_trim_words(get_the_excerpt(), 23); ?>
								</div>
							</div>
							<div class="project_list_box_nav">
								<p>
									<?php echo $ending_soon_projects->location(); ?>
								</p>
							</div>
						</div>
					</div><?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>