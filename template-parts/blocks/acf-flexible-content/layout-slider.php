<?php 
/**
 * ✅ Template part for Slider layout
 */
$slides_slider = get_sub_field('slides');
$slides_hasBorder = get_sub_field('hasborder');
$slides_borderColor = get_sub_field('bordercolor');
?>
<div style="background: <?php echo ($slides_borderColor && $slides_hasBorder) ? $slides_borderColor : 'transparent' ?>" >
    <div class="overflow-x-hidden <?php echo ($slides_hasBorder) ? 'rounded-br-[8rem] lg:rounded-br-[16rem]' : '' ?>">
        <div class="swiper-common relative">
            <div class="swiper-wrapper aspect-[1/1.5] lg:aspect-[16/7] relative">
                <?php foreach($slides_slider as $slide): ?>
                    <div class="swiper-slide w-full h-full relative">
                        <img
                            class="w-full h-full object-cover object-center"
                            src="<?php echo ($slide['post']) ? get_the_post_thumbnail_url( $slide['post']->ID ) : $slide['image']['url']; ?>" 
                            alt="<?php echo ($slide['post']) ? $slide['post']->post_title : $slide['image']['alt']; ?>"
                        >
                        <div class="bg-[#00000060] absolute top-0 left-0 w-full h-full text-white">
                            <div class="relative w-full h-full">
                                <div class="text-xs absolute top-1/3 left-1/2 -translate-x-1/2 -translate-y-1/3"><?php echo $slide['info']; ?></div>
                                <div class="text-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex flex-col items-center gap-5">
                                    <?php if($slide['title'] || $slide['post']): ?>
                                        <div class="<?php echo ($slide['text'] && !$slide['post']) ? 'text-6xl font-light' : 'text-3xl' ?>">
                                            <?php if($slide['post']): ?>
                                                <a 
                                                    class="no-underline" 
                                                    href="<?php get_the_permalink($slide['post']->ID); ?>"
                                                >
                                                    <?php echo $slide['post']->post_title ?>
                                                </a>
                                            <?php else: ?>
                                                <?php echo $slide['title']; ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($slide['text'] && !$slide['post']): ?>
                                        <div class="<?php echo ($slide['title']) ? 'text-base' : 'text-3xl text-left flex flex-col gap-10'  ?>">
                                            <?php echo $slide['text']; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($slide['button']): ?>   
                                        <a 
                                            class="ddp-button w-fit bg-white border-white text-black"
                                            href="<?php echo $slide['button']['url']; ?>"
                                            target="<?php echo $slide['button']['target']; ?>"
                                        >
                                            <?php echo $slide['button']['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination my-6"></div>
            <div class="swiper-button-prev after:!content-none mx-4">
                <svg class="w-8 fill-none stroke-[var(--swiper-theme-color)] stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.65 77.12">
                <path d="M115.72 821.59c0 38.55-38.65 38.55-38.65 38.55s38.65 0 38.65 38.56" transform="translate(-77.07 -821.59)"/>
                </svg>
            </div>
            <div class="swiper-button-next after:!content-none mx-4">
                <svg class="w-8 fill-none stroke-[var(--swiper-theme-color)] stroke-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 39.65 77.12">
                <path d="M963.88 898.7c0-38.56 38.65-38.56 38.65-38.56s-38.65 0-38.65-38.55" transform="translate(-962.88 -821.59)"/>
                </svg>
            </div>
        </div>
    </div>
</div>
