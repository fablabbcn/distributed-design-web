<?php

$has_submission = af_has_submission();
$modal_id       = "modal-form-$this_post";

$n_classes = array(
	'title'    => 'w-full text-20 lg:text-36 font-oswald uppercase',
	'input'    => 'w-full p-10 lg:p-20 text-16 bg-white border',
	'submit'   => 'w-full p-10 lg:p-20 text-white hocus:text-black bg-black hocus:bg-primary font-oswald font-medium uppercase border border-black',
	'checkbox' => 'flex items-start w-full mt-20 text-16 font-normal',
);

?>


<div
	data-modal
	id="<?php echo esc_attr( $modal_id ); ?>"
	class="<?php echo $has_submission ? '' : 'clip'; ?> z-50 fixed pin justify-center w-full h-full overflow-x-hidden overflow-y-auto"
>
	<button data-clip="<?php echo esc_attr( $modal_id ); ?>" class="fixed pin w-full h-full bg-black-50 cursor-pointer"></button>

	<div data-modal="container" class="flex flex-col justify-center items-center w-full my-auto p-10 pt-85 md:pt-160 md:px-45 md:pb-85">
		<div class="z-50 relative w-full max-w-screen-md bg-gray" className="p-20 border">

			<?php if ( ! $has_submission ) : ?>
				<header class="relative flex flex-col w-full px-10 py-20 md:px-20 md:py-30 border border-b-0">
					<p class="<?php the_classes( $n_classes['title'] ); ?>"><?php wp_kses_ddmp( 'APPLY TO THE DISTRIBUTED DESIGN AWARDS' ); ?></p>
				</header>
			<?php endif; ?>

			<?php
				advanced_form(
					$this_form,
					array(
						'display_title'       => false,
						'display_description' => false,
						'submit_text'         => 'Submit Application',
						'post_content'        => false,
						'uploader'            => 'basic',
					)
				);
			?>

		</div>
	</div>
</div>
