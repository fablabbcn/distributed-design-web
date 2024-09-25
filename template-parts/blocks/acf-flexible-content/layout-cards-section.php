<?php 
/**
 * ✅ Template part for Cards section layout
 */
$title_cards_section = get_sub_field('title');
$cards_cards_section = get_sub_field('cards');
$background_cards_section = get_sub_field('background');
$cardscolor_cards_section = get_sub_field('cards_color');
?>
<div 
    class="bg-indigo py-16 lg:py-32"
    style="background: <?php echo ($background_cards_section) ?: 'transparent'; ?>"
>
    <div class="px-10">
        <h2 
            style="color: <?php echo ($cardscolor_cards_section) ? 'black' : 'white'; ?>"
            class="text-5xl mb-8 lg:mb-16 lg:w-1/2"
        >
            <?php echo esc_html($title_cards_section); ?>
        </h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <?php if( $cards_cards_section ): ?>
                <?php foreach( $cards_cards_section as $card ): ?>
                    <div 
                        class="w-full bg-white rounded-2xl"
                        style="background: <?php echo ($cardscolor_cards_section) ?: 'white'; ?>"
                    >
                        <?php if( $card['image'] ): ?>
                            <img 
                                src="<?php echo $card['image']['url']; ?>" 
                                alt="<?php echo $card['image']['alt']; ?>" 
                                class="w-full aspect-[16/9] rounded-t-2xl object-cover object-center"
                            >
                        <?php endif; ?>
                        <div class="flex flex-col gap-4 py-4 px-6">
                            <h3 class="text-xl font-bold"><?php echo $card['title']; ?></h3>
                            <p class="text-base"><?php echo $card['text']; ?></p>
                            <a class="text-xs mt-4" target="<?php echo $card['button']['target']; ?>" href="<?php echo $card['button']['url']; ?>"><?php echo $card['button']['title']; ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>