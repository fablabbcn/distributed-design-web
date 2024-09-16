<?php
/**
 * ✅ Template part for Featured Posts layout
 */

$title = get_sub_field( 'title' );
$description = get_sub_field( 'description' );
$partners = get_posts( array(
    'post_type' => 'partner',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
) );
$partner_types = get_terms( array(
    'taxonomy' => 'partner_type',
    'hide_empty' => true,
) );
?>

<section class="relative grid-layout flex flex-col gap-y-10 p-10">

    <div class="grid-layout grid-cols-1 lg:grid-cols-12 col-span-full lg:col-span-12">
        <?php if ( $title ) : ?>
            <h3 class="text-xl lg:text-3xl font-light lg:col-span-4"><?php wp_kses_ddmp( $title ); ?></h3>
        <?php endif; ?>
        <?php if ( $description ) : ?>
            <div class="rich-text lg:col-span-8 lg:pr-16">
                <?php wp_kses_ddmp( $description ); ?>
                <?php if ($partner_types) : ?>
                    <div class="flex flex-wrap gap-2">
                        <button
                            class="bg-white partners-map-filter py-1 px-2 rounded-full leading-none no-underline border border-black hover:border-black"
                            data-filter="all"
                        >
                            Show all
                        </button>
                        <?php foreach ($partner_types as $partner_type) : ?>
                        <button 
                            class="partners-map-filter py-1 px-2 rounded-full leading-none no-underline border border-transparent hover:border-black"
                            style="background-color: <?php echo esc_attr(get_field('type_color', $partner_type)); ?>;"
                            data-filter="<?php echo esc_attr($partner_type->slug); ?>"
                        >
                            <?php echo esc_html($partner_type->name); ?>
                        </button>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="col-span-full">
        <?php if ( $partners ) : ?>
            <div class="acf-map aspect-w-16 aspect-h-9 w-full overflow-hidden" data-zoom="16">
                <?php foreach( $partners as $partner ) : ?>
                    <?php 
                    $location = get_field('location', $partner->ID);
                    if ( $location ) : 
                        $partner_type = get_the_terms($partner->ID, 'partner_type') ? get_the_terms($partner->ID, 'partner_type')[0] : null;
                        $modal_title = get_field('modal_title', $partner->ID) ? get_field('modal_title', $partner->ID) : get_the_title($partner->ID);
                        $gallery = get_field('gallery', $partner->ID);
                    ?>
                        <div
                            class="marker opacity-0"
                            data-title="<?php echo esc_attr( get_the_title($partner->ID) ); ?>"
                            data-lat="<?php echo esc_attr( $location['lat'] ); ?>"
                            data-lng="<?php echo esc_attr( $location['lng'] ); ?>"
                            data-color="<?php echo esc_attr( get_field('type_color', $partner_type) ); ?>"
                            data-filter="<?php echo esc_attr( $partner_type->slug ); ?>"
                        >
                            <div class="flex gap-6 p-4">
                                <div class="w-full lg:max-w-[200px]">
									<div class="text-xl lg:text-3xl"><?php echo wp_kses_ddmp( $modal_title ); ?></div>
									<?php if ( get_field('link', $partner->ID) ) : ?>
									<?php $link = get_field('link', $partner->ID); ?>
										<a target="_blank" class="absolute bottom-4 left-4 text-sm leading-none border px-6 py-2 rounded-full no-underline hover:bg-black hover:text-white transition-colors"  href="<?php echo esc_url( $link['url'] ); ?>">Website</a>
									<?php endif; ?>
								</div>
                                <div class="flex flex-col lg:flex-1 gap-y-6 leading-normal">
                                    <div class="pb-6 border-b text-base">
										<?php echo wp_kses_ddmp( get_field('description', $partner->ID) ); ?>
									</div>
									<?php if ( get_field('modal_what', $partner->ID) ) : ?>
										<div class="flex gap-10">
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
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php setup_postdata( $post ); ?>
            </div>
        <?php endif; ?>

    </div>

</section>