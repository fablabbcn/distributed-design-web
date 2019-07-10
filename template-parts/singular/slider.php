<?php $images = get_sub_field( 'image' ); ?>


<?php if ( $images ) : ?>
	<div class="post-slider max-h-screen -m-20 lg:-mx-40">
		<?php foreach ( $images as $image ) : ?>

			<figure>
				<img
					class="w-full h-full max-h-screen object-cover"
					src="<?php echo esc_attr( $image['url'] ); ?>"
					alt=""
				>
			</figure>

		<?php endforeach; ?>
	</div>
<?php endif; ?>
