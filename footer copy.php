		<footer id="footer">
			<div class="top-part">
				<div class="col">
					<a href="<?php echo esc_url( home_url() ); ?>" class="logo">
						<strong><?php _e('Distributed Design','ddmp') ?></strong>&nbsp;<?php _e('Market Platform','ddmp') ?></a>
				</div><!-- / col -->
				<nav>
					 <?php wp_nav_menu( array(
				      'theme_location' => 'secondary',
				      'container' => false
				     ) );  ?>	
				</nav>
			</div><!-- / top-part -->
			<?php $contact_info = get_theme_mod('theme_contact', '<span class="str">Pujades, 102</span>
<span class="str">08005 Barcelona, Spain</span>
<span class="str">T. <a href="tel:933209520">933 20 95 20</a></span>
<span class="str"><a href="tel:933454322">933 45 43 22</a></span>
<span class="str"><a href="mailto:info@ddmp.net">info@ddmp.net</a></span>'); ?>
			<?php if ($contact_info): ?>				
				<div class="container-fluid bottom-part c-contact-info">
					<p>
						<?php _e($contact_info, 'ddmp'); ?>					
					</p>
				</div><!-- / container-fluid -->
			<?php endif ?>
			
		</footer><!-- / footer -->
	</div><!-- / wrapper -->
<?php wp_footer(); ?>
</body>
</html>