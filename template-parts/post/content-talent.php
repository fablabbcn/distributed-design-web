<?php
/**
 * Template part for displaying posts
 */
?>


<div id="post-<?php the_ID(); ?>" class="group w-full">
	<a class="block w-full" href="<?php the_permalink(); ?>">
		<div class="flex">

			<div class="flex flex-col w-full">
				<?php the_post_thumbnail( array( 'class' => 'block w-full h-full border' ) ); ?>
			</div>

			<div class="flex flex-col w-full group-hover:bg-yellow">
				<dl class="flex flex-col flex-grow justify-center px-10 py-5 border">
					<dt class="leading-normal font-light">Designer</dt>
					<dd class="leading-normal font-semibold">Rasmus Bjerngraad</dd>
				</dl>
				<dl class="flex flex-col flex-grow justify-center px-10 py-5 border">
					<dt class="leading-normal font-light">Project</dt>
					<dd class="leading-normal font-semibold">Nextfood</dd>
				</dl>
				<dl class="flex flex-col flex-grow justify-center px-10 py-5 border">
					<dt class="leading-normal font-light">Profession</dt>
					<dd class="leading-normal font-semibold">Industrial Designer</dd>
				</dl>
				<dl class="flex flex-col flex-grow justify-center px-10 py-5 border">
					<dt class="leading-normal font-light">Organization</dt>
					<dd class="leading-normal font-semibold">Danish Design Center</dd>
				</dl>
			</div>

		</div>
	</a>
</div>
