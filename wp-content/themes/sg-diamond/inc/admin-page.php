<?php

/**
 * Add menu to Appearance screen
 *
 * @since SG Diamond 1.0
 */
function diamond_admin_page() {
	add_theme_page( __( 'About theme', 'sg-diamond' ), __( 'About Diamond', 'sg-diamond' ), 'edit_theme_options', 'diamond-page', 'diamond_about_page');
}
add_action( 'admin_menu', 'diamond_admin_page' );
 
 /**
 * Add css styles for admin page
 *
 * @since SG Diamond 1.0
 */
function diamond_admim_style( $hook ) {
	if ( 'appearance_page_diamond-page' != $hook ) {
		return;
	}
	wp_enqueue_style( 'diamond-admin-page-style', get_stylesheet_directory_uri() . '/inc/css/admin-page.css', array(), null );
	wp_enqueue_style( 'diamond-admin-fonts', '//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&#038;subset=latin%2Clatin-ext&#038', array(), null );
	
}
add_action( 'admin_enqueue_scripts', 'diamond_admim_style' );

/**
 * About theme page
 *
 * @since SG Diamond 1.0
 */
function diamond_about_page() {
?>
	<div class="main-wrapper">
		<p class="sg-header"><?php esc_html_e( 'Main Info', 'sg-diamond' ); ?></p>
		<ul class="sg-buttons">
			<li><a href="<?php echo esc_url( home_url() . '/wp-admin/customize.php' ); ?>"><?php esc_html_e( 'Theme Options', 'sg-diamond' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_html() .  '/wp-admin/customize.php?autofocus[panel]=widgets' ); ?>"><?php esc_html_e( 'Widgets', 'sg-diamond' ); ?></a></li>
			<li><a href="<?php echo __( 'http://wpblogs.ru/themes/how-to-video-sg-window-theme/', 'sg-diamond' ); ?>"><?php esc_html_e( 'How to use a theme', 'sg-diamond' ); ?></a></li>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/support/theme/diamond' ); ?>"><?php esc_html_e( 'Support forum', 'sg-diamond' ); ?></a></li>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/diamond#postform' ); ?>"><?php esc_html_e( 'Rate on WordPress.org', 'sg-diamond' ); ?></a></li>
			<?php if ( ! defined ( 'sg-diamond' ) ) : ?>
			<li class="pro"><a href="<?php echo esc_url( 'http://wpblogs.ru/themes/sg-window-pro/' ); ?>"><?php esc_html_e( 'Update to Pro', 'sg-diamond' ); ?></a></li>
			<?php endif; ?>
			</li>
		</ul>
		<div class="info-wrapper">
			<div class="icon-image">
				<img src="<?php echo get_stylesheet_directory_uri() . '/screenshot.png'; ?>"/>
			</div><!-- .icon-image -->
			<div class="info">
			<?php if ( ! defined ( 'sg-diamond' ) ) : ?>
				<p><?php esc_html_e( 'You are using light version of Diamond. Update to Pro to have even more features. For Example:', 'sg-diamond' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Custom colors;', 'sg-diamond' ); ?></li>
					<li><?php esc_html_e( 'Site/content width;', 'sg-diamond' ); ?></li>
					<li><?php esc_html_e( 'Boxed/Full width layout;', 'sg-diamond' ); ?></li>
					<li><?php esc_html_e( 'WooCommerce layouts;', 'sg-diamond' ); ?></li>
					<li><?php esc_html_e( 'Footer text options.', 'sg-diamond' ); ?></li>
				</ul>
			<?php else: 

			do_action( 'sgwindow_pro_version' ); 
			
			endif; ?>

			</div><!-- .info -->
			
		</div><!-- .info-wrapper -->
		<div class="more-info">
			<a href="<?php echo esc_url( 'http://wpblogs.ru/themes/sg-window-pro/' ); ?>"><?php esc_html_e( 'More Info', 'sg-diamond' ); ?></a>
		</div><!-- .more-info -->
		
		<a alt="" href="http://wpblogs.ru/themes/blog/theme/sg-window/"><p class="parent-text"><?php esc_html_e( 'Parent theme', 'sg-diamond' ); ?></p></a>
		<a  class="parent-img" alt="" href="http://wpblogs.ru/themes/blog/theme/sg-window/"><img src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>"/></a>

	</div><!-- .main-wrapper -->
<?php
}