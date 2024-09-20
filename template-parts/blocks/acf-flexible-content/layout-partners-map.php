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
                    <div class="flex flex-wrap gap-y-2 gap-x-2 lg:gap-x-10">
                        <button
                            class="bg-white partners-map-filter ddp-button"
                            data-filter="all"
                        >
                            Show all
                        </button>
                        <?php foreach ($partner_types as $partner_type) : ?>
                        <button 
                            class="partners-map-filter ddp-button border-transparent"
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
            <div class="acf-map w-full h-[400px] lg:aspect-w-16 lg:aspect-h-7 overflow-hidden" data-zoom="16">
                <?php foreach( $partners as $partner ) : ?>
                    <?php 
                    $location = get_field('location', $partner->ID);
                    $partner_type = get_the_terms($partner->ID, 'partner_type') ? get_the_terms($partner->ID, 'partner_type')[0] : null;
                    if ( $location ) : 
                    ?>
                        <div
                            class="marker opacity-0"
                            data-title="<?php echo esc_attr( get_the_title($partner->ID) ); ?>"
                            data-lat="<?php echo esc_attr( $location['lat'] ); ?>"
                            data-lng="<?php echo esc_attr( $location['lng'] ); ?>"
                            data-color="<?php echo esc_attr( get_field('type_color', $partner_type) ); ?>"
                            data-filter="<?php echo esc_attr( $partner_type->slug ); ?>"
                        >
                           <?php get_template_part(
                                'template-parts/base/partner/modal',
                                'partner-modal', 
                                array(
                                    'partner' => $partner,
                                    'partner_type' => $partner_type,
                                ));
                            ?> 
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php setup_postdata( $post ); ?>
            </div>
        <?php endif; ?>

    </div>

</section>