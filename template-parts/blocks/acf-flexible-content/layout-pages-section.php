<?php 
/**
 * ✅ Template part for Pages Section layout
 */
$title_pages_section = get_sub_field('title');
$pages_pages_section = get_sub_field('pages');
$background_pages_section = get_sub_field('background');
$cardscolor_pages_section = get_sub_field('cards_color');
?>
<div 
    class="bg-indigo py-16 lg:py-32"
    style="background: <?php echo ($background_pages_section) ?: 'transparent'; ?>"
>
    <div class="px-10">
        <h2 
            style="color: <?php echo ($cardscolor_pages_section) ? 'black' : 'white'; ?>"
            class="text-5xl mb-8 lg:mb-16 lg:w-1/2"
        >
            <?php echo esc_html($title_pages_section); ?>
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?php if( $pages_pages_section ): ?>
                <?php foreach( $pages_pages_section as $page ): ?>
                    <div 
                        class="w-full bg-white rounded-2xl"
                        style="background: <?php echo ($cardscolor_pages_section) ?: 'white'; ?>"
                    >
                        <?php if( has_post_thumbnail( $page->ID ) ): ?>
                            <img 
                                src="<?php echo get_the_post_thumbnail_url( $page->ID ); ?>" 
                                alt="<?php echo esc_attr( get_the_title( $page->ID ) ); ?>" 
                                class="w-full aspect-[16/9] rounded-t-2xl object-cover object-center"
                            >
                        <?php endif; ?>
                        <div class="flex flex-col gap-4 py-4 px-6">
                            <h3 class="text-xl font-bold"><?php echo esc_html( get_the_title( $page->ID ) ); ?></h3>
                            <p class="text-base"><?php echo esc_html( get_the_excerpt( $page->ID ) ); ?></p>
                            <a class="text-xs mt-4" href="<?php echo esc_url( get_the_permalink( $page->ID ) ); ?>">Read more</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>