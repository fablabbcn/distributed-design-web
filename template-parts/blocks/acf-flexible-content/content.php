<?php
/**
 * Template part for displaying flexible_content
 */

if ( have_rows( 'flexible_content' ) ) {
	while ( have_rows( 'flexible_content' ) ) {
		the_row();

		get_template_part(
			'template-parts/blocks/acf-flexible-content/layout',
			str_replace( '_', '-', get_row_layout() )
		);
	}
}
