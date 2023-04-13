<?php

$contact = get_field( 'contact', 'options' );

$logo = array(
	'src' => get_stylesheet_directory_uri() . '/assets/images/ce-logo.png',
	'alt' => 'Co-funded by the Creative European Programme of the European Union',
);


?>
		<aside class="mt-auto text-white bg-green">
			<?php get_template_part( 'template-parts/blocks/footer/newsletter' ); ?>
		</aside>

		<footer class="grid gap-12 p-12 text-white bg-black">

			<div class="grid-layout text-sm">
				<?php get_template_part( 'template-parts/blocks/footer/logos' ); ?>
			</div>

			<div class="grid-layout grid-cols-2 lg:grid-cols-8 items-baseline text-sm">
				<div class="grid gap-6 lg:col-start-3 lg:col-end-5 [&_img]:inline-block [&_img]:w-auto [&_img]:max-h-8 [&_img]:brightness-0 [&_img]:invert">
					<?php echo wp_kses_post( $contact['left'] ); ?>
				</div>
				<div class="grid gap-6 lg:col-start-5 lg:col-end-7 [&_img]:inline-block [&_img]:w-auto [&_img]:max-h-8 [&_img]:brightness-0 [&_img]:invert">
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
