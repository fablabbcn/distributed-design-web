<?php

$menu_name  = 'primary';
$locations  = get_nav_menu_locations();
$menu_items = wp_get_nav_menu_items( wp_get_nav_menu_object( $locations[ $menu_name ] )->term_id );

?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head <?php do_action( 'add_head_attributes' ); ?> >
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="google-site-verification" content="-snNuf9qHLlRhI4otn0BxPg5rf4JEuZzptP7kkvtrR4" />

	<title><?php wp_title( ' | ', true, 'right' ); ?></title>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-108533710-2"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag () { dataLayer.push(arguments); }
		gtag('js', new Date());
		gtag('config', 'UA-108533710-2');
	</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class( 'text-black bg-gray text-base font-sans' ); ?> >
	<div class="sr-only" aria-hidden="true"><?php require_once 'assets/img/icons.svg'; ?></div>

	<div class="flex flex-col min-h-screen">
		<header class="z-50 sticky top-0 grid bg-gray" :class="open ? 'grid-rows-[auto_1fr] h-screen' : ''" x-data="{ open: false }">

			<div class="flex justify-between items-center px-8 py-4">
				<a class="no-underline" href="<?php echo esc_url( home_url() ); ?>">
					<?php echo get_bloginfo( 'name' ); ?>
				</a>
				<button class="flex justify-center items-center" @click="open = !open">
					<svg class="w-12 h-12 fill-none stroke-black stroke-2" viewBox="0 0 115.67 115.67">
						<path d="M57.84 115.67V0M115.67 57.84H0" />
					</svg>
				</button>
			</div>

			<nav class="z-0 relative w-full px-8 py-12 overflow-auto" x-show="open" x-transition>
				<!-- <div class="z-0 absolute top-full right-0 w-[50vw] h-[50vw] -mt-[12.5vw] -mr-[6.25vw] bg-yellow rounded-full blur-[128px]"></div> -->
				<div class="sticky top-[-48px] -mb-px border-t border-black"></div>
				<ul class="z-10 relative flex flex-col w-full">
					<?php foreach ( $menu_items as $key => $menu_item ) : ?>
						<li class="">
							<?php /* if ( intval( $menu_item->object_id, 10 ) === $post->ID ) : */ ?>
							<a class="flex justify-start items-center space-x-8 py-6 border-t border-black no-underline" href="<?php echo esc_url( $menu_item->url ); ?>">
								<span class="flex justify-center items-center w-12 h-8 border border-black rounded-full">
									<span class="text-sm text-center">0<?php echo $key + 1; ?></span>
								</span>
								<span class="text-4xl font-thin"><?php echo wp_kses_post( $menu_item->title ); ?></span>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>

		</header>
