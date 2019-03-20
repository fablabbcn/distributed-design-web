<?php if ( $slider['images'] ) : ?>

	<div class="intro-slider">
		<?php foreach ( $slider['images'] as $key => $image ) : ?>
			<div class="slide-item">
				<figure>
					<img
						style="visibility: unset;"
						alt="<?php echo esc_attr( $image['alt'] ); ?>"
						src="<?php echo esc_attr( $image['sizes']['container-thumbnails'] ); ?>"
					>
				</figure>
			</div>
		<?php endforeach ?>
	</div>

<?php endif ?>


<?php if ( $slider['caption'] ) : ?>

	<div class="notice">
		<p><?php echo esc_html( $slider['caption'] ); ?></p>
	</div>

<?php endif ?>
