<?php 
/**
 * ✅ Template part for Our Members layout
 */
$title_our_members = get_sub_field('title');
$text_our_members = get_sub_field('text');
$args_our_members = array(
    'post_type'      => 'member',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
);
$members_our_members = new WP_Query( $args_our_members );
?>  

<div class="py-20 px-10 grid grid-cols-12 lg:gap-20 bg-white">
    <div class="col-span-12 lg:col-span-4 flex flex-col justify-between gap-5">
        <h3 class="text-5xl">
            <?php echo $title_our_members; ?>
        </h3>
        <div class="text-base">
            <?php echo $text_our_members; ?>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-8 flex justify-center items-center gap-4 flex-wrap brightness-0 max-w-[1000px] mx-auto">
        <?php if($members_our_members->have_posts()): ?>
            <?php while($members_our_members->have_posts()): $members_our_members->the_post(); ?>
            <figure class="flex">
                <a href="<?php echo (get_field('external_link', get_the_ID())) ? (get_field('external_link', get_the_ID())) : the_permalink(); ?>" <?php echo (get_field('external_link', get_the_ID())) ? 'target="_blank"' : '' ?> >
                    <img class="w-auto max-h-8" src="<?php echo get_field('logo', get_the_ID())['url'] ?>" alt="<?php echo get_field('logo', get_the_ID())['alt'] ?>">
                </a>
            </figure>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>    
    </div>
</div>