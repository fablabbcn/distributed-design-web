<?php 
/**
 * ✅ Template part for Slider With Text layout
 */
$media_slider_with_text = get_sub_field('media');
$text_slider_with_text = get_sub_field('text');
$index_slider_with_text = 0;
?>

<div class="bg-black text-white pb-16 lg:pb-32 overflow-x-hidden">
    <div class="swiper-first-text w-screen">
        <div class="swiper-wrapper">
            <?php foreach( $media_slider_with_text as $img ): ?>
                <?php $index_slider_with_text++; ?>
                <div class="swiper-slide">
                    <img 
                        class="rounded-2xl aspect-[0.80] object-cover object-center <?= ($index_slider_with_text == 1) ? 'ml-auto w-4/5' : 'w-full' ?>" 
                        width="1024" 
                        src="<?php echo $img['url'] ?>" 
                        alt="<?php echo $img['alt'] ?>"
                    >
                    <?php if($index_slider_with_text == 1): ?>
                        <div class="mt-10 px-10 text-base"><?php echo $text_slider_with_text; ?></div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>