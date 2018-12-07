<?php

$contact_info = get_theme_mod( 'theme_contact', ( '
	<span class="str">Pujades, 102</span>
	<span class="str">08005 Barcelona, Spain</span>
	<span class="str">T. <a href="tel:933209520">933 20 95 20</a></span>
	<span class="str"><a href="tel:933454322">933 45 43 22</a></span>
	<span class="str"><a href="mailto:info@ddmp.net">info@ddmp.net</a></span>
' ) );

?>


		<footer id="footer">
			<div class="footer-address py-20 px-40 border-b"><?php _e( $contact_info, 'ddmp' ); ?></div>
			<div class="footer-founding flex justify-center p-40">
				<img src="<?php echo get_stylesheet_directory_uri() . '/assets/images'; ?>/ce-logo.png"
					alt="Co-funded by the Creative European Programme of the European Union" />
			</div>
		</footer>

	</div>

	<?php wp_footer(); ?>

</body>
</html>
