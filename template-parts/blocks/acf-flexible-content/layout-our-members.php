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

<div class="py-20 px-10 grid grid-cols-12 gap-4 lg:gap-20 bg-white">
    <div class="col-span-12 lg:col-span-4 flex flex-col gap-5">
        <h3 class="text-5xl">
            <?php echo $title_our_members; ?>
        </h3>
        <div class="text-base">
            <?php echo $text_our_members; ?>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-8 grid grid-cols-4 lg:grid-cols-6 brightness-0 opacity-80 max-w-[700px] mx-auto">
        <?php if($members_our_members->have_posts()): ?>
            <?php while($members_our_members->have_posts()): $members_our_members->the_post(); ?>
            <figure class="flex justify-center w-full aspect-[1.5/1] p-4 lg:p-3">
                <a class="flex justify-center items-center" href="<?php echo (get_field('external_link', get_the_ID())) ? (get_field('external_link', get_the_ID())) : the_permalink(); ?>" <?php echo (get_field('external_link', get_the_ID())) ? 'target="_blank"' : '' ?> >
                  <img class="w-full max-h-full object-contain object-center" src="<?php echo get_field('logo', get_the_ID())['url'] ?>" alt="<?php echo get_field('logo', get_the_ID())['alt'] ?>">
                </a>
            </figure>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>    
    </div>
</div>