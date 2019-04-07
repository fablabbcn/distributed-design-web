<?php
/**
 * Template Name: Single Event
 */

$_post = $post;
get_header(); // TODO: Check what's messing with global vars
$post = $_post;

?>


<main>
	<?php set_query_var( 'title', get_the_title() ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>


		<section class="cf bootstrap-wrapper post-content rich-text">
			<div class="row row-eq-height">
				<div class="fl single_first-column"><?php get_template_part( 'template-parts/singular/side' ); ?></div>
				<div class="fl single_second-column flex flex-col"><?php get_template_part( 'template-parts/singular/hero' ); ?></div>
				<div class="fl single_third-column"><?php get_template_part( 'template-parts/post/aside' ); ?></div>
			</div>
		</section>


		<?php if ( have_rows( 'post_content' ) ) : ?>
			<?php while ( have_rows( 'post_content' ) ) : ?>
				<?php if ( count( array_filter( the_row() ) ) > 1 ) : ?>

					<section class="cf bootstrap-wrapper post-content rich-text">
						<div class="row row-eq-height">

							<?php if ( 'text_content' === get_row_layout() ) : ?>
								<div class="fl single_first-column">&nbsp;</div>
								<div class="fl single_second-column content-column"><?php the_sub_field( 'text' ); ?></div>
								<div class="fl single_third-column">&nbsp;</div>


							<?php elseif ( 'image_content' === get_row_layout() ) : ?>
								<div class="fl single_first-column">
									<p class="b"><?php the_sub_field( 'heading' ); ?></p>
									<p>-</p>
									<p><?php the_sub_field( 'sub_heading' ); ?></p>
									<p class="absolute bottom-2 b"><?php the_sub_field( 'bottom' ); ?></p>
								</div>
								<div class="fl single_second-column bg-center bg-cover" style="background-image: url('<?php the_sub_field( 'image' ); ?>');">
									<?php the_post_thumbnail(); ?>
								</div>
								<div class="fl single_third-column">&nbsp;</div>


							<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
								<div class="fl single_first-column">
									<p class="b"><?php the_sub_field( 'heading' ); ?></p>
									<p>-</p>
									<p><?php the_sub_field( 'sub_heading' ); ?></p>
									<p class="absolute bottom-2 b"><?php the_sub_field( 'bottom' ); ?></p>
								</div>
								<div class="fl single_slider-column">
									<?php $images = get_sub_field( 'image' ); ?>
									<?php if ( $images ) : ?>
										<div class="post-slider">
										<?php foreach ( $images as $image ) : ?>
											<div><img src="<?php echo esc_attr( $image['url'] ); ?>"/></div>
										<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</div>
								<div class="fl single_third-column">&nbsp;</div>


							<?php endif; ?>
						</div>
					</section>

				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>

	<?php endwhile; ?>

</main>


<?php get_footer(); ?>