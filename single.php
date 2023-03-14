<?php
/**
 * The template for displaying all single posts
 */

get_header();

// TODO: Fix whatever's messing global vars in The Event Calendar
$post = isset( $_post ) ? $_post : $post;

$title = array(
	'post' => get_the_title( get_option('page_for_posts', true) ),
	'talent' => get_post_type_object( $post_type )->labels->name,
	'tribe_events' => get_the_title(),
	'resources' => get_post_type_object( $post_type )->labels->name,
	'page' => get_the_title(),
)[ get_post_type() ];

$s_classes = array(
	'article' => array( 'grid gap-8' ),
	'section' => array( '' ),
	'layout'  => array( 'grid gap-8' ),
	'columns' => array( 'grid gap-4 rich-text' ),
);

?>

<main class="flex-grow">
	<article class="grid gap-12 px-8 py-12 overflow-hidden">

		<?php set_query_var( 'title', $title ); ?>
		<?php get_template_part( 'template-parts/page/header' ); ?>


		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php $post = isset( $_post ) ? $_post : $post; ?>

			<header class="<?php the_classes( $s_classes['section'] ); ?>">
				<div data-layout="hero" class="<?php the_classes( $s_classes['layout'] ); ?>">
					<div class="<?php the_classes( $s_classes['columns'] ); ?>">
						<?php include locate_template( 'template-parts/singular/hero.php' ); ?>
					</div>
					<div class="<?php the_classes( $s_classes['columns'] ); ?> grid-cols-[1fr_auto] items-baseline">
						<div>
							<?php foreach ( wp_get_object_terms( $post->ID, 'category' ) as $term ) : ?>
								<?php set_query_var( 'term', $term ); ?>
								<?php get_template_part( 'template-parts/base/button-taxonomy' ); ?>
							<?php endforeach; ?>
						</div>
						<div>
							<p class=""><?php the_date(); ?></p>
						</div>
					</div>
					<div class="<?php the_classes( $s_classes['columns'] ); ?>">
						<h1 class="mt-4 -mb-4 text-2xl leading-tight"><?php the_title(); ?></h1>
					</div>
				</div>
			</header>


			<?php if ( 'talent' === $post->post_type ) : ?>
				<?php
				$definitions = array(
					'items' => array(
						array( 'terms' => array('Profession'), 'definitions' => array( get_field( 'profession' ) ?: '—' ) ),
						array( 'terms' => array('Project'), 'definitions' => array( get_field( 'project' ) ?: '—' ) ),
						array( 'terms' => array('Based in'), 'definitions' => array( get_field( 'city' ) ?: '—' ) ),
						array( 'terms' => array('Platform Member'), 'definitions' => array( get_field( 'organization' ) ?: '—' ) ),
						array( 'terms' => array('Works at'), 'definitions' => array( get_field( 'workplace' ) ?: '—' ) ),
					),
				);
				?>

				<section class="grid gap-4 grid-cols-5">
					<div class="flex flex-col gap-2 col-span-2">
						<figure class="aspect-w-1 aspect-h-1 bg-black/10 rounded-2xl overflow-hidden">
							<?php echo wp_get_attachment_image( get_field( 'image' ), 'post-list-thumbnails-square', false, array( 'class' => 'w-full h-full object-cover' ) ); ?>
						</figure>

						<div class="mb-auto">
							<p class="text-xl font-semibold"><?php the_field( 'name' ); ?></p>
						</div>

						<?php foreach ( get_field( 'buttons' ) ?: array() as $button ) : ?>
							<?php if ( $button['url'] ) : ?>
								<?php set_query_var( 'button', array( 'label' => $button['label'] ?: $button['url'], 'href' => $button['url'] ) ); ?>
								<?php get_template_part( 'template-parts/base/button' ); ?>
							<?php endif; ?>
						<?php endforeach; ?>

						<div class="">
							<?php $social_links = get_field( 'social_media' )['links']; ?>
							<?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
						</div>
					</div>

					<div class="col-span-3">
						<?php set_query_var( 'list', $definitions ); ?>
						<?php get_template_part( 'template-parts/base/list-definitions' ); ?>
					</div>
				</section>

			<?php endif; ?>


			<?php if ( have_rows( 'post_content' ) ) : ?>
				<section class="<?php the_classes( $s_classes['article'] ); ?> _[&_p:first-of-type]:font-semibold _[&_p:first-of-type]:text-[112.5%]">

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

							<div data-layout="<?php echo esc_attr( get_row_layout() ); ?>" class="<?php the_classes( $s_classes['layout'] ); ?>">

								<?php if ( 'text_content' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php the_sub_field( 'text' ); ?></div>
								<?php elseif ( 'image_content' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/image.php' ); ?></div>
								<?php elseif ( 'slider_content' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/slider.php' ); ?></div>
								<?php elseif ( 'multi_columns' === get_row_layout() ) : ?>
									<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/columns.php' ); ?></div>
								<?php endif; ?>

							</div>

						<?php endif; ?>
					<?php endwhile; ?>

				</section>
			<?php endif; ?>


			<?php if ( 'tribe_events' === $post->post_type ) : ?>
				<section class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="event-details" class="<?php the_classes( $s_classes['layout'] ); ?>">

						<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/event.php' ); ?></div>
						<div class="<?php the_classes( $s_classes['columns'] ); ?>"><?php include locate_template( 'template-parts/singular/map.php' ); ?></div>

					</div>
				</section>
			<?php endif; ?>


			<?php if ( 'post' === $post->post_type ) : ?>
				<footer class="<?php the_classes( $s_classes['section'] ); ?>">
					<div data-layout="post-credits" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<?php

						$tags = array_map(
							function ( $item ) { return array( 'label' => $item->name, 'href' => get_term_link( $item ) ); },
							wp_get_object_terms( $post->ID, 'post_tag' )
						);
						$definitions = array(
							'items' => array(
								array( 'terms' => array('Author'), 'definitions' => array( get_the_author() ?: '—' ) ),
								array( 'terms' => array('Institution'), 'definitions' => array( 'Name of the institution/s' ?: '—' ) ),
								array( 'terms' => array('Tags'), 'definitions' => array( $tags ?: '—' ) ),
							),
						);

						?>

						<p class="text-xl font-light">Blogpost credits</p>
						<?php set_query_var( 'list', $definitions ); ?>
						<?php get_template_part( 'template-parts/base/list-definitions' ); ?>

					</div>
				</footer>

				<?php
				$latest_posts = new WP_Query(
					array(
						'post__not_in'   => array($post->ID),
						'post_type'      => 'post',
						'posts_per_page' => '3',
					),
				);
				?>
				<nav class="">
					<div data-layout="post-latest" class="<?php the_classes( $s_classes['layout'] ); ?>">
						<p class="text-xl font-light">Latest posts</p>
						<ul class="grid gap-4">
							<?php while ( $latest_posts->have_posts() ) : ?>
								<?php $latest_posts->the_post(); ?>
								<li class=""><?php get_template_part( 'template-parts/base/card' ); ?></li>
							<?php endwhile ?>
						</ul>
					</div>
				</nav>
			<?php endif; ?>

		<?php endwhile; ?>

	</article>
</main>


<?php get_footer(); ?>
