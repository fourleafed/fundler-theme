<?php
/**
 * Template Name: Homepage 3
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
		<div class="homepage_line">
			<div class="homepage_stats">
				<div class="homepage_statboxbg">
					<div class="homepage_statbox_2">
						<div class="homepage_statbox_1">
							<div class="homepage_statbox_1_left">
								<p>
									Sum of Funds
								</p><span>Our Projects Received</span>
							</div>
							<div class="homepage_statbox_1_right">
								<?php echo edd_currency_filter( edd_format_amount( edd_get_total_earnings() ) ); ?>
							</div>
						</div>
					</div>
					<div class="homepage_statbox_3">
						<ul>
							<li>
								<div class="homepage_statbox_3_list1">
									<p>
										Backers
									</p><span>Who Chose Us</span>
								</div>
								<div class="homepage_statbox_3_list2">
									<?php echo get_all_backers(); ?>
								</div>
								<div class="homepage_statbox_3_list3">
									<?php echo count(get_users('blog_id=1')); ?> registered users
								</div>
							</li>
							<li>
								<div class="homepage_statbox_3_list1">
									<p>
										Number of
									</p><span>projects so far</span>
								</div>
								<div class="homepage_statbox_3_list2">
									<?php echo wp_count_posts( 'download' )->publish ; ?>
								</div>
								<div class="homepage_statbox_3_list3">
									<?php 
									$args = array(
										'orderby'            => 'count',
										'order'              => 'desc',
										'style'              => 'none',
										'title_li'           => '',
										'show_count'         => 1,
										'hide_empty'         => 1,
										'use_desc_for_title' => 1,
										'child_of'           => 0,
										'show_option_none'   => __('N/A'),
										'number'             => 1,
										'echo'               => 0,
										'depth'              => 0,
										'current_category'   => 0,
										'pad_counts'         => 0,
										'taxonomy'           => 'download_category',
										'walker'             => null
									);
									$top_category1 = wp_list_categories( $args ); 
									echo "Most in " . $top_category1;
									?> 
								</div>
							</li>
							<li>
								<div class="homepage_statbox_3_list1">
									<p>
										Average
									</p><span>funds / project</span>
								</div>
								<div class="homepage_statbox_3_list2">
									<?php echo average_funding( false ); ?>
								</div>
								<div class="homepage_statbox_3_list3">
									<?php echo average_funding( true ); ?> per backer
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="homepage_browse">
				<div class="homepage_browse_top">
					Top Project Categories
				</div>
				<div class="homepage_browse_content">
					<div class="homepage_browse_content_left"> <ul>
						<?php 
						$args = array(
							'orderby'            => 'count',
							'order'              => 'desc',
							'style'              => 'list',
							'title_li'           => '',
							'show_count'         => 1,
							'hide_empty'         => 1,
							'use_desc_for_title' => 1,
							'child_of'           => 0,
							'show_option_none'   => __('No categories'),
							'number'             => 5,
							'echo'               => 0,
							'depth'              => 0,
							'current_category'   => 0,
							'pad_counts'         => 0,
							'taxonomy'           => 'download_category',
							'walker'             => null
						);
						$top_categories = wp_list_categories( $args ); 
						$top_categories = preg_replace('~\((\d+)\)(?=\s*+<)~', '<span>+$1</span>', $top_categories);
						echo $top_categories;
						?> 
						</ul>
							
					</div>
				   
				</div>
				<div class="homepage_browse_button">
				   <a class="homepage_browsebutton" href="<?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'view_all_categories' ); ?>">View All Categories</a>
				</div>
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