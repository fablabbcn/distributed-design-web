<?php foreach ( $social_links ?: array() as $social_link ) : ?>
	<?php if ( $social_link['url'] ) : ?>
		<?php $button_shortcode = '[button_link url="' . $social_link['url'] . '" icon="' . $social_link['social_network']['value'] . '"]'; ?>

		<dt class="clip"><?php echo esc_html( $social_link['social_network']['label'] ); ?></dt>
		<dd class="p-5 leading-none"><?php echo do_shortcode( $button_shortcode ); ?></dd>

	<?php endif; ?>
<?php endforeach; ?>
