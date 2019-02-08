<?php
/**
 * Template part for Visual intro layout
 */

$slider  = get_sub_field( 'slider' );
$content = get_sub_field( 'content' );

?>


<article class="info-section">

	<div class="base-col">

	<?php if ( $slider['images'] ) : ?>
		<div class="intro-slider">
		<?php foreach ( $slider['images'] as $key => $image ) : ?>
			<div class="slide-item">
				<figure><img src="<?php echo $image['sizes']['container-thumbnails']; ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>"></figure>
			</div>
		<?php endforeach ?>
		</div>
	<?php endif ?>

	<?php if ( $slider['caption'] ) : ?>
		<div class="notice">
			<p><?php echo esc_html( $slider['caption'] ); ?></p>
		</div>
	<?php endif ?>

	</div>

<?php if ( $content ) : ?>
	<div class="col" <?php echo $content['page_link'] ? 'data-link-href="' . esc_attr( $content['page_link'] ) . '"' : ''; ?>>

	<?php if ( $content['title'] ) : ?>
		<header class="heading">
			<h1><?php echo esc_html( $content['title'] ); ?></h1>
		</header>
	<?php endif ?>

		<?php echo $content['text']; ?>

	</div>
<?php endif ?>

</article>
