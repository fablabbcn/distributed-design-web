<?php
$args_our_members = array(
    'post_type'      => 'member',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);
$members_our_members = new WP_Query( $args_our_members );
?>

<div class="grid-layout grid-cols-1 col-span-full lg:col-start-2 lg:col-end-7">
	<div class="flex flex-wrap gap-4 justify-center items-center brightness-0 invert">
		<?php if($members_our_members->have_posts()): ?>
            <?php while($members_our_members->have_posts()): $members_our_members->the_post(); ?>
            <figure class="flex">
                <a href="<?php echo (get_field('external_link', get_the_ID())) ? (get_field('external_link', get_the_ID())) : the_permalink(); ?>" <?php echo (get_field('external_link', get_the_ID())) ? 'target="_blank"' : '' ?> >
                    <img class="w-auto max-h-8 opacity-60" src="<?php echo get_field('logo', get_the_ID())['url'] ?>" alt="<?php echo get_field('logo', get_the_ID())['alt'] ?>">
                </a>
            </figure>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?> 
	</div>
</div>
