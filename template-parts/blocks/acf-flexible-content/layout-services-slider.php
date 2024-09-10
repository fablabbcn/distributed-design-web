<?php 
/**
 * ✅ Template part for Services Slider layout
 */
$services_services_slider = get_sub_field('services');
$title_services_slider = get_sub_field('title');
$description_services_slider = get_sub_field('description');
$button_services_slider = get_sub_field('button');
?>

<div class="bg-gray py-16 lg:py-32">
    <div class="swiper-first-text w-screen">
        <div class="swiper-wrapper">
            <div class="swiper-slide !flex flex-col justify-between px-10 !h-auto">
                <div class="flex flex-col gap-4">
                    <h3 class="text-5xl"><?php echo $title_services_slider; ?></h3>
                    <?php echo $description_services_slider; ?>
                </div>
                <a 
                    class="ddp-button w-fit bg-black text-white border-0" 
                    href="<?php echo $button_services_slider['url'] ?>" 
                    target="<?php echo $button_services_slider['target'] ?>"
                >
                    <?php echo $button_services_slider['title'] ?>
                </a>
                
            </div>
            <?php foreach( $services_services_slider as $service ): ?>
                <div class="swiper-slide">
                    <a class="relative" href="<?php echo get_the_permalink( $service->ID ) ?>">
                        <img src="<?php echo get_the_post_thumbnail_url( $service->ID ) ?>" alt="<?php echo $service->post_title; ?>">
                        <div class="absolute top-0 left-0 w-full h-full flex flex-col gap-y-1 justify-center items-center bg-[#00000060] text-white px-10 text-center">
                            <span class="text-2xl"><?php echo $service->post_title; ?></span>
                            <span class="text-base"><?php echo $service->post_excerpt; ?></span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>