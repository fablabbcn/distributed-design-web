<?php if ( $slider['images'] ) : ?>

	<div class="intro-slider">
		<?php foreach ( $slider['images'] as $key => $image ) : ?>
			<div class="slide-item flex">
				<figure class="flex w-full h-full">
					<?php if ( 'video' === $image['type'] ) : ?>
						<video autoplay loop class="block m-auto" src="<?php echo esc_attr( $image['url'] ); ?>"></video>
					<?php else : ?>
						<img
							style="visibility: unset;"
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
