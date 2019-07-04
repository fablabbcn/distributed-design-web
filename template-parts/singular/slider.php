<?php $images = get_sub_field( 'image' ); ?>


<?php if ( $images ) : ?>
	<div class="post-slider -m-20 lg:-mx-40">
		<?php foreach ( $images as $image ) : ?>

			<div>
				<img
					class="w-full h-full object-cover"
					src="<?php echo esc_attr( $image['url'] ); ?>"
					alt=""
				>
			</div>

		<?php endforeach; ?>
	</div>
<?php endif; ?>
