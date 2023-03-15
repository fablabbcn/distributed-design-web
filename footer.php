<?php

$contact = get_field( 'contact', 'options' );

$logo = array(
	'src' => get_stylesheet_directory_uri() . '/assets/images/ce-logo.png',
	'alt' => 'Co-funded by the Creative European Programme of the European Union',
);


?>
		<aside class="grid gap-12 mt-auto px-8 py-12 text-white bg-green">
			<?php get_template_part( 'template-parts/blocks/footer/newsletter' ); ?>
		</aside>

		<footer class="grid gap-12 p-12 text-white bg-black">

			<div class="grid grid-cols-1 gap-4 text-sm">
				<?php get_template_part( 'template-parts/blocks/footer/logos' ); ?>
			</div>

			<div class="grid grid-cols-2 items-baseline gap-4 text-sm">
				<div class="grid gap-6 [&_img]:w-auto [&_img]:max-h-8 [&_img]:brightness-0 [&_img]:invert">
					<?php echo wp_kses_post( $contact['left'] ); ?>
				</div>
				<div class="grid gap-6 [&_img]:w-auto [&_img]:max-h-8 [&_img]:brightness-0 [&_img]:invert">
					<?php echo wp_kses_post( $contact['right'] ); ?>
				</div>
			</div>

			<div class="text-xs">
				<p class="text-center">
					<small>&copy; 2023 Distributed Design. All Rights Reserved.</small>
				</p>
			</div>

		</footer>

	</div>

	<div id="wp-footer"><?php wp_footer(); ?></div>

</body>
</html>
