<?php
/**
 * Template part for displaying posts
 */

$mod     = ( $wp_query->current_post ) % 4;
$is_even = 0 === $mod || 1 === $mod;

$a_classes   = array( 'flex', $is_even ? 'flex-row' : 'flex-row-reverse', 'w-full hocus:text-inherit no-underline' );
$img_classes = array( 'block w-full h-full group-hocus:opacity-70 border-px object-cover' );
$dl_classes  = array( 'flex flex-col flex-grow justify-center p-10 md:p-15 border-px' );
$dt_classes  = array( 'leading-normal font-light capitalize' );
$dd_classes  = array( 'leading-normal font-semibold' );

?>


<div id="post-<?php the_ID(); ?>" class="flex w-full">
	<a class="group <?php the_classes( $a_classes ); ?>" href="<?php the_permalink(); ?>">

		<div class="relative flex flex-col w-full bg-black">
			<?php the_post_thumbnail( 'post-list-thumbnails-square', array( 'class' => $img_classes ) ); ?>
		</div>

		<div class="flex flex-col w-full group-hocus:bg-yellow">

			<dl class="<?php the_classes( $dl_classes ); ?>">
				<dt class="<?php the_classes( $dt_classes ); ?>"><?php the_field( 'profession' ); ?></dt>
				<dd class="<?php the_classes( $dd_classes ); ?>"><?php the_field( 'name' ); ?></dd>
			</dl>

			<dl class="<?php the_classes( $dl_classes ); ?>">
				<dt class="<?php the_classes( $dt_classes ); ?>">Project</dt>
				<dd class="<?php the_classes( $dd_classes ); ?>"><?php the_field( 'project' ); ?></dd>
			</dl>

			<dl class="<?php the_classes( $dl_classes ); ?>">
				<dt class="<?php the_classes( $dt_classes ); ?>">Profession</dt>
				<dd class="<?php the_classes( $dd_classes ); ?>"><?php the_field( 'profession' ); ?></dd>
			</dl>

			<dl class="<?php the_classes( $dl_classes ); ?>">
				<dt class="<?php the_classes( $dt_classes ); ?>">Platform Member</dt>
				<dd class="<?php the_classes( $dd_classes ); ?>"><?php the_field( 'organization' ); ?></dd>
			</dl>

		</div>

	</a>
</div>
