<div class="<?php echo $post_type; ?>-content">
<?php foreach ( $term_slugs as $key => $term ) : ?>

    <div id="<?php echo $post_type; ?>-list-<?php echo $term; ?>" class="<?php echo 0 === $key ? '' : 'clip'; ?>">
        <?php set_query_var( 'term', $term ); ?>
        <?php get_template_part( "template-parts/archive/loop-$post_type" ); ?>
    </div>

<?php endforeach; ?>
</div>
