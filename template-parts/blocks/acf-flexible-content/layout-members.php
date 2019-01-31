<?php
/**
 * Template part for Members layout
 */

$caption     = get_sub_field( 'caption' );
$description = get_sub_field( 'description' );
$list        = get_sub_field( 'List' );

?>


<?php if ( $caption or $list ) : ?>
	<section id="members">

		<?php set_query_var( 'caption', $caption ); ?>
		<?php set_query_var( 'description', $description ); ?>
		<?php get_template_part( 'template-parts/front-page/section-header' ); ?>

	<?php if ( $list ) : ?>
		<ul class="member-list">
		<?php foreach ( $list as $key => $item ) : ?>

			<li>
				<div class="hold">
					<?php

					$link_html = '<a class="font-oswald" href="#">';

					if ( $item['add_link'] ) {
						$link_html = $item['link']['external_link']
							? '<a class="font-oswald link-to" href="' . $item['link']['url'] . '" target="_blank">'
							: '<a class="font-oswald link-to" href="' . $item['link']['page_link'] . '">';
					}

					// echo $link_html . $item['title'] . '</a>';
					echo '<button class="font-oswald box-border">' . $item['title'] . '</button>';

					?>

				<?php if ( $item['text'] ) : ?>
					<div class="descr">
						<div class="descr-in"><?php echo $item['text']; ?></div>
					</div>
				<?php endif ?>

				</div>
			</li>

		<?php endforeach ?>
		</ul>
	<?php endif ?>

	</section>
<?php endif ?>
