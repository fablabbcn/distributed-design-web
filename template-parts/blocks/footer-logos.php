<?php $logos = get_field( 'logos', 'options' ); ?>

<div class="partners-carousel px-30 lg:py-30">
	<?php foreach ( $logos as $key => $logo ) : ?>

		<figure class="slide-item">
			<?php if ( $logo['link'] ) : ?>
			<a href="<?php echo esc_attr( $logo['link'] ); ?>" target="_blank">
				<img src="<?php echo esc_attr( $logo['image']['sizes']['icon-thumbnails'] ); ?>" alt="<?php echo esc_attr( $logo['image']['alt'] ); ?>">
			</a>

		<?php else : ?>
			<img src="<?php echo esc_attr( $logo['image']['sizes']['icon-thumbnails'] ); ?>" alt="<?php echo esc_attr( $logo['image']['alt'] ); ?>">

		<?php endif ?>
		</figure>

	<?php endforeach ?>
</div>
