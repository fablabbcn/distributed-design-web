<?php
/**
 * The template for displaying all single posts
 */

get_header();

// TODO: Fix whatever's messing global vars in The Event Calendar
$post = isset( $_post ) ? $_post : $post;

$s_classes = array(
	'section' => array( 'post-content rich-text relative' ),
	'layout'  => array( 'flex flex-wrap lg:flex-no-wrap' ),
	'columns' => function ( $has_details, $has_border = true ) {
		$base_classes = $has_border ? 'p-20 lg:p-40 border-t' : 'p-20 pt-0 lg:p-40 lg:pt-0';
		return array(
			array( $has_details ? 'flex' : 'hidden', 'lg:flex flex-col w-full', $base_classes, 'lg:w-1/4' ),
			array( $has_details ? 'flex' : 'hidden', 'lg:flex flex-col w-full', $base_classes, 'lg:w-3/4 lg:border-l' ),
			array( 'hidden lg:flex flex-col w-full lg:w-auto', $base_classes, 'lg:border-l' ),
		);
	},
);

?>


<main>
	<?php set_query_var( 'title', get_the_title() ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php $post = isset( $_post ) ? $_post : $post; ?>

		<section class="<?php the_classes( $s_classes['section'] ); ?>">
			<div data-layout="hero" class="<?php the_classes( $s_classes['layout'] ); ?>">
				<div class="<?php the_classes( $s_classes['columns'](true)[0] ); ?>"><?php include locate_template( 'template-parts/singular/side.php' ); ?></div>
				<div class="<?php the_classes( $s_classes['columns'](true)[1] ); ?>"><?php include locate_template( 'template-parts/singular/hero.php' ); ?></div>
				<div class="<?php the_classes( $s_classes['columns'](true)[2] ); ?>"><?php include locate_template( 'template-parts/post/aside.php' ); ?></div>
			</div>
		</section>


		<?php if ( have_rows( 'post_content' ) ) : ?>
			<?php while ( have_rows( 'post_content' ) ) : ?>
				<?php if ( count( array_filter( the_row() ) ) > 1 ) : ?>
					<?php
					$has_border = 'multi_columns' === get_row_layout() ? get_sub_field( 'has_border' ) : true;
					$details    = array_filter(
						array(
							'heading'    => get_sub_field( 'heading' ),
							'subheading' => get_sub_field( 'sub_heading' ),
							'bottom'     => get_sub_field( 'bottom' ),
						)
					);
					?>

					<section class="<?php the_classes( $s_classes['section'] ); ?>">
						<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?>">

							<div class="<?php the_classes( $s_classes['columns']($details, $has_border)[0] ); ?>"><?php include locate_template( 'template-parts/singular/details.php' ); ?></div>

							<?php if ( 'text_content' === get_row_layout() ) : ?>
								<div class="<?php the_classes( $s_classes['columns'](true, $has_border)[1] ); ?>"><?php the_sub_field( 'text' ); ?></div>
							<?php elseif ( 'image_content' === get_row_layout() ) : ?>
								<div class="<?php the_classes( $s_classes['columns'](true, $has_border)[1] ); ?>"><?php include locate_template( 'template-parts/singular/image.php' ); ?></div>
							<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
								<div class="<?php the_classes( $s_classes['columns'](true, $has_border)[1] ); ?>"><?php include locate_template( 'template-parts/singular/slider.php' ); ?></div>
							<?php elseif ( 'multi_columns' === get_row_layout() ) : ?>
								<div class="<?php the_classes( $s_classes['columns'](true, $has_border)[1] ); ?>"><?php include locate_template( 'template-parts/singular/columns.php' ); ?></div>
							<?php endif; ?>

							<div class="<?php the_classes( $s_classes['columns'](false, $has_border)[2] ); ?>">&nbsp;</div>

						</div>
					</section>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>


		<?php if ( 'tribe_events' === $post_type ) : ?>

			<section class="<?php the_classes( $s_classes['section'] ); ?>">
				<div data-layout="event-details" class="<?php the_classes( $s_classes['layout'] ); ?>">

					<div class="<?php the_classes( $s_classes['columns'](true)[0] ); ?>"><?php include locate_template( 'template-parts/singular/event.php' ); ?></div>
					<div class="<?php the_classes( $s_classes['columns'](true)[1] ); ?>"><?php include locate_template( 'template-parts/singular/map.php' ); ?></div>
					<div class="<?php the_classes( $s_classes['columns'](true)[2] ); ?>">&nbsp;</div>

				</div>
			</section>

		<?php endif; ?>

	<?php endwhile; ?>

</main>


<?php get_footer(); ?>
