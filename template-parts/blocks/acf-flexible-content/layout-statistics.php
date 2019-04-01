<?php
/**
 * ⛔️ Template part for Statistics layout
 */

$caption     = get_sub_field( 'caption' );
$description = get_sub_field( 'description' );
$items       = get_sub_field( 'items' );

$get_cover_classes = function ( $item ) {
	return implode(
		' ',
		array(
			'flex flex-col w-full',
			'pt-10 px-15 lg:px-10 pb-20 lg:pb-30',
			'group-hover:bg-' . $item['cover']['color'],
			'group-focus:bg-' . $item['cover']['color'],
		)
	);
};

?>


<?php if ( $caption || $items ) : ?>
	<section id="statistics">

		<?php set_query_var( 'caption', $caption ); ?>
		<?php set_query_var( 'description', $description ); ?>
		<?php get_template_part( 'template-parts/front-page/section-header' ); ?>

	<?php if ( $items ) : ?>
		<div class="statistics active relative border-b">

			<ul class="tab-set list-reset flex flex-wrap w-full lg:w-3/5 ml-auto -mb-border" role="tablist">
			<?php foreach ( $items as $key => $item ) : ?>
				<?php if ( $item['cover']['number'] ) : ?>

					<li class="w-1/3 border-b border-l" role="presentation">
						<button class="group flex w-full text-left">

							<div class="<?php echo esc_attr( $get_cover_classes( $item ) ); ?>">
								<p class="text-12 lg:text-14 leading-normal font-light">
									<?php echo wp_kses_post( $item['cover']['title'] ); ?></p>
								<p class="text-5vw leading-none tracking-tight text-center font-bold font-oswald">
									<?php echo wp_kses_post( $item['cover']['number'] ); ?></p>
							</div>

							<div class="absolute pin-y pin-l hidden group-hover:block group-focus:block w-full lg:w-2/5 py-10 pr-20 pl-45 bg-gray">
								<header class="heading"><h2><?php echo wp_kses_post( $item['cover']['title'] ); ?></h2></header>
								<div><?php echo wp_kses_post( str_replace( array( '<ul' ), array( '<ul class="list-reset lg:col-count-2"' ), $item['text'] ) ); ?></div>
							</div>

						</button>
					</li>

				<?php endif; ?>
			<?php endforeach ?>
			</ul>

		</div>
	<?php endif ?>

	</section>
<?php endif ?>
