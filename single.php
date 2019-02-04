<?php
/**
 * The template for displaying all single posts
 */
get_header(); ?>


<div class="base-col">
	<header class="resources-header">
		<div class="bootstrap-wrapper">
			<div class="row resources-filter">
				<div class="col-12 tl today-date">
					<?php the_title( '<h1>', '</h1>' ); ?>
				</div>
			</div>
		</div>
	</header>
</div>

<div class="col"></div>


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
			<div class="fl single_second-column" style="background: url('<?php the_post_thumbnail_url(); ?>') center no-repeat; background-size: cover;">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="fl single_third-column">
				<a href="/news">
					<span class="goback-icon"><?php include get_template_directory() . '/assets/images/read-more.svg'; ?></span>
					<p class="b dib goback-text">Back</p>
				</a>
			</div>
		</div>
	</div>


	<?php while ( the_flexible_field( 'post_content' ) ) : ?>

		<?php if ( 'text_content' === get_row_layout() ) : ?>

			<div class="cf bootstrap-wrapper post-content">
				<div class="row row-eq-height">
					<div class="fl single_first-column">&nbsp;</div>
					<div class="fl single_second-column content-column"><?php the_sub_field( 'text' ); ?></div>
					<div class="fl single_third-column">&nbsp;</div>
				</div>
			</div>


		<?php elseif ( 'image_content' === get_row_layout() ) : ?>

			<div class="cf bootstrap-wrapper post-content">
				<div class="row row-eq-height">
					<div class="fl single_first-column">
						<p class="b"><?php the_sub_field( 'heading' ); ?></p>
						<p>-</p>
						<p><?php the_sub_field( 'sub_heading' ); ?></p>
						<p class="absolute bottom-2 b"><?php the_sub_field( 'bottom' ); ?></p>
					</div>
					<div class="fl single_second-column" style="background: url('<?php the_sub_field( 'image' ); ?>') center no-repeat; background-size: cover;">
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="fl single_third-column">&nbsp;</div>
				</div>
			</div>


		<?php elseif ( 'slider_content' === get_row_layout() ) : ?>

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
	<?php endwhile; ?>
<?php endwhile; ?>


<?php set_query_var( 'layout', $layout ); ?>
<?php get_template_part( 'template-parts/logos' ); ?>

<?php get_footer(); ?>
