<?php
/**
 * Template Name: Contact Page
 *
 */

get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contact_line">
	<div class="bigcontainer4">
		<div class="container">
			<div class="subpage_line">
				<div class="contact_corp">
					<?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'companyname' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="bigcontainer4_color">
		<div class="container">
			<div class="subpage_line">
				<div class="contact_box_left">
					<div class="contact_box_left_title">
						<?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'address_cta' ); ?>
					</div>
					<div class="contact_box_left_list">
						<ul>
							<li id="contact_option1"><?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'address' ); ?></li>
							<li id="contact_option2"><?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'phone_number' ); ?></li>
							<li id="contact_option3"><?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'email_address' ); ?></li>
						</ul>
					</div>
					<div class="contact_box_left_title">
						<?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'contactus_cta' ); ?>
					</div>
					<div class="contact_box">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="contact_box_right">
					<div class="contact_box_right_abs">
						<div class="map_containerbg">
							<div class="map_container">
								<iframe width="400" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php if ( function_exists( 'ot_get_option' ) ) echo ot_get_option( 'gmaps_iframe' ); ?>"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bigcontainer4">
			<div class="container">
				<div class="subpage_line">
					<div class="fb_counter_box">
						<p><?php 
							if ( function_exists( 'ot_get_option' ) ) $facebook_username = ot_get_option( 'facebook_username' );
							echo fb_count($facebook_username);
							?>
						</p>
						<span>fans</span>
					</div>
					<div class="tw_counter_box">
						<p><?php echo my_followers_count('mandloys');?></p>
						<span>followers</span>
					</div>
					<div class="g_counter_box">
						<p><?php 
							if ( function_exists( 'ot_get_option' ) ) $gplus_profile_url = ot_get_option( 'gplus_profile_url' );
							echo gplus_shares($gplus_profile_url);
							?>
						<span>shares</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>