<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>


<?php set_query_var( 'title', get_the_title() ); ?>
<?php get_template_part( 'template-parts/blocks/header' ); ?>


<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>

	<div class="cf bootstrap-wrapper post-content">
		<div class="row row-eq-height">

			<div class="fl single_first-column">
				<p class="b"><?php the_field( 'left_column_heading' ); ?></p>
				<p>-</p>
				<p><?php the_field( 'left_column_subheading' ); ?></p>
				<p class="absolute bottom-2 b"><?php the_field( 'left_column_bottom' ); ?></p>
			</div>

			<div class="fl single_second-column bg-cover bg-center" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
				<?php the_post_thumbnail(); ?>
			</div>

			<aside class="fl single_third-column text-center">
				<?php get_template_part( 'template-parts/post/aside', 'navigation' ); ?>
				<hr class="flex my-20 -mx-40 border-t border-current">
				<?php get_template_part( 'template-parts/post/aside', 'share' ); ?>
			</aside>

		</div>
	</div>


	<?php while ( the_flexible_field( 'post_content' ) ) : ?>

		<?php if ( 'text_content' === get_row_layout() ) : ?>
			<?php if ( get_sub_field( 'text' ) ) : ?>

				<div class="cf bootstrap-wrapper post-content">
					<div class="row row-eq-height">
						<div class="fl single_first-column">&nbsp;</div>
						<div class="fl single_second-column content-column"><?php the_sub_field( 'text' ); ?></div>
						<div class="fl single_third-column">&nbsp;</div>
					</div>
				</div>

			<?php endif; ?>


		<?php elseif ( 'image_content' === get_row_layout() ) : ?>
			<?php if ( get_sub_field( 'heading' ) || get_sub_field( 'sub_heading' ) || get_sub_field( 'bottom' ) || get_sub_field( 'image' ) ) : ?>

				<div class="cf bootstrap-wrapper post-content">
					<div class="row row-eq-height">
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
					</div>
				</div>

			<?php endif; ?>


		<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
			<?php if ( get_sub_field( 'heading' ) || get_sub_field( 'sub_heading' ) || get_sub_field( 'bottom' ) || get_sub_field( 'image' ) ) : ?>

				<div class="cf bootstrap-wrapper post-content">
					<div class="row row-eq-height">
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
					</div>
				</div>

			<?php endif; ?>


		<?php endif; ?>
	<?php endwhile; ?>
<?php endwhile; ?>


<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
