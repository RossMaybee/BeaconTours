<?php
/**
 * The sidebar containing the header widget area
 *
 */
 
?>

<div id="sidebar-header" class="sidebar-header">
	<div class="widget-area">
			<?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
			
					<?php dynamic_sidebar( 'sidebar-header' ); ?>

			<?php else : ?>

					<?php do_action( 'sgwindow-sidebar-header' ); ?>
			
			<?php endif; ?>
	</div><!-- .widget-area -->
</div><!-- .sidebar-header -->
