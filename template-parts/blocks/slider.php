<?php if ( $slider['images'] ) : ?>
	<?php $media_classes = 'block w-full h-full max-h-screen object-cover'; ?>

	<div class="<?php echo esc_attr( $slider['class'] ?: 'intro-slider' ); ?>">
		<?php foreach ( $slider['images'] as $key => $image ) : ?>
			<div class="slide-item flex">
				<figure class="flex w-full h-full">
					<?php if ( 'video' === $image['type'] ) : ?>
						<video autoplay loop
							class="<?php echo esc_attr( $media_classes ); ?>"
							src="<?php echo esc_attr( $image['url'] ); ?>"></video>
					<?php else : ?>
						<img style="visibility: unset;"
							class="<?php echo esc_attr( $media_classes ); ?>"
							alt="<?php echo esc_attr( $image['alt'] ); ?>"
							src="<?php echo esc_attr( $image['sizes']['container-thumbnails'] ); ?>"
						>
					<?php endif; ?>
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
