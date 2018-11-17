<?php
/**
 * Template part for displaying Logos
 */

$logos = get_sub_field( 'logos' );

?>


<?php if ( $logos ) : ?>

	<div class="partners-carousel">
	<?php foreach ( $logos as $key => $image ) : ?>

		<div class="slide-item">

		<?php if ( $image['link'] ) : ?>
			<a href="<?php echo $image['link']; ?>" target="_blank">
		<?php endif ?>

			<img src="<?php echo $image['image']['sizes']['icon-thumbnails']; ?>" alt="<?php echo $image['image']['alt']; ?>">

		<?php if ( $image['link'] ) : ?>
			</a>
		<?php endif ?>

		</div>

	<?php endforeach ?>
	</div>

<?php endif ?>
