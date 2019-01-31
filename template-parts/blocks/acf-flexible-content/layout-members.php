<?php
/**
 * Template part for Members layout
 */

$list    = get_sub_field( 'List' );
$caption = get_sub_field( 'caption' );

?>


<?php if ( $caption ) : ?>
	<header class="page-header">
		<div class="container-fluid">
			<h2><?php echo $caption; ?></h2>
		</div>
	</header>
<?php endif ?>

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
				echo '<button class="font-oswald">' . $item['title'] . '</button>';

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
