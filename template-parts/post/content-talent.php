<?php
/**
 * Template part for displaying posts
 */

$mod     = ( $wp_query->current_post ) % 4;
$is_even = 0 === $mod || 1 === $mod;

$a_classes  = implode( ' ', array( 'flex', $is_even ? 'flex-row' : 'flex-row-reverse', 'w-full hocus:text-inherit no-underline' ) );
$dl_classes = 'flex flex-col flex-grow justify-center p-10 md:p-15 border-px';
$dt_classes = 'leading-normal font-light capitalize';
$dd_classes = 'leading-normal font-semibold';

?>


<div id="post-<?php the_ID(); ?>" class="flex w-full">
	<a class="group <?php echo esc_attr( $a_classes ); ?>" href="<?php the_permalink(); ?>">

		<div class="relative flex flex-col w-full bg-black">
			<?php the_post_thumbnail( 'post-list-thumbnails-square', array( 'class' => 'block w-full h-full group-hocus:opacity-70 border-px object-cover' ) ); ?>
		</div>

		<div class="flex flex-col w-full group-hocus:bg-yellow">

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>"><?php the_field( 'title' ); ?></dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php the_field( 'name' ); ?></dd>
			</dl>

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>">Project</dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php the_field( 'project' ); ?></dd>
			</dl>

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>">Profession</dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php the_field( 'profession' ); ?></dd>
			</dl>

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>">Organization</dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php the_field( 'organization' ); ?></dd>
			</dl>

		</div>

	</a>
</div>
