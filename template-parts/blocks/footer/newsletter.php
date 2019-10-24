<?php $footer_cta = get_field( 'footer_cta', 'options' ); ?>


<div class="md:flex justify-between items-center px-15 py-40 lg:px-40">

	<div class="font-oswald font-bold uppercase">
		<p><?php echo esc_html( $footer_cta['title'] ); ?></p>
	</div>

	<div class="w-full mt-20">
		<form class="flex flex-wrap">

			<input class="w-full md:w-2/3 p-10 lg:p-20 text-16 bg-white border" type="email" placeholder="<?php echo esc_attr( $footer_cta['email_placeholder'] ); ?>" autocomplete="current-email">

			<button class="w-full md:w-1/3 lg:-ml-border p-10 lg:p-20 text-white bg-black hocus:bg-primary font-oswald font-medium uppercase border border-black" type="submit">
				<?php echo esc_html( $footer_cta['submit_label'] ); ?>
			</button>

			<input class="clip" type="checkbox" name="acceptance" id="footer-acceptance">
			<label class="flex items-center w-full mt-20 lg:mt-10 font-normal" for="footer-acceptance"><?php echo wp_kses_post( $footer_cta['acceptance_text'] ); ?></label>

		</form>
	</div>

</div>
