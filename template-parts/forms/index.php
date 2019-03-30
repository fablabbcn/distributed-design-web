<?php

$post_type = is_page_template( 'template-archive-events.php' ) ? 'tribe_events' : get_post_type();
$form_type = is_user_logged_in() ? 'submit' : 'login';

$form_id      = "form-$form_type-$post_type";
$form_path    = "template-parts/forms/$form_type";
$form_classes = array(
	'container'       => 'w-full p-20',
	'fieldset'        => 'w-full p-20 border border-solid',
	'button'          => 'w-full p-20 text-16 md:text-29 hocus:bg-primary font-oswald font-medium uppercase border',
	'form'            => 'z-50 relative bg-gray',
	'label'           => 'mb-10 text-16 md:text-19 font-oswald font-medium uppercase',
	'input_container' => 'flex flex-col w-full md:w-1/2 mb-20 px-10',
	'input'           => 'flex-grow w-full p-20 text-16 md:text-17 bg-white border',
	'radio_container' => 'flex -mx-5',
	'radio'           => 'flex-grow w-full mb-0 mx-5 p-20 text-16 md:text-17 text-center font-medium uppercase border cursor-pointer',
);

?>


<section class="z-10 md:px-25">
	<div class="<?php echo esc_attr( $form_classes['container'] ); ?>">

		<div class="relative">

			<button data-clip="<?php echo esc_attr( $form_id ); ?>" class="<?php echo esc_attr( $form_classes['button'] ); ?>">
				<span>Add <?php echo esc_attr( end( explode( '_', $post_type ) ) ); ?></span>
			</button>

			<div id="<?php echo esc_attr( $form_id ); ?>" class="clip absolute pin-x pin-b">
				<button data-clip="<?php echo esc_attr( $form_id ); ?>" class="fixed pin w-full h-full bg-black-20 cursor-pointer"></button>
				<form action="" method="post" class="<?php echo esc_attr( $form_classes['form'] ); ?>" enctype="multipart/form-data">

					<?php set_query_var( 'form_id', $form_id ); ?>
					<?php set_query_var( 'post_type', $post_type ); ?>
					<?php set_query_var( 'form_classes', $form_classes ); ?>
					<?php get_template_part( $form_path ); ?>

					<div class="-mt-border">
						<button type="submit" class="<?php echo esc_attr( $form_classes['button'] ); ?>">
							<span><?php echo esc_attr( is_user_logged_in() ? 'Submit' : 'Sign In' ); ?></span>
						</button>
					</div>

				</form>
			</div>

		</div>

	</div>
</section>
