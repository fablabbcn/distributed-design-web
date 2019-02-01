<?php
/**
 * Template part for displaying posts
 */

$winer   = get_field( 'winner' );
$project = get_field( 'project' );

$mod     = ( $wp_query->current_post ) % 4;
$is_even = 0 === $mod || 1 === $mod;

$a_classes  = implode( ' ', array( 'flex', $is_even ? 'flex-row' : 'flex-row-reverse', 'w-full hover:text-inherit' ) );
$dl_classes = 'flex flex-col flex-grow justify-center p-10 md:p-15 border-px';
$dt_classes = 'leading-normal font-light';
$dd_classes = 'leading-normal font-semibold';

?>


<div data-some="<?php echo ( $wp_query->current_post ) % 4; ?>"  id="post-<?php the_ID(); ?>" class="group flex w-full">
	<a class="<?php echo esc_attr( $a_classes ); ?>" href="<?php the_permalink(); ?>">

		<div class="relative flex flex-col w-full bg-black">
			<?php the_post_thumbnail( 'post-list-thumbnails-square', array( 'class' => 'block w-full h-full group-hover:opacity-70 border-px object-cover' ) ); ?>
		</div>

		<div class="flex flex-col w-full group-hover:bg-yellow">

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>"><?php echo esc_html( $winer['title'] ); ?></dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php echo esc_html( $winer['name'] ); ?></dd>
			</dl>

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>"><?php echo esc_html( 'Project' ); ?></dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php echo esc_html( $project['name'] ); ?></dd>
			</dl>

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>"><?php echo esc_html( 'Profession' ); ?></dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php echo esc_html( $winer['profession'] ); ?></dd>
			</dl>

			<dl class="<?php echo esc_attr( $dl_classes ); ?>">
				<dt class="<?php echo esc_attr( $dt_classes ); ?>"><?php echo esc_html( 'Organization' ); ?></dt>
				<dd class="<?php echo esc_attr( $dd_classes ); ?>"><?php echo esc_html( $winer['organization'] ); ?></dd>
			</dl>

		</div>

	</a>
</div>
