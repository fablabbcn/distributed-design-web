<?php
/**
 * Template part for displaying posts
 */

$ct_classes = array(
	'a'   => array(
		'flex',
		1 > ( $wp_query->current_post ) % 2 ? 'flex-row' : 'flex-row-reverse',
		2 > ( $wp_query->current_post ) % 4 ? 'md:flex-row' : 'md:flex-row-reverse',
		3 > ( $wp_query->current_post ) % 6 ? 'xl:flex-row' : 'xl:flex-row-reverse',
		'w-full hocus:text-inherit no-underline',
	),
	'img' => array( 'block w-full h-full group-hocus:opacity-70 border-px bg-center bg-cover object-cover' ),
	'dl'  => array( 'flex flex-col flex-grow justify-center p-10 md:p-15 border-px' ),
	'dt'  => array( 'leading-normal font-light capitalize' ),
	'dd'  => array( 'leading-normal font-semibold' ),
);

?>


<div id="post-<?php the_ID(); ?>" class="flex w-full">
	<a class="group <?php the_classes( $ct_classes['a'] ); ?>" href="<?php the_permalink(); ?>">

		<div class="relative flex flex-col w-full bg-black">
			<figure class="<?php the_classes( $ct_classes['img'] ); ?>"
				style="background-image: url(<?php the_post_thumbnail_url( 'post-list-thumbnails-square' ); ?>);">
				<?php the_post_thumbnail( 'post-list-thumbnails-square', array( 'class' => 'clip' ) ); ?>
			</figure>
		</div>

		<div class="flex flex-col w-full group-hocus:bg-yellow">

			<dl class="<?php the_classes( $ct_classes['dl'] ); ?>">
				<dt class="<?php the_classes( $ct_classes['dt'] ); ?>"><?php the_field( 'profession' ); ?></dt>
				<dd class="<?php the_classes( $ct_classes['dd'] ); ?>"><?php the_field( 'name' ); ?></dd>
			</dl>

			<dl class="<?php the_classes( $ct_classes['dl'] ); ?>">
				<dt class="<?php the_classes( $ct_classes['dt'] ); ?>">Project</dt>
				<dd class="<?php the_classes( $ct_classes['dd'] ); ?>"><?php the_field( 'project' ); ?></dd>
			</dl>

			<dl class="<?php the_classes( $ct_classes['dl'] ); ?>">
				<dt class="<?php the_classes( $ct_classes['dt'] ); ?>">Profession</dt>
				<dd class="<?php the_classes( $ct_classes['dd'] ); ?>"><?php the_field( 'profession' ); ?></dd>
			</dl>

			<dl class="<?php the_classes( $ct_classes['dl'] ); ?>">
				<dt class="<?php the_classes( $ct_classes['dt'] ); ?>">Platform Member</dt>
				<dd class="<?php the_classes( $ct_classes['dd'] ); ?>"><?php the_field( 'organization' ); ?></dd>
			</dl>

		</div>

	</a>
</div>
