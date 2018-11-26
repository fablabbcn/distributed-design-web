<?php
/**
 * Template part for displaying posts
 */

$winer   = get_field( 'winner' );
$project = get_field( 'project' );

$dl_classes = 'flex flex-col flex-grow justify-center p-10 md:p-15 border';
$dt_classes = 'leading-normal font-light';
$dd_classes = 'leading-normal font-semibold';

?>


<div id="post-<?php the_ID(); ?>" class="group w-full">
	<a class="flex w-full hover:text-inherit" href="<?php the_permalink(); ?>">

		<div class="relative flex flex-col w-full bg-black">
			<?php the_post_thumbnail( 'post-list-thumbnails-square', array( 'class' => 'block w-full h-full group-hover:opacity-70 border object-cover' ) ); ?>
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
