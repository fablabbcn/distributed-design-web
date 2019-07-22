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

$form_settings = array(
	'post'         => array(
		'form'         => false,
		'post_id'      => 'new_post',
		'post_title'   => true,
		'post_content' => false,
		'field_groups' => array(
			'group_5af44e07d13fc',
			'group_5bbb139647536',
		),
		'new_post'     => array(
			'post_type'   => $post_type,
			'post_author' => 2,
			'post_status' => 'draft',
		),
	),
	'talent'       => array(
		'form'         => false,
		'post_id'      => 'new_post',
		'post_title'   => true,
		'post_content' => false,
		'field_groups' => array(
			'group_5af44e07d13fc',
			'group_5bf1a9076319c',
			'group_5bbb139647536',
		),
		'new_post'     => array(
			'post_type'   => $post_type,
			'post_author' => 2,
			'post_status' => 'draft',
		),
	),
	'tribe_events' => array(
		'form'         => false,
		'post_id'      => 'new_post',

		'post_title'   => true,
		'post_content' => false,
		'field_groups' => array(
			'group_5af44e07d13fc',
			'group_5c0d540e1a9d3',
			'group_5bbb139647536',
			'group_5ccacc99d6a1d', // Last field-group to prevent tabs from hiding the content group 🤷‍♂️
		),
		// 'fields'       => false,

		'new_post'     => array(
			'post_type'   => $post_type,
			'post_author' => 2,
			'post_status' => 'draft',
		),
	),
);

?>


<section class="z-10 md:px-25">
	<div class="<?php echo esc_attr( $form_classes['container'] ); ?>">

		<div class="relative">

			<button data-clip="<?php echo esc_attr( $form_id ); ?>" class="<?php echo esc_attr( $form_classes['button'] ); ?>">
				<span>Add <?php echo esc_attr( 'tribe_events' === $post_type ? 'event' : $post_type ); ?></span>
			</button>

			<div id="<?php echo esc_attr( $form_id ); ?>" class="clip z-50 fixed pin justify-center w-full h-full overflow-x-hidden overflow-y-auto">
				<button data-clip="<?php echo esc_attr( $form_id ); ?>" class="fixed pin w-full h-full bg-black-20 cursor-pointer"></button>

				<div class="flex flex-col w-full my-auto p-20 md:pt-160 md:px-45 md:pb-85">
					<form id="acf-form" class="acf-form <?php echo esc_attr( $form_classes['form'] ); ?>" action="" method="post" enctype="multipart/form-data">

						<?php if ( is_user_logged_in() ) : ?>
							<?php acf_form( $form_settings[ $post_type ] ); ?>

						<?php else : ?>
							<?php set_query_var( 'form_id', $form_id ); ?>
							<?php set_query_var( 'post_type', $post_type ); ?>
							<?php set_query_var( 'form_classes', $form_classes ); ?>
							<?php get_template_part( $form_path ); ?>

						<?php endif; ?>
						<button type="submit" class="<?php echo esc_attr( $form_classes['button'] ); ?>">
							<span><?php echo esc_attr( is_user_logged_in() ? 'Submit' : 'Sign In' ); ?></span>
						</button>

					</form>
				</div>
			</div>

		</div>

	</div>
</section>
