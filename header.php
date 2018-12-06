<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head <?php do_action( 'add_head_attributes' ); ?>>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="-snNuf9qHLlRhI4otn0BxPg5rf4JEuZzptP7kkvtrR4" />
	<title><?php wp_title( ' | ', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108533710-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-108533710-2');
	</script>

	<?php wp_head(); ?>
	<script src="https://unpkg.com/packery@2/dist/packery.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/beefup@1.1.7/dist/js/jquery.beefup.min.js"></script>
	<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
</head>
<body <?php body_class( 'leading-normal font-aileron' ); ?>>

	<b class="animsition-loading"></b>

	<div class="wrapper loading flex flex-col">
		<header id="header">
			<div class="container-fluid">

				<div class="navbar-header">
					<a href="<?php echo esc_url( home_url() ); ?>" class="navbar-brand">
						<span>
							<em class="hidden-md hidden-lg"><?php _e( 'DDMP', 'ddmp' ); ?></em>
							<em class="hidden-xs hidden-sm"><strong><?php _e( 'Distributed Design', 'ddmp' ); ?></strong> <?php _e( 'Market Platform', 'ddmp' ); ?></em>
						</span>
					</a>
					<a href="#main-nav" class="navbar-toggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<em class="sr-only">toggle mobile menu</em>
					</a>
				</div>

				<nav id="main-nav">
					<?php

					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'base',
					) );

					?>
				</nav>

			</div>
		</header>
