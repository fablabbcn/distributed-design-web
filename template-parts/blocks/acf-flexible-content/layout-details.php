<?php
/**
 * ✅ Template part for Details layout
 */

$title = get_sub_field( 'title' );
$sections = get_sub_field( 'sections' ) ?: array();

?>


<section class="grid gap-6">
	<header>
		<h2 class="text-xl font-light"><?php echo esc_html( $title ); ?></h2>
	</header>
	<div class="-space-y-px">
		<?php foreach ( $sections as $section ) : ?>
			<?php
			$_title = $section['items'] && count( $section['items'] )
				? count( $section['items'] ) . ' ' . $section['title']
				: $section['title'];
			?>

			<div class="grid grid-cols-5 gap-4">
				<header class="col-span-2 py-6 border-y">
					<p class="text-2xl"><?php echo esc_html( $_title ); ?></p>
				</header>

				<div
					class="col-span-3 py-6 border-y grid gap-8"
					x-data="{ count: <?php echo count( $section['items'] ?: array() ); ?>, maxCount: 10, isCollapsed: true }"
				>
					<?php if ( array_key_exists( 'items', $section ) && $section['items'] ) : ?>
						<ol class="columns-2 [column-gap-[1rem]] space-y-3">
							<?php foreach ( $section['items'] as $key => $item ) : ?>

								<li
									class="text-xl leading-tight"
									:class="index >= maxCount && isCollapsed && 'hidden'"
									x-data="{ index: <?php echo $key; ?>, isOpen: false }"
								>
									<?php if ( ! $item['show_modal_with_details'] ) : ?>
										<span><?php echo esc_html( $item['label'] ); ?></span>
									<?php else : ?>
										<button @click="isOpen = !isOpen"><?php echo esc_html( $item['label'] ); ?></button>

										<template x-teleport="body">
											<div x-show="isOpen" x-trap.inert.noscroll="isOpen">
												<?php set_query_var( 'modal', $item ); ?>
												<?php get_template_part( 'template-parts/base/modal' ); ?>
											</div>
										</template>
									<?php endif; ?>
								</li>

							<?php endforeach; ?>
						</ol>
					<?php endif; ?>

					<template x-if="true">
						<div
							x-show="count > maxCount && isCollapsed"
							x-transition
							@click="isCollapsed = !isCollapsed"
						>
							<?php set_query_var( 'button', array( 'label' => 'Show more' ) ); ?>
							<?php get_template_part( 'template-parts/base/button' ); ?>
						</div>
					</template>

					<?php if ( array_key_exists( 'button', $section ) && $section['button']['label'] ) : ?>
						<div class="">
							<?php set_query_var( 'button', $section['button'] ); ?>
							<?php get_template_part( 'template-parts/base/button' ); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		<?php endforeach; ?>
	</div>
</section>
