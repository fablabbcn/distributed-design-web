<div class="bg-black text-white w-full lg:min-w-[400px] lg:max-w-[400px] pl-10 pt-10 pr-5 pb-3">
    <h1 class="text-2xl font-semibold">
        <?php the_title(); ?>
    </h1>
    <div class="grid grid-cols-2 gap-6 my-4">
        <img 
            class="rounded-2xl w-full h-full object-cover"
            src="<?php echo wp_get_attachment_image_url( get_field('image') ); ?>"
            alt="<?php the_title(); ?>"
        >

        <h3 class="text-xl font-semibold">
            <?php echo get_field('name'); ?>
        </h3>
    </div>
    <div class="border- border-t border-gray">
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Profession</div>
            <div class="text-sm"><?php echo get_field('profession'); ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Project</div>
            <div class="text-sm"><?php echo $post->post_title; ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Based in</div>
            <div class="text-sm"><?php echo get_field('city'); ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Platform Member</div>
            <div class="text-sm"><?php echo get_field('organization'); ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Works at</div>
            <div class="text-sm"><?php echo (get_field('workplace') ? get_field('workplace') : '-'); ?></div>
        </div>
    </div>
    <div class="flex justify-between mt-4">
        <?php foreach ( get_field( 'buttons' ) ?: array() as $button ) : ?>
            <?php if ( $button['url'] ) : ?>
                <?php set_query_var( 'button', array( 'label' => $button['label'] ?: $button['url'], 'href' => $button['url'] ) ); ?>
                <?php get_template_part( 'template-parts/base/button' ); ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <div class="flex gap-1">
            <div>
                <?php $social_links = get_field( 'social_media' )['links']; ?>
                <?php require locate_template( 'template-parts/blocks/social-links.php' ); ?>
            </div>
        </div>
    </div>
</div>