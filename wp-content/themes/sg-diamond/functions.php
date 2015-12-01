<?php
/**
 * Functions and definitions
 *
 * @package WordPress
 * @subpackage SG Diamond
 * @since SG Diamond 1.0
*/

/**
 * Diamond setup.
 *
 * @since SG Diamond 1.0
 */
 
define( 'SGWINDOWCHILD', 'SGDiamond' );
  
function diamond_setup() {

	$defaults = sgwindow_get_defaults();

	load_child_theme_textdomain( 'sg-diamond', get_stylesheet_directory() . '/languages' );
	
	$args = array(
		'default-image'          => get_stylesheet_directory_uri() . '/img/header.jpg',
		'header-text'            => true,
		'default-text-color'     => 'ffffff',
		'width'                  => absint( sgwindow_get_theme_mod( 'size_image' ) ),
		'height'                 => absint( sgwindow_get_theme_mod( 'size_image_height' ) ),
		'flex-height'            => true,
		'flex-width'             => true,
	);
	add_theme_support( 'custom-header', $args );
	
	remove_action( 'sgwindow_empty_sidebar_top-default', 'sgwindow_the_top_sidebar_default', 20 );
	remove_action( 'sgwindow_empty_sidebar_top-portfolio-page', 'sgwindow_the_top_sidebar_default', 20 );
	remove_action( 'sgwindow_empty_sidebar_before_footer-home', 'sgwindow_the_footer_sidebar_widgets', 20 );
	remove_action( 'sgwindow_empty_sidebar_top-home', 'sgwindow_the_top_sidebar_widgets', 20 );
	remove_action( 'admin_menu', 'sgwindow_admin_page' );
	remove_action( 'sgwindow_header_top', 'sgwindow_header', 20 );
	remove_action( 'sgwindow_header_image', 'sgwindow_header_image', 20 );
	remove_action( 'sgwindow_empty_column_2-default', 'sgwindow_right_sidebar_default', 20 );

}
add_action( 'after_setup_theme', 'diamond_setup' );

/**
 * Layot BuilderColors.
 *
 * @since SG Diamond 1.0
 */
   
function diamond_setup_colors() {
	
	/* colors */
	global $sgwindow_colors_class;
	
	$section_id = 'main_colors';
	$section_priority = 10;
	$p = 10;
	
	$i = 'link_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link', 'sg-diamond'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#1e73be');
	$sgwindow_colors_class->set_color($i, 1, '#1e73be');
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
	
	$i = 'heading_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 heading', 'sg-diamond'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#000000');
	$sgwindow_colors_class->set_color($i, 1, '#000000');
	$sgwindow_colors_class->set_color($i, 2, '#000000');
	
	$i = 'heading_link';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('H1-H6 Link', 'sg-diamond'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#000000');	
	$sgwindow_colors_class->set_color($i, 1, '#000000');	
	$sgwindow_colors_class->set_color($i, 2, '#1e73be');
	
	$i = 'description_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Description', 'sg-diamond'), $p++, false);
	$sgwindow_colors_class->set_color($i, 0, '#ededed');	
	$sgwindow_colors_class->set_color($i, 1, '#ededed');	
	$sgwindow_colors_class->set_color($i, 2, '#ededed');	
	
	$i = 'hover_color';
	
	$sgwindow_colors_class->add_color($i, $section_id, __('Link Hover', 'sg-diamond'), $p++, false, 'refresh');
	$sgwindow_colors_class->set_color($i, 0, '#000000');
	$sgwindow_colors_class->set_color($i, 1, '#000000');
	$sgwindow_colors_class->set_color($i, 2, '#000000');
}
add_action( 'after_setup_theme', 'diamond_setup_colors', 100 );

/**
 * Enqueue parent and child scripts
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_styles() {
    wp_enqueue_style( 'sgwindow-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'diamond-style', get_stylesheet_uri(), array( 'sgwindow-style' ) );
	
	wp_enqueue_style( 'diamond-colors', get_stylesheet_directory_uri() . '/css/scheme-' . esc_attr( sgwindow_get_theme_mod( 'color_scheme' ) ) . '.css', array( 'sgwindow-style', 'sgwindow-colors' ) );
	
	// Adds JavaScript for handing the navigation menu 
	if ( '1' == sgwindow_get_theme_mod( 'is_sticky_second_menu' ) ) {
		wp_enqueue_script( 'sgwindow-sticky', get_stylesheet_directory_uri() . '/js/sticky.js', array( 'jquery' ), '201531', true );
	}
}
add_action( 'wp_enqueue_scripts', 'diamond_styles' );

/**
 * Set defaults
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_defaults( $defaults ) {

	$defaults['slider_height'] = '80';
	$defaults['slider_margin'] = '1';
	$defaults['slider_play'] = '1';
	$defaults['slider_content_type'] = '0';
	$defaults['slider_speed'] = '500';
	$defaults['slider_delay'] = '4000';
	
	$defaults['is_thumbnail_empty_icon'] = '1';
	
	$defaults['is_cat'] = '1';
	$defaults['is_author'] = '1';
	$defaults['is_date'] = '1';
	$defaults['is_views'] = '';
	$defaults['is_comments'] = '1';
	$defaults['blog_is_cat'] = '1';
	$defaults['blog_is_author'] = '1';
	$defaults['blog_is_date'] = '1';
	$defaults['blog_is_views'] = '';
	$defaults['blog_is_comments'] = '1';
	$defaults['blog_is_entry_meta'] = '1';

	$defaults['is_sticky_second_menu'] = '1';
	$defaults['site_style'] = 'full';
	$defaults['are_we_saved'] = '';
	$defaults['max_id'] = 0;
	
	$defaults['is_parallax_header'] = '1';
	
	$defaults['is_parallax_header'] = '1';
	$defaults['parallax_image_speed'] = 50;
	$defaults['parallax_image_height'] = 140;

	$defaults['is_header_on_front_page_only'] = '';
	$defaults['content_style'] = 'full';
	
	$defaults['is_show_top_menu'] = '';
	$defaults['is_show_footer_menu'] = '';
	$defaults['body_font'] = 'Abel';
	$defaults['heading_font'] = 'Abel';
	$defaults['header_font'] = 'Allerta Stencil';
	
	$defaults['body_font_size'] = '18';
	$defaults['heading_font_size'] = '24';
	$defaults['heading_weight'] = 'bold';
	
	$defaults['column_background_url'] = '';
	$defaults['logotype_url'] =  get_stylesheet_directory_uri() . '/img/logo.png';
	$defaults['post_thumbnail_size'] = '400';
	
	$defaults['width_site'] = '1920';
	$defaults['width_top_widget_area'] = '1260';
	$defaults['width_content_no_sidebar'] = '1260';	
	$defaults['width_content'] = '1260';
	$defaults['width_main_wrapper'] = '1260';
	$defaults['is_home_footer'] = '1';
	$defaults['front_page_style'] = 'no_content';
	
	/* portfolio: excerpt/content */
	$defaults['portfolio_style'] = 'no_content';
	
	/* Header Image size */
	$defaults['size_image'] = '1920';
	$defaults['size_image_height'] = '400';
	/* Header Image and top sidebar wrapper */
	$defaults['width_image'] = '1920';
		
	$defaults['width_column_1_left_rate'] = '50';
	$defaults['width_column_1_right_rate'] = '40';
	$defaults['width_column_1_rate'] = '24';
	$defaults['width_column_2_rate'] = '24';
	
	$defaults['scroll_button'] = 'right';
	
	$defaults['single_style'] = 'excerpt';

	$defaults['defined_sidebars']['home'] = array(
											'use' => '1', 
											'callback' => 'is_front_page', 
											'param' => '', 
											'title' => __( 'Home', 'sg-diamond' ),
											'sidebar-top' => '1',
											'sidebar-before-footer' => '1',
											'column-1' => '1',
											'column-2' => '1', 
											);
											
	$defaults['theme_sidebars']['sidebar-header']  = array (
													'title' => __( 'Header Sidebar', 'sg-diamond' ), 
													'is_checked' => '', 
													'is_constant' => '1');

	$defaults['footer_text'] = '<a href="' . __( 'http://wordpress.org/', 'sg-diamond' ) . '">' . __( 'Powered by WordPress', 'sg-diamond' ). '</a> | ' . __( 'theme ', 'sg-diamond' ) . '<a href="' .  __( 'http://wpblogs.ru/themes/blog/theme/diamond/', 'sg-diamond') . '">Diamond</a>';
	
	return $defaults;

}
add_filter( 'sgwindow_option_defaults', 'diamond_defaults' );

/** Set theme layout
 *
 * @since SG Diamond 1.0
 */
function diamond_layout( $layout ) {
	
	foreach( $layout as $id => $layouts ) {
		if ( 'layout_home' == $layouts['name'] ) {

			$layout[ $id ]['val'] = 'left-sidebar';
			
		}
		if ( 'layout_home' == $layouts['name'] || 'layout_blog' == $layouts['name'] || 'layout_archive' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'flex-layout-1';
			
		}	
		if (  'layout_archive' == $layouts['name'] ) {

			$layout[ $id ]['content_val'] = 'flex-layout-1';
			
		}
	}
	return $layout;
}
add_filter( 'sgwindow_layout', 'diamond_layout' );

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_home_right_column( $layouts ) {

	the_widget( 'WP_Widget_Search', 'title=' );
	the_widget( 'WP_Widget_Categories' );
	the_widget( 'WP_Widget_Tag_Cloud', 'title=' );
	the_widget( 'WP_Widget_Recent_Comments' );
	
}
add_action('sgwindow_empty_column_2-home', 'diamond_home_right_column', 20);

/**
 * Hook widgets into header top sidebar
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_sidebar_header( $layouts ) {

	the_widget( 'WP_Widget_Search', 'title=' );
	the_widget( 'WP_Widget_Text', 'title=&text=<div>+7 777 99 99 99 </div><div>+3 333 33 33 33 </div>' );
	
}
add_action( 'sgwindow-sidebar-header', 'diamond_sidebar_header', 20 );

/**
 * Register Sidebar
 *
 * @since SG Layout 1.0.0
 */
function diamond_register_sidebars() {
	
	for( $i = 0; $i < 2; $i++) {
		register_sidebar( array(
			'name' => __( 'Side', 'sg-diamond' ) . ' ' . ( $i + 1),
			'id' => 's_' . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => "</aside>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
			
}
add_action( 'widgets_init', 'diamond_register_sidebars', 20 );
/**
 * Header
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_header( $layouts ) {

?>
	<div id="sg-site-header" class="sg-site-header">
		<div class="menu-top">
			
			<?php if ( get_header_image() 
				&& ( sgwindow_get_theme_mod( 'is_header_on_front_page_only' ) != '1' || is_front_page())) : ?>		
		
				<div class="sg-site-header-1 my-image widget">
					<?php if ( '1' == sgwindow_get_theme_mod( 'is_parallax_header' ) ) : ?>
					
						<div class="parallax-image <?php echo esc_attr( sgwindow_get_theme_mod( 'parallax_image_speed' ) ); ?> 0 0" style="background-image: url(<?php header_image(); ?>);">
						<div class="head-wrapper"></div>
						</div><!-- .parallax-image -->
						
					<?php else: ?>

						<div class="parallax-image 0 0 0" style="background-image: url(<?php header_image(); ?>);">
						<div class="head-wrapper"></div>
						</div><!-- .parallax-image -->
						
					<?php endif; ?>
													
					<div class="max-header-width">
						
						<div class="header-text-wrap">
							<div class="site-title">
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							</div><!-- .site-title -->
							<!-- Dscription -->
							<div class="site-description">
								<h2><?php echo bloginfo( 'description' ); ?></h2>
							</div><!-- .site-description -->
							<?php do_action( 'sgwindow_after_title' ); ?>
						</div>
						
						<?php get_sidebar( 'header' ); ?>

					
					</div><!-- .max-width -->
				</div><!-- .sg-site-header-1 -->
			
			<?php endif; ?>

			<!-- Second Top Menu -->	
			<?php if ( '1' == sgwindow_get_theme_mod( 'is_show_secont_top_menu') ) : ?>

				<div class="nav-container top-navigation">
					<div class="max-width">

						<nav class="horisontal-navigation menu-2" role="navigation">
							<?php if ( '' != sgwindow_get_theme_mod( 'logotype_url' ) ) : ?>
								<a class="small-logo" href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
									<img src='<?php echo esc_url( sgwindow_get_theme_mod( 'logotype_url' ) ); ?>' class="menu-logo" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
								</a><!-- .small-logo -->
							<?php endif; ?>	
							<span class="toggle"><span class="menu-toggle"></span></span>
							<?php wp_nav_menu( array( 'theme_location' => 'top2', 'menu_class' => 'nav-horizontal' ) ); ?>
						</nav><!-- .menu-2 .horisontal-navigation -->
						
						<div class="clear"></div>
					</div><!-- .max-width -->
				</div><!-- .top-navigation.nav-container -->
				
			<?php endif; ?>
		</div><!-- .menu-top  -->
	</div><!-- .sg-site-header -->
	
<?php
}
add_action('sgwindow_header_top', 'diamond_header', 20);

/**
 * Hook widgets into right sidebar at the front page
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_home_left_column( $layouts ) {

	the_widget( 'sgwindow_slider', 'title=' . __( 'Latest Posts', 'sg-diamond' ) . '&is_background=1&is_play=1&is_cat=1&content_type=1&margin=1' );
	the_widget( 'sgwindow_side_bar', 'title='.
								'&count=2'.
								'&width_0=50'.
								'&width_1=50'.
								'&sidebar_id_0=0'.
								'&sidebar_id_1=1'
		);	
	the_widget( 'WP_Widget_Categories' );
	the_widget( 'WP_Widget_Tag_Cloud', 'title=' );
	the_widget( 'WP_Widget_Recent_Comments' );

}
add_action('sgwindow_empty_column_1-home', 'diamond_home_left_column', 20);

/**
 * Hook widgets
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_home_footer_1() {

	the_widget( 'WP_Widget_Recent_Posts' );

}
add_action('sgwindow_empty_sidebar_footer-1', 'diamond_home_footer_1', 20);

/**
 * Add widgets
 *
 * @since SG Diamond 1.0
 */
function diamond_right_sidebar_default() {

	if ( is_single() ) {
	
		the_widget( 'sgwindow_slider', 'title=' . __( 'Related Posts', 'sg-window' ) . '&is_background=1&is_play=1&content_type=5&margin=1' );

	} 	
	
	the_widget( 'WP_Widget_Recent_Posts' );
	the_widget( 'WP_Widget_Recent_Comments' );

}
add_action('sgwindow_empty_column_2-default', 'diamond_right_sidebar_default', 20);

/**
 * Hook widgets
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_home_footer_2() {

	the_widget( 'WP_Widget_Recent_Comments' );

}
add_action('sgwindow_empty_sidebar_footer-2', 'diamond_home_footer_2', 20);

/**
 * Hook widgets
 *
 * @package WordPress
 * @subpackage Diamond
 * @since SG Diamond 1.0
*/

function diamond_home_footer_3() {

	the_widget( 'sgwindow_slider', 'title=&is_background=1&is_play=&content_type=0&margin=0' );

}
add_action('sgwindow_empty_sidebar_footer-3', 'diamond_home_footer_3', 20);

 /**
 * Add custom styles to the header.
 *
 * @since Diamond1.0.0
*/
function diamond_hook_css() {

?>
	<style type="text/css"> 
	
		.site .wide .widget.sgwindow_recent_shop > div,
		.site .wide .widget.sgwindow_recent_portfolio > div,
		.site .wide .widget.sgwindow_recent_posts > div,
		.site .wide .widget.sgwindow_product > div,
		.site .wide .widget.sgwindow_items_portfolio > div,
		.site .wide .widget.sgwindow_items_category > div,
		.site .wide .widget.sgwindow_items > div,
		.site .wide .widget.sgwindow_featured_posts > div,
		.site .wide .widget.sgwindow_featured_products > div,
		.site .wide .widget.sgwindow_portfolio > div,
		.site .wide .widget.sgwindow_gallery > div,
		.site .wide .widget.sgwindow_image > div {
			max-width: <?php echo esc_attr(sgwindow_get_theme_mod('width_main_wrapper')); ?>px;
		}
	
		.site .wide .widget.widget_text > div {
			max-width: <?php echo esc_attr(sgwindow_get_theme_mod('width_main_wrapper')); ?>px;
		}
		
		.wide .widget.widget_text,
		.wide .widget .widget-title,
		.wide .widget .widgettitle,
		.logo-block,
		.max-header-width,
		.max-width,
		.sidebar-footer-content,
		.horisontal-navigation {
			max-width: <?php echo esc_attr(sgwindow_get_theme_mod('width_main_wrapper')); ?>px;
		}
		
		#page .my-image {
			height: <?php echo esc_attr( sgwindow_get_theme_mod( 'parallax_image_height' )/4 ); ?>px;
		}	

		@media screen and (min-width: <?php echo esc_attr( (sgwindow_get_theme_mod( 'width_mobile_switch' ) + 40)/2 ); ?>px) {	
			#page .my-image {
				height: <?php echo esc_attr( sgwindow_get_theme_mod( 'parallax_image_height' )/2 ); ?>px;
			}
			
			#page .logo-section img {
				max-width: 40px;
			}
		}
		
		@media screen and (min-width: <?php echo esc_attr( (sgwindow_get_theme_mod( 'width_main_wrapper' ) + 40)/1.5 ); ?>px) {	
			#page .my-image {
				height: <?php echo esc_attr( sgwindow_get_theme_mod( 'parallax_image_height' ) ); ?>px;
			}
		}
		
		@media screen and (min-width: <?php echo esc_attr( sgwindow_get_theme_mod( 'width_main_wrapper' )) + 40; ?>px) {	

			.wide .widget .widget-title,
			.wide .widget .widgettitle,
			.max-width,
			.max-header-width {
				margin: 0 auto;
			}
			
			#page .site-title a {
				font-size: 64px;
			}
			
		}
		
		@media screen and (min-width: <?php echo esc_attr( sgwindow_get_theme_mod( 'width_mobile_switch' ) ); ?>px) {	
			/* columns */		
			.sidebar-2,
			.sidebar-1 {
				padding-top: 40px;
			}

			.sidebar-1 {
				padding-right: 20px;
			}

			.sidebar-2 {
				padding-left: 20px;
			}
			.boxed-content .main-area {
				margin: 0 20px;
			}

			.wide .widget {
				border-left: none;
				border-right: none;	
			}
			/* footer */
			
			.sidebar-footer-content {
					
				-webkit-flex-flow: nowrap;
				-ms-flex-flow: nowrap;
				flex-flow: nowrap;
				
				margin: 40px auto;
			}
			
			#page .sidebar-footer .widget .widgettitle:after,
			#page .sidebar-footer .widget .widget-title:after,
			#page .sidebar-footer .widget .widgettitle:before,
			#page .sidebar-footer .widget .widget-title:before {
				margin: 0;
			}
			
			/* widget-sidebar */
			.sidebar-footer-content,
			.site .widget-sidebar-wrapper {

				-webkit-flex-flow: nowrap;
				-ms-flex-flow: nowrap;
				flex-flow: nowrap;

			}
			
			.my-sidebar-layout {
				maragin: 0 20px 0 0;
			}
			
			#page .my-sidebar-layout .widget {
				margin: 0;
			}
		
		}
		
		@media screen and (min-width: <?php echo esc_attr( sgwindow_get_theme_mod( 'width_main_wrapper' ) ); ?>px) {
			
			/* image widget */

			.wide .small.flex-column-2 .column-4 .element .entry-title,
			.wide .small.flex-column-2 .column-4 .element p,
			.wide .small.flex-column-2 .column-4 .element a,
			.wide .small.flex-column-2 .column-3 .element .entry-title,
			.wide .small.flex-column-2 .column-3 .element p,
			.wide .small.flex-column-2 .column-3 .element a {
				font-size: 14px;
			}
			
			.wide .small.flex-column-2 .column-2 .element .entry-title,
			.wide .small.flex-column-2 .column-1 .element .entry-title {
				display: block;
				font-size: 14px;
			}

			.wide .small.flex-column-2 .column-2 .element p,
			.wide .small.flex-column-2 .column-2 .element a,
			.wide .small.flex-column-2 .column-1 .element p,
			.wide .small.flex-column-2 .column-1 .element a {
				display: block;
				font-size: 14px;
			}
			
			.wide .small.flex-column-4 .column-2 .element .entry-title,
			.wide .small.flex-column-4 .column-1 .element .entry-title,
			.wide .small.flex-column-3 .column-2 .element .entry-title,
			.wide .small.flex-column-3 .column-2 .element .entry-title,
			.wide .small.flex-column-2 .column-2 .element .entry-title,
			.wide .small.flex-column-2 .column-1 .element .entry-title {
				display: block;
				font-size: 14px;
			}

			.wide .small.flex-column-4 .column-2 .element p,
			.wide .small.flex-column-4 .column-1 .element p,
			.wide .small.flex-column-3 .column-2 .element p,
			.wide .small.flex-column-3 .column-1 .element p {
				display: block;
				font-size: 12px;
			}
			
			.wide .small.flex-column-1 .column-4 .element .entry-title,
			.wide .small.flex-column-1 .column-3 .element .entry-title,
			.wide .small.flex-column-1 .column-4 .element .link,
			.wide .small.flex-column-1 .column-3 .element .link,
			.wide .small.flex-column-1 .column-4 .element p,
			.wide .small.flex-column-1 .column-3 .element p {
				font-size: 16px;
			}
			
			.wide .small.flex-column-1 .column-2 .element .entry-title,
			.wide .small.flex-column-1 .column-1 .element .entry-title,
			.wide .small.flex-column-1 .column-2 .element .link,
			.wide .small.flex-column-1 .column-1 .element .link,
			.wide .small.flex-column-1 .column-2 .element p,
			.wide .small.flex-column-1 .column-1 .element p {
				font-size: 18px;
			}
						
		}
		
	</style>
	<?php
}
add_action('wp_head', 'diamond_hook_css');

 /**
 * Create customizer control
 *
 * @since SG Diamond 1.0.0
*/
add_action( 'customize_register', 'diamond_create_controls', 999 );
function diamond_create_controls( $wp_customize ) {
	
	if ( '1' != sgwindow_get_theme_mod( 'are_we_saved', null ) ) {
	
		$wp_customize->add_setting( 'are_we_saved', array(
			'type'			 => 'theme_mod',
			'default'        => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sgwindow_sanitize_checkbox'
		) );

		$wp_customize->add_control( 'are_we_saved', array (
			'label'      => __( '--', 'sg-diamond' ),
			'section'    => 'check',
			'settings'   => 'are_we_saved',
			'type'       => 'checkbox',
			'priority'   => 1,
		) );

	}
	
	/* remove controls */
	$wp_customize->remove_control( 'is_show_top_menu' );
	$wp_customize->remove_control( 'is_show_footer_menu' );

}
 /**
 * Add custom js for the Customizer screen.
 *
 * @since SG Diamond 1.0.0
*/
function diamond_customize_controls_enqueue_scripts() {

	if ( '1' != sgwindow_get_theme_mod( 'are_we_saved', null ) ) {
		wp_enqueue_script( 'diamond-customize-control-js', get_stylesheet_directory_uri() . '/inc/js/customize.js', array( 'jquery' ), false, true );
	}
	
}
add_action('customize_controls_enqueue_scripts', 'diamond_customize_controls_enqueue_scripts');

 /**
 * Archive Meta.
 *
 * @since SG Diamond 1.0.0
*/
function sgwindow_posted_on() {

	$is_author = ( is_singular() ? ( '1' == sgwindow_get_theme_mod( 'is_author' ) ? true : false ) : 
									( '1' == sgwindow_get_theme_mod( 'blog_is_author' ) ? true : false ) );
									
	$is_date = ( is_singular() ? ( '1' == sgwindow_get_theme_mod( 'is_date' ) ? true : false ) : 
									( '1' == sgwindow_get_theme_mod( 'blog_is_date' ) ? true : false ) );
									
	$is_views = ( is_singular() ? ( '1' == sgwindow_get_theme_mod( 'is_views' ) ? true : false ) : 
									( '1' == sgwindow_get_theme_mod( 'blog_is_views' ) ? true : false ) );

	$views = null;

	if ( $is_views ) :
	
		if ( '1' == sgwindow_get_theme_mod( 'is_views' ) ) {
			if( class_exists('Jetpack') && Jetpack::is_module_active('stats') && function_exists ( 'stats_get_csv' ) ) {
				$result = stats_get_csv( 'postviews', 'post_id=' . get_the_ID() . '&limit=-1&summarize');
				$views = '<span class="post-views">' . esc_attr( number_format_i18n( $result[0]['views'] ) ) . '</span>';
			}
		}
	endif;

	if ( '1' == sgwindow_get_theme_mod( 'is_cat' ) && ( is_home() || is_archive() || is_search() ) ) {
		$categories = get_the_category( get_the_ID() );
		if ( ! empty( $categories ) ) {
			echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '"><span class="post-cat' . ( $is_date || isset( $views ) || $is_author ? ' post-sep' : '' ) . '">' . esc_attr( $categories[0]->name ) . '</span>';
		}
	}
	if ( $is_author ) {
		echo '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><span class="post-author' . ( $is_date || isset( $views ) ? ' post-sep' : '' ) . '">' . esc_attr( get_the_author() ) . '</span></a>';
	}
	if ( $is_date ) {
		echo '<a href="' . esc_url( get_permalink() ) . '"><span class="post-date' . ( isset( $views ) ? ' post-sep' : '' ) . '">' . esc_attr( get_the_date() ) . '</span></a>';
	}
	if ( isset( $views ) ) :
	
		echo $views;
		
	endif;
}

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since SG Diamond 1.0.0
 */
function diamond_customize_preview_js() {
	wp_enqueue_script( 'diamond-customizer', get_stylesheet_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), time() . '11.12.2020', true );
}
add_action( 'customize_preview_init', 'diamond_customize_preview_js', 99 );


//admin page
require get_stylesheet_directory() . '/inc/admin-page.php';