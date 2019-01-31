<?php
/**
 * Template part for Statistics layout
 */

$caption     = get_sub_field( 'caption' );
$description = get_sub_field( 'description' );
$items       = get_sub_field( 'items' );

?>


<?php if ( $caption or $items ) : ?>
	<section id="statistics">

		<?php set_query_var( 'caption', $caption ); ?>
		<?php set_query_var( 'description', $description ); ?>
		<?php get_template_part( 'template-parts/front-page/section-header' ); ?>

	<?php if ( $items ) : ?>
		<div class="statistics active relative border-b">

			<ul class="tab-set list-reset flex flex-wrap w-full lg:w-3/5 ml-auto -mb-border" role="tablist">
			<?php foreach ( $items as $key => $item ) : ?>
				<?php if ( $item['cover']['number'] ) : ?>
					<?php $id = "tabs-0$layout-0$key"; ?>
					<?php // echo (($key == 0) ? 'class="active"' : ''); ?>

					<li class="group w-1/3 border-b border-l" role="presentation">
						<?php
						$cover_classes = implode( ' ', array(
							'flex flex-col pt-10 px-15 lg:px-10 pb-20 lg:pb-30',
							'hover:bg-' . $item['cover']['color'],
							'cursor-pointer',
						) );
						?>

						<div class="<?php echo esc_attr( $cover_classes ); ?>">
							<p class="text-12 lg:text-14 leading-normal font-light"><?php echo $item['cover']['title']; ?></p>
							<p class="text-5vw leading-none tracking-tight text-center font-bold font-oswald"><?php echo $item['cover']['number']; ?></p>
						</div>

						<div class="absolute pin-y pin-l hidden group-hover:block w-full lg:w-2/5 py-10 pr-20 pl-45">
							<header class="heading"><h2><?php echo $item['cover']['title']; ?></h2></header>
							<div><?php echo str_replace( array( '<ul' ), array( '<ul class="list-reset lg:col-count-2"' ), $item['text'] ); ?></div>
						</div>

					</li>

				<?php endif; ?>
			<?php endforeach ?>
			</ul>

		</div>
	<?php endif ?>

	</section>
<?php endif ?>
