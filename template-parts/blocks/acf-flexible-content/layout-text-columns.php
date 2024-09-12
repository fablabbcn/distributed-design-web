<?php
/**
 * ✅ Template part for Text Columns layout
 */

$title    = get_sub_field( 'title' );
$subtitle = get_sub_field( 'subtitle' );
$columns  = get_sub_field( 'columns' ) ?: array();
$styles   = get_sub_field( 'styles' );

$className = array(
	$styles['bg_color'] !== 'bg-transparent' ? 'py-16 lg:py-24' : '',
	in_array( $styles['bg_color'], array( 'bg-black', 'bg-green', 'bg-indigo', 'bg-purple' ) ) ? 'text-white' : '',
	$styles['bg_color'] ?: 'bg-transparent',
);

?>


<section class="relative grid-layout grid-cols-5 lg:grid-cols-6 gap-x-20 gap-y-8 items-baseline px-10 <?php the_classes( $className ); ?>">

	<?php if ( $title ) : ?>
		<div class="col-span-full">
			<div class="lg:mb-4">
				<h2 class="text-3xl lg:text-4xl font-extralight"><?php echo wp_kses_post( $title ); ?></h2>
			</div>
		</div>
	<?php endif; ?>

	<?php foreach ( $columns as $column ) : ?>
		<?php if ( $column['title'] || $column['text'] ) : ?>

			<div class="grid-layout grid-cols-1 lg:grid-cols-3 col-span-full lg:col-span-3">
				<?php if ( $column['title'] ) : ?>
					<h3 class="text-xl lg:text-3xl font-light"><?php wp_kses_ddmp( $column['title'] ); ?></h3>
				<?php endif; ?>
				<?php if ( $column['text'] ) : ?>
					<div class="<?php echo esc_attr( $column['title'] ? 'lg:col-span-2' : 'lg:col-span-3' ); ?>">
						<div class="rich-text"><?php wp_kses_ddmp( $column['text'] ); ?></div>
					</div>
				<?php endif; ?>
			</div>

		<?php endif; ?>
	<?php endforeach; ?>

</section>
