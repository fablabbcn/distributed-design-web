<?php get_header(); ?>

<?php while ( have_posts() ) : ?>
    <?php the_post(); ?>
    <h1 class="hidden"><?php the_title(); ?></h1>
    <?php get_template_part(
        'template-parts/base/partner/modal',
        'partner-modal', 
        array(
            'partner' => get_post(),
            'partner_type' => null,
        ));
    ?> 
<?php endwhile; ?>

<?php get_footer(); ?>