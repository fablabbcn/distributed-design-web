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
    <div class="col-span-12 lg:col-span-8 flex justify-center gap-5 flex-wrap brightness-0">
        <?php if($members_our_members->have_posts()): ?>
            <?php while($members_our_members->have_posts()): $members_our_members->the_post(); ?>
            <a href="<?php the_permalink(); ?>">
                <img 
                    width="480" 
                    class="w-14 h-auto hover:opacity-50" 
                    src="<?php echo get_field('logo', get_the_ID())['url'] ?>" 
                    alt="<?php echo get_field('logo', get_the_ID())['alt'] ?>"
                >
            </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>    
    </div>
</div>