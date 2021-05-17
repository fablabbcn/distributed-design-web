<?php

/* Template Name: Form Entries */

$_title = get_the_title();
$_description = get_field( 'description' );
$_range = get_field( 'range' );

$posts_key  = 0;
$has_banner = get_field( 'has_banner' );

$i_classes = array(
	'li' => array(
		'talent'  => 'flex w-full md:w-1/2 xl:w-1/3',
		'default' => function ( $key ) {
			return array(
				$key,
				'flex w-full md:w-1/2 lg:w-1/3 xl:w-1/4',
				$key < 2 ? 'order-first' : 'order-last',
				$key < 4 ? 'md:order-first' : 'md:order-last',
				$key < 6 ? 'lg:order-first' : 'lg:order-last',
				$key < 8 ? 'xl:order-first' : 'xl:order-last',
			);
		},
	),
);

$entries = new WP_Query(
	array(
		'post_type'      => 'af_entry',
		'posts_per_page' => '-1',
		'order'          => 'ASC',
		'orderby'        => 'rand',
		'date_query'     => array(
			array(
				'after'     => $_range['from'],
				'before'    => $_range['to'],
				'inclusive' => true,
			),
	),
	)
);

?>


<?php get_header(); ?>


<main class="flex flex-col flex-grow">

	<?php set_query_var( 'title', $_title ); ?>
	<?php set_query_var( 'description', $_description ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>
	<?php get_template_part( 'template-parts/archive/aside-af_entry' ); ?>


	<section class="flex flex-grow w-full overflow-x-hidden">
		<ul class="list-reset flex flex-1 flex-wrap -mt-px -mx-px">

			<?php if ( $has_banner ) : ?>
				<li class="<?php the_classes( 'flex w-full order-none' ); ?>">
					<div id="post-<?php the_ID(); ?>" class="
						z-0 relative w-full md:h-0 border-px border-solid overflow-hidden
						md:aspect-ratio-2/1 lg:aspect-ratio-3/1 xl:aspect-ratio-4/1
					">
						<span class="z-10 md:absolute pin flex flex-col-reverse md:flex-row w-full h-full p-20">
							<?php echo wp_get_attachment_image( $thumbnail_id, 'post-thumbnail', false ); ?>
							<div class="w-full flex flex-col flex-1 justify-center">
								<div class="font-oswald uppercase"><p><?php echo get_field( 'banner' )['title']; ?></p></div>
								<div class="mt-10"><?php echo get_field( 'banner' )['description']; ?></div>
								<div class="mt-20 text-14 lg:text-18"><a
									href="<?php echo esc_attr( get_field( 'banner' )['link']['url'] ); ?>"
									target="<?php echo esc_attr( get_field( 'banner' )['link']['target'] ); ?>"
									class="inline-flex justify-center w-auto lg:w-full max-w-screen-xs items-center py-10 px-20 bg-white hocus:text-black hocus:bg-primary text-center no-underline border rounded-full overflow-hidden"
								><?php echo esc_attr( get_field( 'banner' )['link']['title'] ); ?></a></div>
							</div>
							<div class="w-full flex flex-col flex-1 justify-center">
								<?php echo wp_get_attachment_image( get_field( 'banner' )['image']['ID'], 'post-thumbnail', false, array( 'class' => 'w-full h-full object-contain' ) ); ?>
							</div>
						</span>
					</div>
				</li>
			<?php endif ?>

			<?php while ( $entries->have_posts() ) : ?>
				<?php $entries->the_post(); ?>
				<li class="<?php the_classes( $i_classes['li']['default']( $posts_key++ ) ); ?>">
					<?php get_template_part( 'template-parts/post/content', get_post_type() ); ?>
				</li>
			<?php endwhile ?>
		</ul>
	</section>

</main>

<?php get_footer(); ?>
