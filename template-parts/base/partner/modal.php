<?php 
$partner = $args['partner'];
$partner_type = $args['partner_type'];
$modal_title = get_field('modal_title', $partner->ID) ? get_field('modal_title', $partner->ID) : get_the_title($partner->ID);
$gallery = get_field('gallery', $partner->ID);
?>
<div class="flex flex-col lg:flex-row gap-4 lg:gap-6 p-1 lg:p-4">
    <div class="w-full lg:max-w-[200px]">
        <div class="text-xl lg:text-3xl"><?php echo wp_kses_ddmp( $modal_title ); ?></div>
        <?php if ( get_field('link', $partner->ID) ) : ?>
        <?php $link = get_field('link', $partner->ID); ?>
            <a target="_blank" class="absolute top-4 left-4 lg:top-auto lg:bottom-4 text-sm leading-none border border-black focus-visible:outline-none focus-visible:border-black px-4 lg:px-6 py-1 lg:py-2 rounded-full no-underline hover:bg-black hover:text-white transition-colors"  href="<?php echo esc_url( $link['url'] ); ?>">Website</a>
        <?php endif; ?>
    </div>
    <div class="flex flex-col lg:flex-1 gap-y-4 lg:gap-y-6 leading-normal">
        <div class="pb-4 lg:pb-6 border-b text-base">
            <?php echo wp_kses_ddmp( get_field('description', $partner->ID) ); ?>
        </div>
        <?php if ( get_field('modal_what', $partner->ID) ) : ?>
            <div class="flex flex-col lg:flex-row gap-4 lg:gap-10">
                <div class="min-w-[210px] max-w-[30%] text-2xl"><?php get_field('modal_what_title', $partner->ID) ? wp_kses_ddmp( get_field('modal_what_title', $partner->ID) ) : 'What do they do?'; ?></div>
                <div class="text-sm flex flex-col gap-y-2"><?php echo wp_kses_ddmp( get_field('modal_what', $partner->ID) ); ?></div>
            </div>
        <?php endif; ?>

        <?php if ($gallery) : ?>
            <div class="grid-layout grid-cols-1 lg:grid-cols-12 gap-3">
                <?php foreach ($gallery as $image) : ?>
                    <div class="col-span-4 aspect-1">
                        <img class="w-full h-full object-cover rounded-2xl" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-auto">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>