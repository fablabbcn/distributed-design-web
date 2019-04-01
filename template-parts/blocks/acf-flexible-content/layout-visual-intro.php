<?php
/**
 * ⛔️ Template part for Visual intro layout
 */

$slider  = get_sub_field( 'slider' );
$content = get_sub_field( 'content' );

?>


<article class="info-section">

	<div class="base-col">
		<?php require locate_template( 'template-parts/blocks/slider.php' ); ?>
	</div>

<?php if ( $content ) : ?>
	<div class="col" <?php echo $content['page_link'] ? 'data-link-href="' . esc_attr( $content['page_link'] ) . '"' : ''; ?>>

	<?php if ( $content['title'] ) : ?>
		<header class="heading">
			<h1><?php echo esc_html( $content['title'] ); ?></h1>
		</header>
	<?php endif ?>

		<?php echo wp_kses_post( $content['text'] ); ?>

	</div>
<?php endif ?>

</article>
