<?php
/**
 * The sidebar containing the main widget area
 */

if ( ! is_active_sidebar( 'default-sidebar' ) ) {
	return;
}
?>

<div class="default-sidebar">
	<?php dynamic_sidebar( 'default-sidebar' ); ?>
</div>
