<?php

/* Template Name: Talents Archive */

$post->post_type = 'talents';

query_posts( array(
	'facetwp'          => true,
	'suppress_filters' => true,
	'post_type'        => 'talents',
	// 'posts_per_page'   => -1,
	'order'            => 'desc',
	'orderby'          => 'meta_value',
	'meta_key'         => '_EventStartDate',
	// 'meta_query'       => array(
	// 	array(
	// 		'key'     => '_EventEndDate',
	// 		'value'   => date('Y-m-d'),
	// 		'compare' => true || $term->slug === 'past' ? '<=' : '>=',
	// 		'type'    => 'NUMERIC,'
	// 	)
	// ),
) );

require 'archive.php';
