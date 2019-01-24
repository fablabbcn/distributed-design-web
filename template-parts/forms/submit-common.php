<?php

$default_classes = array(
	'div'   => $form_classes['input_container'],
	'label' => $form_classes['label'],
	'input' => $form_classes['input'],
);

$inputs = array(
	array(
		'label'   => 'About',
		'type'    => 'textarea',
		'classes' => array(
			'div'   => 'w-full mb-20 px-10',
			'label' => $form_classes['label'],
			'input' => $form_classes['input'],
		),
	),
	array(
		'label'   => 'Head Photo',
		'type'    => 'file',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Article Photos',
		'type'    => 'file',
		'classes' => $default_classes,
		'attr'    => 'multiple',
	),
);


foreach ( $inputs as $key => $input ) {
	set_query_var( 'input', $input );
	get_template_part( 'template-parts/forms/-input' );
}
