<aside class="-mt-border border-t stickit-<?php echo esc_attr( $post_type ); ?>">

	<div class="px-15 lg:px-40 py-20 bg-gray border-b <?php echo esc_attr( $post_type ); ?>-description">
		<p class="<?php echo esc_attr( $post_type ); ?>-heading">
			<?php echo wp_kses_ddmp( $description ); ?>
		</p>
	</div>

</aside>
