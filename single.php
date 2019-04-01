<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>


<main>
	<?php set_query_var( 'title', get_the_title() ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>

		<section class="cf bootstrap-wrapper post-content rich-text">
			<div class="row row-eq-height">

				<?php if ( 'talent' !== $post_type ) : ?>
					<div class="fl single_first-column">
						<p class="b"><?php the_field( 'left_column_heading' ); ?></p>
						<p>-</p>
						<p><?php the_field( 'left_column_subheading' ); ?></p>
						<p class="absolute bottom-2 b"><?php the_field( 'left_column_bottom' ); ?></p>
					</div>

				<?php else : ?>
					<div class="fl single_first-column">
						<?php get_template_part( 'template-parts/post/talent', 'info' ); ?>
					</div>

				<?php endif; ?>


				<?php if ( get_field( 'featured_image_alt' ) ) : ?>
					<div class="fl single_second-column flex flex-col">
						<?php $slider = array( 'images' => get_field( 'featured_image_alt' ) ?: array() ); ?>
						<?php require locate_template( 'template-parts/blocks/slider.php' ); ?>
						<?php if ( get_field( 'subtitle' ) ) : ?>
							<div class="mt-auto px-15 lg:px-40 py-20 border-t">
								<div class="text-36 font-oswald uppercase"><?php the_field( 'subtitle' ); ?></div>
							</div>
						<?php endif; ?>
					</div>

				<?php else : ?>
					<div class="fl single_second-column bg-cover bg-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
						<?php the_post_thumbnail(); ?>
					</div>

				<?php endif; ?>


				<?php get_template_part( 'template-parts/post/aside' ); ?>


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


<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
