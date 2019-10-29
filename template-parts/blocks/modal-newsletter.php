<?php

$modal_id  = "modal-resources-$this_post";
$modal_cta = get_field( 'modal_cta', $this_post )['newsletter_cta'];

$n_classes = array(
	'title'    => 'w-full text-20 lg:text-36 font-oswald uppercase',
	'input'    => 'w-full p-10 lg:p-20 text-16 bg-white border',
	'submit'   => 'w-full p-10 lg:p-20 text-white hocus:text-black bg-black hocus:bg-primary font-oswald font-medium uppercase border border-black',
	'checkbox' => 'flex items-start w-full mt-20 text-16 font-normal',
);

// TODO: Check if $has_CTA before printing shit
?>

<div id="<?php echo esc_attr( $modal_id ); ?>" class="clip z-50 fixed pin justify-center w-full h-full overflow-x-hidden overflow-y-auto">
	<button data-clip="<?php echo esc_attr( $modal_id ); ?>" class="fixed pin w-full h-full bg-black-50 cursor-pointer"></button>

	<div class="flex flex-col justify-center items-center w-full my-auto p-20 md:pt-160 md:px-45 md:pb-85">
		<div class="z-50 relative w-full max-w-screen-md p-20 bg-gray border">

			<form data-ajaxchimp class="flex flex-wrap" method="POST"
				action="//fablabbcn.us2.list-manage.com/subscribe/post?u=d67ba8deb34a23a222ec4eb8a&id=9ece23d947">
				<input type="hidden" name="CAMPAIGN" value="<?php echo esc_attr( $modal_cta['campaign'] ); ?>">

				<span class="clearfix">

					<span class="float-right w-full lg:w-1/2">
						<?php echo( get_the_post_thumbnail( $this_post, 'fullscreen', array( 'class' => 'w-full pb-15 lg:pl-15' ) ) ); ?>
					</span>

					<span class="float-left w-full lg:w-1/2">

						<span class="relative flex flex-col w-full mb-20">
							<p class="<?php the_classes( $n_classes['title'] ); ?>"><?php wp_kses_ddmp( $modal_cta['title'] ); ?></p>
						</span>

						<span class="relative flex flex-col w-full mb-20">

							<input class="<?php the_classes( $n_classes['input'] ); ?>"
								placeholder="<?php echo esc_attr( $modal_cta['email_placeholder'] ); ?>"
								type="email" name="EMAIL" autocomplete="current-email" required>

							<label>
								<input class="clip" type="checkbox" name="gdpr[37]" required>
								<span class="<?php the_classes( $n_classes['checkbox'] ); ?>"><?php echo wp_kses_post( $modal_cta['acceptance_text'] ); ?></span>
							</label>

						</span>

					</span>

					<span class="relative flex flex-col w-full">
						<button class="<?php the_classes( $n_classes['submit'] ); ?>" type="submit">
							<?php echo esc_html( $modal_cta['submit_label'] ); ?>
						</button>
					</span>

				</span>

			</form>

		</div>
	</div>
</div>
