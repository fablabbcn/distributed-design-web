<?php

$is_talent = 'talent' === get_post_type();

$_title = $is_talent ? 'Creative Talent' : 'Latest news of Distributed Design';

$i_classes = array(
	'li' => array(
		'default' => 'flex w-full md:w-1/2 lg:w-1/3 xl:w-1/4',
		'talent'  => 'flex w-full md:w-1/2 xl:w-1/3',
	),
);

$facet_archive = do_shortcode( '[facetwp template="archive_' . get_post_type() . '"]' );

acf_form_head();
get_header();

?>


<main class="flex flex-col flex-grow">

	<?php set_query_var( 'title', $_title ); ?>
	<?php get_template_part( 'template-parts/blocks/header' ); ?>


	<?php if ( 'post' !== get_post_type() ) : ?>
		<?php get_template_part( 'template-parts/archive/aside', $post_type ); ?>
	<?php endif; ?>


	<?php if ( $facet_archive ) : ?>
		<?php echo wp_kses_post( $facet_archive ); ?>

	<?php else : ?>
		<section class="flex flex-grow w-full overflow-x-hidden">
			<ul class="list-reset flex flex-1 flex-wrap -mt-px -mx-px">
				<?php while ( have_posts() ) : ?>
					<?php the_post(); ?>
					<li class="<?php the_classes( $is_talent ? $i_classes['li']['talent'] : $i_classes['li']['default'] ); ?>">
						<?php get_template_part( 'template-parts/post/content', get_post_type() ); ?>
					</li>
				<?php endwhile ?>
			</ul>
		</section>

	<?php endif; ?>


	<?php get_template_part( 'template-parts/archive/navigation' ); ?>
	<?php get_template_part( 'template-parts/forms/index' ); ?>

</main>


<?php get_footer(); ?>
