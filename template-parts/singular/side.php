<?php

$details = array_filter(
	array(
		'heading'    => get_field( 'left_column_heading' ),
		'subheading' => get_field( 'left_column_subheading' ),
		'bottom'     => get_field( 'left_column_bottom' ),
	)
);

require locate_template(
	'talent' !== $post_type
	? 'template-parts/singular/details.php'
	: 'template-parts/post/talent-info.php'
);
