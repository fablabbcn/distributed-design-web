<?php

/* Template Name: Form Entries */

$has_banner = get_field( 'has_banner' );
$banner = get_field( 'banner' );

$entries = new WP_Query(
	array(
		'post_type'      => 'af_entry',
		'posts_per_page' => '-1',
		'order'          => 'ASC',
		'orderby'        => 'rand',
		'date_query'     => array(
			array(
				'after'     => get_field( 'range' )['from'],
				'before'    => get_field( 'range' )['to'],
				'inclusive' => true,
			),
	),
	)
);

?>


<?php get_header(); ?>


<main class="container flex-grow">
	<article class="grid gap-12 px-8 py-12">

		<?php set_query_var( 'title', get_the_title() ); ?>
		<?php get_template_part( 'template-parts/page/header' ); ?>

		<aside class="">
			<div class="">
				<p class=""><?php the_field( 'description' ); ?></p>
			</div>
		</aside>

		<section class="">
			<ul class="grid-layout md:grid-cols-2 lg:grid-cols-3">

				<?php if ( $has_banner ) : ?>
					<li class="<?php the_classes( '' ); ?>">
						<div id="post-<?php the_ID(); ?>" class="">
							<span class="">
								<?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false ); ?>
								<div class="">
									<div class=""><p><?php echo $banner['title']; ?></p></div>
									<div class=""><?php echo $banner['description']; ?></div>
									<div class=""><a
										href="<?php echo esc_attr( $banner['link']['url'] ); ?>"
										target="<?php echo esc_attr( $banner['link']['target'] ); ?>"
										class=""
									><?php echo esc_attr( $banner['link']['title'] ); ?></a></div>
								</div>
								<div class="">
									<?php echo wp_get_attachment_image( $banner['image']['ID'], 'post-thumbnail', false, array( 'class' => '' ) ); ?>
								</div>
							</span>
						</div>
					</li>
				<?php endif ?>

				<?php while ( $entries->have_posts() ) : ?>
					<?php $entries->the_post(); ?>
					<li class="<?php the_classes( '' ); ?>">
						<?php get_template_part( 'template-parts/base/card-af_entry' ); ?>
					</li>
				<?php endwhile ?>

			</ul>
		</section>

	</article>
</main>

<?php get_footer(); ?>
