<?php

$colors = array(
    'resources'    => 'lime',
    'tribe_events' => 'magenta',
);

$color            = $colors[ $post_type ];
$post_type_object = get_post_type_object( $post_type );

?>


<header class="tabs-header <?php echo $post_type; ?>-header">

    <h1 class="clip"><?php echo $post_type_object->label; ?></h1>

    <div class="flex tab-filters <?php echo $post_type; ?>-filter">
    <?php foreach ( $terms as $key => $term ) : ?>
        <?php $button_clip  = get_button_clip( $terms, $term, 'list', 'get_term_slug' ); ?>
        <?php $button_class = implode( ' ', [ "flex-1 py-20 hover:bg-$color border-b border-l", 0 === $key ? "bg-$color" : '' ] ); ?>

        <button
            data-clip="<?php echo $button_clip; ?>"
            class="<?php echo esc_attr( $button_class ); ?>"
        ><h2><?php echo get_term_name( $term ); ?></h2></button>

    <?php endforeach; ?>
    </div>

</header>
