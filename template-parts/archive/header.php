<header class="<?php echo $post_type; ?>-header">

    <h1 class="clip"><?php echo $post_type_object->label; ?></h1>

    <div class="bootstrap-wrapper">
        <div class="row <?php echo $post_type; ?>-filter">
        <?php foreach ( $terms as $key => $term ) : ?>
            <?php $something    = array_merge( [''], array_diff( $term_slugs, [ $term->slug ] ) ); ?>
            <?php $button_clip  = implode( ', ', array_map( 'prefix_button_clip', $something ) ); ?>
            <?php $button_class = implode( ' ', ['col tc filter-item', 0 === $key ? 'bg-lime' : 'filter-right', 'hover:bg-lime-30'] ); ?>

            <button
                data-clip="<?php echo $button_clip; ?>"
                class="<?php echo esc_attr( $button_class ); ?>"
            ><h2><?php echo $term->name; ?></h2></button>

        <?php endforeach; ?>
        </div>
    </div>

</header>
