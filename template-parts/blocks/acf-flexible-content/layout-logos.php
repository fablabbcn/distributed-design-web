<?php
/**
 * ⛔️ Template part for displaying Logos
 */

$logos = get_sub_field( 'logos' );

?>


<?php if ( $logos ) : ?>

	<aside class="partners-carousel px-30 lg:py-30">
	<?php foreach ( $logos as $key => $image ) : ?>

		<div class="slide-item">
		<?php if ( $image['link'] ) : ?>
			<a href="<?php echo esc_attr( $image['link'] ); ?>" target="_blank">
				<img src="<?php echo esc_attr( $image['image']['sizes']['icon-thumbnails'] ); ?>" alt="<?php echo esc_attr( $image['image']['alt'] ); ?>">
			</a>

		<?php else : ?>
			<img src="<?php echo esc_attr( $image['image']['sizes']['icon-thumbnails'] ); ?>" alt="<?php echo esc_attr( $image['image']['alt'] ); ?>">

		<?php endif ?>
		</div>

	<?php endforeach ?>
	</aside>

<?php endif ?>
