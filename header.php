<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<!-- Google Chrome Frame for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<!-- mobile meta-->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<!--[if IE]>
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<![endif]-->

	<meta name="msapplication-TileColor" content="#f01d4f">
	<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<script src="<?php echo get_template_directory_uri(); ?>/library/js/simpletabs_1.3.js"></script> 

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header bigcontainer" role="banner">
	<div id="inner-header" class="wrap clearfix">
		<div class="topheader">
			<?php if ( edd_get_cart_amount() != 0 ) { ?>
			<div class="headercart">
				<a href="<?php global $edd_options; echo get_permalink( $edd_options['purchase_page'] ); ?>">cart</a>
			</div>
			<?php } ?>
		<div class="top_search">
			<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
				<div class="top_search_input">
					<input type="text" size="" name="s" id="s" value="search here..." onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;"/>
				</div>
				<input type="submit" id="searchsubmit" value="" class="top_search_button" />
			</form>
		</div>
		<div class="top_social">
			<ul>
				<?php if ( get_theme_mod( 'gplus_switch' ) == "on") { ?>
				<li id="gplus_icon"><a href="<?php echo get_theme_mod( 'gplus_url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/topicon_g.png" alt=""></a></li>
				<?php } ?>
				<?php if ( get_theme_mod( 'linkedin_switch' ) == "on") { ?>
				<li id="linkedin_icon"><a href="<?php echo get_theme_mod( 'linkedin_url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/topicon_li.png" alt=""></a></li>
				<?php } ?>
				<?php if ( get_theme_mod( 'youtube_switch' ) == "on") { ?>
				<li id="youtube_icon"><a href="<?php echo get_theme_mod( 'youtube_url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/topicon_yt.png" alt=""></a></li>
				<?php } ?>
				<?php if ( get_theme_mod( 'twitter_switch' ) == "on") { ?>
				<li id="twitter_icon"><a href="<?php echo get_theme_mod( 'twitter_url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/topicon_tw.png" alt=""></a></li>
				<?php } ?>
				<?php if ( get_theme_mod( 'facebook_switch' ) == "on") { ?>
				<li id="facebook_icon"><a href="<?php echo get_theme_mod( 'facebook_url' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/topicon_fb.png" alt="" ></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<div class="bottomheader">
		<?php if ( get_theme_mod( 'fundler_logo' ) ) : ?>
    		<div class="logo_text">
        		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'fundler_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
    		</div>
		<?php else : ?>
        	<div class="logo_text"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
		<?php endif; ?>
			<nav role="navigation" class="top_header_nav">
				<a class="toggleMenu" href="#">Menu</a>
				<?php fundler_main_nav(); ?>
			</nav>
		</div>
	</div>
</header>