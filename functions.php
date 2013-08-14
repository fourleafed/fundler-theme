<?php
/*
Author: MandLoys
URL: http://themeforest.net/user/MandLoys
*/
require_once 'library/fundler.php';
add_image_size( '360', 360, 360, true );
add_image_size( '240', 240, 240, true );
add_image_size( '120', 120, 120, true );
add_image_size( '240-120', 240, 120, true );
add_image_size( '120-240', 120, 240, true );
add_image_size( 'blog-image', 675, 350, true );
add_image_size( 'blog-single-image', 750, 350, true );

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $defaults );

function customizer_menu() {
	add_theme_page( 'Customize Fundler', 'Customize Fundler', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'customizer_menu' );

function fundler_customize_register( $wp_customize ) {

	// COLORS

	$colors = array();
	$colors[] = array(
		'slug'=>'header_bgcolor',
		'default' => '#fff',
		'label' => 'Header Background Color'
	);
	$colors[] = array(
		'slug'=>'menu_font_color',
		'default' => '#343d3c',
		'label' => 'Menu Font Color'
	);
	$colors[] = array(
		'slug'=>'menu_font_secondary_color',
		'default' => '#fff',
		'label' => 'Sub Menu Font Color'
	);
	$colors[] = array(
		'slug'=>'link_color',
		'default' => '#4daf7c',
		'label' => 'Link Color'
	);
	$colors[] = array(
		'slug'=>'link_button_color',
		'default' => '#ffffff',
		'label' => 'Link Button Color'
	);
	$colors[] = array(
		'slug'=>'footer_link_color',
		'default' => '#fff',
		'label' => 'Footer Link Color'
	);
	$colors[] = array(
		'slug'=>'button_primary_color',
		'default' => '#4daf7c',
		'label' => 'Button Primary Color'
	);
	$colors[] = array(
		'slug'=>'button_secondary_color',
		'default' => '#4ed790',
		'label' => 'Button Secondary Color'
	);
	$colors[] = array(
		'slug'=>'button_hover_color',
		'default' => '#1a6e42',
		'label' => 'Button Hover Color'
	);
	$colors[] = array(
		'slug'=>'button_sep1_color',
		'default' => '#3f9a6b',
		'label' => 'Button Separate One Color'
	);
	$colors[] = array(
		'slug'=>'button_sep2_color',
		'default' => '#56ea9d',
		'label' => 'Button Separate Two Color'
	);
	$colors[] = array(
		'slug'=>'site_primary_color',
		'default' => '#e25331',
		'label' => 'Site Primary Color'
	);
	$colors[] = array(
		'slug'=>'site_secondary_color',
		'default' => '#c53513',
		'label' => 'Site Secondary Color'
	);
	$colors[] = array(
		'slug'=>'site_highlight_primary_color',
		'default' => '#4daf7c',
		'label' => 'Site Highlight Primary Color'
	);
	$colors[] = array(
		'slug'=>'site_highlight_secondary_color',
		'default' => '#167165',
		'label' => 'Site Highlight Secondary Color'
	);

	foreach ( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option',
				'capability' => 'edit_theme_options',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'],
				array( 'label' => $color['label'],
					'section' => 'colors',
					'settings' => $color['slug'] )
			)
		);
	}

	// LOGO

	$wp_customize->add_section( 'fundler_logo', array(
			'title'          => 'Fundler Logo',
			'priority'       => 10,
		) );

	$wp_customize->add_setting( 'fundler_logo', array(
			'transport'  => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fundler_logo', array(
				'label'    => __( 'Logo', 'fundler' ),
				'section'  => 'fundler_logo',
				'settings' => 'fundler_logo',
			) ) );

	//INFORMATIONAL BAR

	$wp_customize->add_section( 'infobar_settings', array(
			'title'          => 'InfoBar Settings',
			'priority'       => 40,
		) );

	$wp_customize->add_setting( 'infobar_switch', array(
			'default'  => 'on',
			'transport'  => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_switch', array(
			'label'      => __( 'InfoBar Switch', 'fundler' ),
			'section'    => 'infobar_settings',
			'settings'   => 'infobar_switch',
			'type'       => 'radio',
			'choices'    => array(
				'on' => 'On',
				'off' => 'Off',
			),

			'priority'       => 10,
		) );

	$wp_customize->add_setting( 'infobar_left_icon', array(
			'transport'  => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'infobar_left_icon', array(
				'label'    => __( 'InfoBar Left Icon', 'fundler' ),
				'section'  => 'infobar_settings',
				'settings' => 'infobar_left_icon',
			) ) );

	$wp_customize->add_setting( 'infobar_left_title', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_left_title', array(
			'label'  => 'InfoBar Left Title',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_left_title',
			'priority' => 20,
		) );

	$wp_customize->add_setting( 'infobar_left_desc', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_left_desc', array(
			'label'  => 'InfoBar Left Description',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_left_desc',
			'priority' => 30,
		) );

	$wp_customize->add_setting( 'infobar_left_button', array(
			'default'=> '',
			'transport' => 'postMessage'
		) );

	$wp_customize->add_control( 'infobar_left_button', array(
			'label'  => 'InfoBar Left Button Text',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_left_button',
			'priority' => 40,
		) );

	$wp_customize->add_setting( 'infobar_left_link', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_left_link', array(
			'label'  => 'InfoBar Left Link',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_left_link',
			'priority' => 50,
		) );

	$wp_customize->add_setting( 'infobar_right_icon', array(
			'transport'  => 'postMessage',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'infobar_right_icon', array(
				'label'    => __( 'InfoBar Right Icon', 'fundler' ),
				'section'  => 'infobar_settings',
				'settings' => 'infobar_right_icon',
			) ) );

	$wp_customize->add_setting( 'infobar_right_title', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_right_title', array(
			'label'  => 'InfoBar Right Title',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_right_title',
			'priority' => 60,
		) );

	$wp_customize->add_setting( 'infobar_right_desc', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_right_desc', array(
			'label'  => 'InfoBar Right Description',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_right_desc',
			'priority' => 70,
		) );

	$wp_customize->add_setting( 'infobar_right_button', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_right_button', array(
			'label'  => 'InfoBar Right Button Text',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_right_button',
			'priority' => 80,
		) );

	$wp_customize->add_setting( 'infobar_right_link', array(
			'default'=> '',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'infobar_right_link', array(
			'label'  => 'InfoBar Right Link',
			'section' => 'infobar_settings',
			'type'  => 'text',
			'settings' => 'infobar_right_link',
			'priority' => 90,
		) );

	// HOME PAGE QUOTE

	$wp_customize->add_section( 'home_page_quote_settings', array(
			'title'          => 'Home Page Quote',
			'priority'       => 30,
		) );

	$wp_customize->add_setting( 'home_page_quote', array(
			'default'=> 'Next generation startup culture is fueled by crowdfunding sites.',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'home_page_quote', array(
			'label'  => 'Home Page Quote',
			'section' => 'home_page_quote_settings',
			'type'  => 'text',
			'settings' => 'home_page_quote',
			'priority' => 10,
		) );

	// SOCIAL

	$wp_customize->add_section( 'social_settings', array(
			'title'          => 'Header Social Settings',
			'priority'       => 40,
		) );

	$wp_customize->add_setting( 'facebook_switch', array(
			'default'=> 'on',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'facebook_switch', array(
			'label'      => __( 'Facebook Switch', 'fundler' ),
			'section'    => 'social_settings',
			'settings'   => 'facebook_switch',
			'type'       => 'radio',
			'choices'    => array(
				'on' => 'On',
				'off' => 'Off',
			),

			'priority'       => 10,
		) );

	$wp_customize->add_setting( 'facebook_url', array(
			'default'=> '',
		) );

	$wp_customize->add_control( 'facebook_url', array(
			'label'   => 'Facebook Page Full URL (http://...)',
			'section' => 'social_settings',
			'type'    => 'text',
			'settings'   => 'facebook_url',
			'priority'       => 20,
		) );

	$wp_customize->add_setting( 'twitter_switch', array(
			'default'=> 'on',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'twitter_switch', array(
			'label'      => __( 'Twitter Switch', 'fundler' ),
			'section'    => 'social_settings',
			'settings'   => 'twitter_switch',
			'type'       => 'radio',
			'choices'    => array(
				'on' => 'On',
				'off' => 'Off',
			),
			'priority'       => 30,
		) );

	$wp_customize->add_setting( 'twitter_url', array(
			'default'=> '',
		) );

	$wp_customize->add_control( 'twitter_url', array(
			'label'   => 'Twitter Profile Full URL (http://...)',
			'section' => 'social_settings',
			'type'    => 'text',
			'settings'   => 'twitter_url',
			'priority'       => 40,
		) );

	$wp_customize->add_setting( 'gplus_switch', array(
			'default'=> 'on',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'gplus_switch', array(
			'label'      => __( 'Google+ Switch', 'fundler' ),
			'section'    => 'social_settings',
			'settings'   => 'gplus_switch',
			'type'       => 'radio',
			'choices'    => array(
				'on' => 'On',
				'off' => 'Off',
			),
			'priority'       => 50,
		) );

	$wp_customize->add_setting( 'gplus_url', array(
			'default'=> '',
		) );

	$wp_customize->add_control( 'gplus_url', array(
			'label'   => 'Google+ Profile Full URL (http://...)',
			'section' => 'social_settings',
			'type'    => 'text',
			'settings'   => 'gplus_url',
			'priority'       => 60,
		) );

	$wp_customize->add_setting( 'linkedin_switch', array(
			'default'=> 'on',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'linkedin_switch', array(
			'label'      => __( 'LinkedIn Switch', 'fundler' ),
			'section'    => 'social_settings',
			'settings'   => 'linkedin_switch',
			'type'       => 'radio',
			'choices'    => array(
				'on' => 'On',
				'off' => 'Off',
			),
			'priority'       => 70,
		) );

	$wp_customize->add_setting( 'linkedin_url', array(
			'default'=> '',
		) );

	$wp_customize->add_control( 'linkedin_url', array(
			'label'   => 'LinkedIn Profile Full URL (http://...)',
			'section' => 'social_settings',
			'type'    => 'text',
			'settings'   => 'linkedin_url',
			'priority'       => 80,
		) );

	$wp_customize->add_setting( 'youtube_switch', array(
			'default'=> 'on',
			'transport' => 'postMessage',
		) );

	$wp_customize->add_control( 'youtube_switch', array(
			'label'      => __( 'YouTube Switch', 'fundler' ),
			'section'    => 'social_settings',
			'settings'   => 'youtube_switch',
			'type'       => 'radio',
			'choices'    => array(
				'on' => 'On',
				'off' => 'Off',
			),
			'priority'       => 90,
		) );

	$wp_customize->add_setting( 'youtube_url', array(
			'default'=> '',
		) );

	$wp_customize->add_control( 'youtube_url', array(
			'label'   => 'YouTube Profile Full URL (http://...)',
			'section' => 'social_settings',
			'type'    => 'text',
			'settings'   => 'youtube_url',
			'priority'       => 100,
		) );

	// END SOCIAL

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';

	$wp_customize->remove_section( 'background_image' );

}
add_action( 'customize_register', 'fundler_customize_register' );

// INSERT CUSTOM CSS INTO HEADER
function header_css() {
?>
	<style>
		.header { background-color:  <?php echo get_option( 'header_bgcolor' ); ?>; }
		.logo a,.homepage_featured_content_right_title a { color:  <?php echo get_option( 'link_color' ); ?>; }
		.widget ul li::before,.widget ul li a,.homepage_news_box_left a:hover,.projects_sidebar_content ul li,.projects_sidebar_content ul a,a:hover,a:visited:hover,a:focus,a:visited:focus,a,a:visited,.blog_post_single_data a,.blog_post_single_data2 a,.widget ul li::before,.projects_sidebar_content ul li::before{color:  <?php echo get_option( 'link_color' ); ?>;}
		.footer_widget ul li a {color:  <?php echo get_option( 'footer_link_color' ); ?>;}
		.button,.button:visited,.button:active,.button:visited:active,.button:focus,.button:visited:focus,.top_info_line_box_button a {background-color:<?php echo get_option( 'button_primary_color' ); ?>;border-bottom: 4px solid <?php echo get_option( 'button_secondary_color' ); ?>;}
		.button:hover,.button:visited:hover{background-color:<?php echo get_option( 'button_hover_color' ); ?>;border-bottom: 4px solid <?php echo get_option( 'button_secondary_color' ); ?>;}
		.bigcontainer3 {border-top:4px solid <?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.bigcontainer4_color {background-color:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.top_info_line_box_button a:hover{background-color:<?php echo get_option( 'button_hover_color' ); ?>;}
		.nav li a {color: <?php echo get_option( 'menu_font_color' ); ?>;}
		.nav li a:hover {background:<?php echo get_option( 'button_primary_color' ); ?>;}
		.nav li ul li a, .homepage_browse_content_buttons a{color: <?php echo get_option( 'menu_font_secondary_color' ); ?>;}
		.nav li ul li a:hover, .homepage_browse_content_buttons a:hover {color: <?php echo get_option( 'menu_font_secondary_color' ); ?>;}
		.nav li ul.sub-menu li,.nav li ul.children li {background:<?php echo get_option( 'button_primary_color' ); ?>;}
		.nav li ul.sub-menu li a:hover,.nav li ul.children li a:hover, .nav li ul.sub-menu li:hover,.nav li ul.children li:hover{background:<?php echo get_option( 'button_hover_color' ); ?>;}
		.homepage_statbox_1, .blog_post_single_title_1, .blog_post_single_title_1_center {background-color:<?php echo get_option( 'site_primary_color' ); ?>;}
		.homepage_statbox_2, .blog_post_single_title_2 {background-color:<?php echo get_option( 'site_secondary_color' ); ?>;}
		.homepage_statbox_1_right {text-shadow:1px 1px <?php echo get_option( 'site_shadow_color' ); ?>;}
		.homepage_statbox_3_list1,.project_sb_date_rem,.project_money_data1,ul.simpleTabsNavigation li a:hover,ul.simpleTabsNavigation li a.current, .project_sb_date_rem::before, .project_sb_date_rem, .project_money_data1 {	color:<?php echo get_option( 'site_primary_color' ); ?>;}
		..register_block input { border:1px solid <?php echo get_option( 'site_highlight_primary_color' ); ?>; }
		.homepage_statbox_3_list3,.homepage_featured_content_left_data,.project_small_excerpt a,.project_small_excerpt a:hover, .page_404 h1.big404, .content_404:before, .all_categories_list ul li span {color:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.browse_search_input input{border:1px solid <?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.browse_search_submit input,.blog_post_date_bg2,.project_image_bg,.project_list_box_title,.footer_widget #searchform #searchsubmit, .all_categories_list ul li span::after {background-color:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.project_list_box_loaderbar span,.homepage_featured_title::before {background:<?php echo get_option( 'site_primary_color' ); ?>;}
		.project_list_box_dataline_left, .top_social ul li:hover {background:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.homepage_news {border-top:4px solid <?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.blog_post_date, .blog_post_single_title_color {background:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.blog_post_date_bg2 {background:<?php echo get_option( 'site_highlight_secondary_color' ); ?>;}
		.blog_post_content_box_bottomline a, .atcf-submit-campaign-submit input, input.button-primary, .homepage_browse_button a,.homepage_browse_button a:visited{background:<?php echo get_option( 'button_primary_color' ); ?>;border-bottom: 4px solid <?php echo get_option( 'button_secondary_color' ); ?>;}
		.blog_post_content_box_bottomline a:hover, .top_info_line_box_button a:hover, .button a:hover , {background-color:<?php echo get_option( 'button_hover_color' ); ?>;}
		 .homepage_browse_button a:hover{background:<?php echo get_option( 'button_hover_color' ); ?>;}
		.project_author_image_data,ul.simpleTabsNavigation li {background: <?php echo get_option( 'site_primary_color' ); ?>;}
		.fundler_page_navi li:hover,.fundler_page_navi li:focus,.fundler_page_navi li a:hover,.fundler_page_navi li a:focus,.fundler_page_navi li.bpn-current,.widget #searchform #searchsubmit, { background:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.headercart a, .homepage_browse_button a, .homepage_browse_button a:hover, .homepage_browse_button a:visited, .simpleTabs ul li.current a, .simpleTabs ul li.current a:hover, .simpleTabs ul li.current a:active {{ color:  <?php echo get_option( 'link_button_color' ); ?>; }
		ul.atcf-profile-campaigns li{
			border-left:2px solid <?php echo get_option( 'site_highlight_primary_color' ); ?>;
		}
		ul.atcf-profile-campaigns li ul li, .content_404_search_submit input{background:<?php echo get_option( 'site_highlight_primary_color' ); ?>;}
		.nav li ul.sub-menu li,
		.nav li ul.children li { border-bottom:1px solid <?php echo get_option( 'button_sep1_color' ); ?>;
  		border-top:1px solid <?php echo get_option( 'button_sep2_color' ); ?>;	}
		.widget #searchform input,.footer_widget #searchform input, .content_404_search_input input{ border:1px solid <?php echo get_option( 'site_highlight_primary_color' ); ?>; }
		ul.simpleTabsNavigation {
			background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxsaW5lYXJHcmFkaWVudCBpZD0iZzEiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB4MT0iMCUiIHkxPSIwJSIgeDI9IjAlIiB5Mj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwLjkzIiBzdG9wLWNvbG9yPSIjZWRlY2ViIi8+PHN0b3Agb2Zmc2V0PSIwLjkzIiBzdG9wLWNvbG9yPSIjZWRlY2ViIi8+PC9saW5lYXJHcmFkaWVudD48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2cxKSIgLz48L3N2Zz4=);
			background-image: -webkit-gradient(linear, center top, center bottom, color-stop(93%, #edeceb), color-stop(93%, <?php echo get_option( 'site_primary_color' ); ?>));
			background-image: -webkit-linear-gradient(top, #edeceb 93%, <?php echo get_option( 'site_primary_color' ); ?> 78%);
			background-image: -moz-linear-gradient(top, #edeceb 93%, <?php echo get_option( 'site_primary_color' ); ?> 78%);
			background-image: -ms-linear-gradient(top, #edeceb 93%, <?php echo get_option( 'site_primary_color' ); ?> 78%);
			background-image: -o-linear-gradient(top, #edeceb 93%, <?php echo get_option( 'site_primary_color' ); ?> 78%);
			background-image: linear-gradient(to bottom, #edeceb 93%, <?php echo get_option( 'site_primary_color' ); ?> 78%);
 		}
	</style>
<?php
}
add_action( 'wp_head', 'header_css' );

function fundler_customize_preview_js() {
	wp_enqueue_script( 'fundler-customizer', get_template_directory_uri() . '/customizer.js', array( 'jquery', 'customize-preview' ), '20130809', true );
}
add_action( 'customize_preview_init', 'fundler_customize_preview_js' );

function fundler_register_sidebars() {
	register_sidebar( array(
			'id' => 'sidebar1',
			'name' => __( 'Sidebar 1', 'fundler' ),
			'description' => __( 'The first (primary) sidebar.', 'fundler' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
		) );

	register_sidebar( array(
			'id' => 'footerwidgets',
			'name' => __( 'Footer Widgets', 'fundler' ),
			'description' => __( 'Footer Widgets.', 'fundler' ),
			'before_widget' => '<div id="%1$s" class="footer_widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="footer_widgettitle">',
			'after_title' => '</h4>',
		) );
}

function fundler_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
	$bgauthemail = get_comment_author_email();
?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php printf( __( '<cite class="fn">%s</cite>', 'fundler' ), get_comment_author_link() ) ?>
				<time datetime="<?php echo comment_time( 'Y-m-j' ); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time( __( 'F jS, Y', 'fundler' ) ); ?> </a></time>
				<?php edit_comment_link( __( '(Edit)', 'fundler' ), '  ', '' ) ?>
			</header>
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'fundler' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
}


function excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt )>=$limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ).'...';
	} else {
		$excerpt = implode( " ", $excerpt );
	}
	$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
	return $excerpt;
}

function content( $limit ) {
	$content = explode( ' ', get_the_content(), $limit );
	if ( count( $content )>=$limit ) {
		array_pop( $content );
		$content = implode( " ", $content ).'...';
	} else {
		$content = implode( " ", $content );
	}
	$content = preg_replace( '/\[.+\]/', '', $content );
	$content = apply_filters( 'the_content', $content );
	$content = str_replace( ']]>', ']]&gt;', $content );
	return $content;
}

function short_title( $after = '', $length ) {
	$mytitle = explode( ' ', get_the_title(), $length );
	if ( count( $mytitle )>=$length ) {
		array_pop( $mytitle );
		$mytitle = implode( " ", $mytitle ). $after;
	} else {
		$mytitle = implode( " ", $mytitle );
	}
	return $mytitle;
}


// Social Counts

function fb_count( $value='' ) {
	$url='http://api.facebook.com/method/fql.query?query=SELECT fan_count FROM page WHERE';
	if ( is_numeric( $value ) ) { $qry=' page_id="'.$value.'"';} //If value is a page ID
	else {$qry=' username="'.$value.'"';} //If value is not a ID.
	$xml = @simplexml_load_file( $url.$qry ) or die ( "invalid operation" );
	$fb_count = $xml->page->fan_count;
	return $fb_count;
}

// Google+ Follower Count
function gplus_shares( $url ) {

	// G+ DATA
	$ch = curl_init();
	curl_setopt( $ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ" );
	curl_setopt( $ch, CURLOPT_POST, 1 );
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p",
	"params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},
	"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]' );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, array( 'Content-type: application/json' ) );

	$result = curl_exec( $ch );
	curl_close( $ch );

	$json = json_decode( $result, true );
	return intval( $json[0]['result']['metadata']['globalCounts']['count'] );

}

// Twitter Count

function my_followers_count( $screenName ) {

    $consumerKey = ot_get_option( 'twitter_consumer_key' );
    $consumerSecret = ot_get_option( 'twitter_consumer_secret' );
    $token = get_option('cfTwitterToken');
 
    // get follower count from cache
    $numberOfFollowers = get_transient('cfTwitterFollowers');
 
    // cache version does not exist or expired
    if (false === $numberOfFollowers) {
        // getting new auth bearer only if we don't have one
        if(!$token) {
            // preparing credentials
            $credentials = $consumerKey . ':' . $consumerSecret;
            $toSend = base64_encode($credentials);
 
            // http post arguments
            $args = array(
                'method' => 'POST',
                'httpversion' => '1.1',
                'blocking' => true,
                'headers' => array(
                    'Authorization' => 'Basic ' . $toSend,
                    'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );
 
            add_filter('https_ssl_verify', '__return_false');
            $response = wp_remote_post('https://api.twitter.com/oauth2/token', $args);
 
            $keys = json_decode(wp_remote_retrieve_body($response));
 
            if($keys) {
                // saving token to wp_options table
                update_option('cfTwitterToken', $keys->access_token);
                $token = $keys->access_token;
            }
        }
        // we have bearer token wether we obtained it from API or from options
        $args = array(
            'httpversion' => '1.1',
            'blocking' => true,
            'headers' => array(
                'Authorization' => "Bearer $token"
            )
        );
 
        add_filter('https_ssl_verify', '__return_false');
        $api_url = "https://api.twitter.com/1.1/users/show.json?screen_name=$screenName";
        $response = wp_remote_get($api_url, $args);
 
        if (!is_wp_error($response)) {
            $followers = json_decode(wp_remote_retrieve_body($response));
            $numberOfFollowers = $followers->followers_count;
        } else {
            // get old value and break
            $numberOfFollowers = get_option('cfNumberOfFollowers');
            // uncomment below to debug
            //die($response->get_error_message());
        }
 
        // cache for an hour
        set_transient('cfTwitterFollowers', $numberOfFollowers, 1*60*60);
        update_option('cfNumberOfFollowers', $numberOfFollowers);
    }
 
    return $numberOfFollowers;
}

// Custom Widgets

add_action( 'widgets_init', 'register_my_widget' );

function register_my_widget() {
	register_widget( 'Fundler_Social_Widget' );
}

class Fundler_Social_Widget extends WP_Widget {
	function Fundler_Social_Widget() {
		$widget_ops = array( 'classname' => 'social_widget', 'description' => __( 'Social Counter Widget', 'fundler' ) );

		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'social-widget' );

		$this->WP_Widget( 'social-widget', __( 'Fundler Social Counter Widget', 'fundler' ), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {

		extract( $args );

		//Our variables from the widget settings.
		$title = apply_filters( 'widget_title', $instance['title'] );
		$name = $instance['name'];
		$show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
		$url='http://api.facebook.com/method/fql.query?query=SELECT fan_count FROM page WHERE';
		if ( is_numeric( $name ) ) { $qry=' page_id="'.$name.'"';} //If value is a page ID
		else {$qry=' username="'.$name.'"';} //If value is not a ID.
		$xml = @simplexml_load_file( $url.$qry ) or die ( "invalid operation" );
		$fb_count = $xml->page->fan_count;

		echo $before_widget;

		// Display the widget title
		if ( $title )
			echo $before_title . $title . $after_title;

		//Display the name
		if ( $name )
			printf( '<div class="fundler_facebook_widget"><p>' . __( ' %1$s Likes', 'fundler' ) . '</p></div>', $fb_count );


		if ( $show_info )
			printf( $name );


		echo $after_widget;
	}

	//Update the widget

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['name'] = strip_tags( $new_instance['name'] );
		$instance['show_info'] = $new_instance['show_info'];

		return $instance;
	}


	function form( $instance ) {

		//Set up some default widget settings.
		$defaults = array( 'title' => __( 'Share The Love', 'fundler' ), 'name' => __( 'MandLoys', 'fundler' ), 'show_info' => true );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>


	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget Title:', 'Share The Love' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
	</p>


	<p>
		<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Facebook Name:', 'Mandloys' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" style="width:100%;" />
	</p>
	( Example: https://www.facebook.com/YOURFBNAME )


<?php
	}
}

// Shortcodes

function fundler_full_text_shortcode( $atts, $content = null ) {
	return '<div class="about_full_text">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'full_text', 'fundler_full_text_shortcode' );

function fundler_quote_shortcode( $atts, $content = null ) {
	return '<div class="about_quote">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'quote', 'fundler_quote_shortcode' );

function fundler_image_fullwidth_shortcode( $atts, $content = null ) {
	return '<div class="center_image_fullwidth">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'center_image_fullwidth', 'fundler_image_fullwidth_shortcode' );

function fundler_small_text_center_shortcode( $atts, $content = null ) {
	return '<div class="about_small_text_center">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'small_text_center', 'fundler_small_text_center_shortcode' );

function fundler_small_title_shortcode( $atts, $content = null ) {
	return '<div class="about_small_title">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'small_title', 'fundler_small_title_shortcode' );

function fundler_small_text_shortcode( $atts, $content = null ) {
	return '<div class="about_small_text">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'small_text', 'fundler_small_text_shortcode' );

function fundler_third_width_shortcode( $atts, $content = null ) {
	return '<div class="third_width">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'third_width', 'fundler_third_width_shortcode' );

function fundler_small_image_shortcode( $atts, $content = null ) {
	return '<div class="about_small_image">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'small_image', 'fundler_small_image_shortcode' );

function fundler_campaign_video_shortcode( $atts, $content = null ) {
	return '<div class="campaign_videobox">' . do_shortcode( $content ) . '</div>';
}
add_shortcode( 'videobox', 'fundler_campaign_video_shortcode' );

function arr1() {
  return '<div class="shortcode_arrow1"></div>';
}
add_shortcode('arrow1', 'arr1');

function arr2() {
  return '<div class="shortcode_arrow2"></div>';
}
add_shortcode('arrow2', 'arr2');

function checklist($atts, $content = null) {
   return '<div class="shortcode_check">' . do_shortcode($content) . '</div>';
}
add_shortcode('checklist', 'checklist');

function featured($atts, $content = null) {
   return '<div class="shortcode_featured"><div class="shortcode_featured2">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('featured', 'featured'); 


/************* SEARCH FORM LAYOUT *****************/

// Search Form
function fundler_wpsearch( $form ) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'fundler' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__( 'Search the Site...', 'fundler' ).'" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
}

// Crowd Funding Features

function crowdfunding_support() {
	add_theme_support( 'appthemer-crowdfunding', array(
			'campaign-edit'                 => true,
			'campaign-featured-image'  => true,
			'campaign-video'    => true,
			'campaign-widget'    => true
		) );
}
add_action( 'after_setup_theme', 'crowdfunding_support' );

function fundler_campaign_contribute_options( $prices, $type, $download_id ) {
	$campaign = new ATCF_Campaign( $download_id );
?>
	<div class="edd_price_options <?php echo $campaign->is_active() ? 'active' : 'expired'; ?>">
		<ul>
			<?php foreach ( $prices as $key => $price ) : ?>
				<?php
		$amount  = $price[ 'amount' ];
	$limit   = isset ( $price[ 'limit' ] ) ? $price[ 'limit' ] : '';
	$bought  = isset ( $price[ 'bought' ] ) ? $price[ 'bought' ] : 0;
	$allgone = false;

	if ( $bought == absint( $limit ) && '' != $limit )
		$allgone = true;

	if ( edd_use_taxes() && edd_taxes_on_prices() )
		$amount += edd_calculate_tax( $amount );
?>
				<li <?php if ( $allgone ) : ?>class="inactive"<?php endif; ?> data-price="<?php echo edd_sanitize_amount( edd_format_amount( $amount ) ); ?>">
					<div class="clear">
						<h3><label><?php
	if ( $campaign->is_active() )
		if ( ! $allgone )
			printf(
				'<input type="radio" name="edd_options[price_id][]" id="%1$s" class="%2$s edd_price_options_input" value="%3$s"/>',
				esc_attr( 'edd_price_option_' . $download_id . '_' . $key ),
				esc_attr( 'edd_price_option_' . $download_id ),
				esc_attr( $key )
			);
		?> <?php printf( __( 'Pledge %s', 'fundify' ), edd_currency_filter( edd_format_amount( $amount ) ) ); ?></label></h3>

						<div class="backer-count">
							<i class="icon-user"></i> <?php printf( _n( '%d Backer', '%d Backers', $bought, 'number of backers', 'fundify' ), $bought ); ?>

							<?php if ( '' != $limit && ! $allgone ) : ?>
								<small class="limit"><?php printf( __( 'Limited (%d of %d left)', 'fundify' ), $limit - $bought, $limit ); ?></small>
							<?php elseif ( $allgone ) : ?>
								<small class="gone"><?php _e( 'All gone!', 'fundify' ); ?></small>
							<?php endif; ?>
						</div>
					</div>
					<?php echo wpautop( esc_html( $price[ 'name' ] ) ); ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php
}
add_action( 'atcf_campaign_contribute_options', 'fundler_campaign_contribute_options', 10, 3 );

function get_all_campaign_ids() {
	return get_posts( array(
			'numberposts'   => -1, // get all posts.
			'post_type' => 'download', // only get Campaign post type
			'fields'        => 'ids', // only get post IDs.
		) );
}

function get_all_backers() {

	$all_campaign_ids = get_all_campaign_ids();
	$total   = 0;

	foreach ( $all_campaign_ids as $campaign_id ) {
		$prices  = edd_get_variable_prices( $campaign_id );

		foreach ( $prices as $price ) {
			$total = $total + ( isset ( $price[ 'bought' ] ) ? $price[ 'bought' ] : 0 );
		}
	}

	return $total;

}

function average_funding( $perbacker ) {
	global $edd_logs;
	$all_campaign_ids = get_all_campaign_ids();
	$backers_count = get_all_backers();
	$backed_posts = array();
	$backed_posts_number = array();

	foreach ( $all_campaign_ids as $campaign_id ) {
		$backers = $edd_logs->get_connected_logs( array(
				'post_parent'    => $campaign_id,
				'log_type'       => atcf_has_preapproval_gateway() ? 'preapproval' : 'sale',
				'post_status'    => array( 'publish' ),
				'posts_per_page' => -1
			) );
		for ( $i=0; $i < count( $backers ); $i++ ) {
			if ( !empty( $backers[$i] -> post_parent ) )
				$backed_posts[] = $backers[$i] -> post_parent;
		}
	}
	for ( $i=0; $i < count( $backed_posts ); $i++ ) {
		if ( !in_array( $backed_posts[$i], $backed_posts_number ) )
			$backed_posts_number[] = $backed_posts[$i];
	}
	$final_backed_posts_number = count( $backed_posts_number );
	$total_funds = edd_get_total_earnings();
	$average_funding_per_campaign = $total_funds / $final_backed_posts_number;
	$average_funding_per_backer = $total_funds / $backers_count;
	if ( $perbacker ) {
		return edd_currency_filter( edd_format_amount( $average_funding_per_backer ) );
	} else {
		return edd_currency_filter( edd_format_amount( $average_funding_per_campaign ) );
	}

}

function ending_soon( $number ) {
	$all_campaign_ids = get_all_campaign_ids();
	$all_campaign_end_date = array();
	for ( $i=0; $i < count( $all_campaign_ids ); $i++ ) {
		$campaign_end_date = get_post_meta( $all_campaign_ids[$i], "campaign_end_date" );
		$all_campaign_end_date[$campaign_end_date[0]] = $all_campaign_ids[$i];
	}
	ksort( $all_campaign_end_date );
	$all_campaign_end_date_indexed = array_values( $all_campaign_end_date );
	$result = array();
	for ( $i=0; $i < $number ; $i++ ) {
		$result[] = $all_campaign_end_date_indexed[$i];
	}

	return $result;

}

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/library/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name'                  => 'Contact Form 7',
			'slug'                  => 'contact-form-7',
			'required'              => false,
		),
		array(
			'name'                  => 'OptionTree',
			'slug'                  => 'option-tree',
			'required'              => true,
		),


	);

	$theme_text_domain = 'fundler';

	$config = array(
		'domain'            => $theme_text_domain,
		'default_path'      => '',
		'parent_menu_slug'  => 'themes.php',
		'parent_url_slug'   => 'themes.php',
		'menu'              => 'install-required-plugins',
		'has_notices'       => true,
		'is_automatic'      => true,
		'message'           => '',
		'strings'           => array(
			'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
			'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

?>