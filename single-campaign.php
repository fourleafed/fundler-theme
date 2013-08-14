<?php

global $wp_embed;

get_header();
		
?>

<div class="bigcontainer4">
		<div class="container">
			<div id="content">

				<div class="clearfix">
<?php while ( have_posts() ) : the_post(); $campaign = new ATCF_Campaign( $post->ID ); ?>
<div class="project_content_line">			
<div class="blog_post">
<div class="project_image_bg">
<div class="project_image"><?php if ( $campaign->video() ) : ?>
						<div class="project_video"><div class="project_videobox">
							<?php echo $wp_embed->run_shortcode( '[embed]' . $campaign->video() . '[/embed]' ); ?>
						</div></div>
					<?php else : ?>
						<?php the_post_thumbnail('blog-single-image'); ?>
					<?php endif; ?></div>
                    <h1><?php the_title() ;?></h1>
</div>

</div>

<div class="blog_sidebar">

<div class="project_sb_date"><?php printf( __( '%s'), get_the_date('') ); ?> - <?php printf( __( '%s'), $campaign->end_date('') ); ?></div>
<div class="project_sb_date_rem"><?php echo $campaign->days_remaining(); ?> <?php echo _n( $campaign->days_remaining(), 'day left', 'days left' ); ?></div>
<div class="project_small_excerpt"><?php //echo excerpt(26); ?>

<div class="project_list_box_loader">
                            <div class="project_list_box_loaderbar"><span style="width: <?php echo $campaign->percent_completed(); ?>"></span></div>
                        </div>

</div>
<div class="project_money_data">
<div class="project_money_data1"><p><?php echo $campaign->current_amount(); ?></p><span>Raised</span></div>
<div class="project_money_data2"><p></p><span>of <?php printf( __( '%s'), $campaign->goal() ); ?></span></div>
<?php if ( $campaign->is_active() )
							echo edd_get_purchase_link( array( 
								'download_id' => $post->ID,
								'class'       => '',
								'price'       => false,
								'text'        => __( 'Contribute Now', 'fundler' )
							) ); 
?>
</div>

</div>
<div class="project_content_line">			
<div class="blog_post">
<div class="project_content"><?php the_content(); ?>



<div class="project_content_updates"><div class="project_sb_title"><p>Latest</p><span>Updates</span></div>
<?php echo $campaign->updates() ?>
</div>
<?php comments_template(); ?>
</div>

</div>
<div class="blog_sidebar">
<div class="project_author_box">
<div class="project_sb_title"><p>About</p><span>The Author</span></div>
<div class="project_author_image"><?php
	$author_email = get_the_author_meta('email');
	echo get_avatar($author_email, '512');
?>
<div class="project_author_image_data"><p><?php if ( '' != $campaign->author() ) : ?>
			<?php printf( __( '%s', 'fundler' ), esc_attr( $campaign->author() ) ); ?>
			<?php endif; ?></p></div>
</div>
</div>



</div>
</div>
                        
                        </div> 

			</div> <!-- end #content -->
</div></div>

<?php endwhile; ?>


<?php get_footer(); ?>