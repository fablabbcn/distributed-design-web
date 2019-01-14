<?php

$default_classes = array(
	'div'   => $form_classes['input_container'],
	'label' => $form_classes['label'],
	'input' => $form_classes['input'],
);

$inputs = array(
	array(
		'label'   => 'Headline',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Organization',
		'type'    => 'text',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Date',
		'type'    => 'date',
		'classes' => $default_classes,
	),
	array(
		'label'   => 'Link',
		'type'    => 'url',
		'classes' => $default_classes,
	),
);


foreach ( $inputs as $key => $input ) {
	set_query_var( 'input', $input );
	get_template_part( 'template-parts/forms/-input' );
}
