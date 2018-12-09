<aside class="flex -mt-border border-t">

    <div class="px-40 py-20 bg-gray border-b" style="width: 28.45%;">
        <div class="flex items-center">
            <span class="search-icon"><?php include get_template_directory() . '/assets/images/search.svg'; ?></span>
            <?php get_search_form(); ?>
        </div>
    </div>

    <div class="relative flex justify-between items-baseline flex-1 px-20 py-20 bg-gray uppercase border-l border-b">

        <p class="text-22 font-oswald font-bold">Distributed Design Event Calendar</p>
        <p class="text-20 font-bold">
            <button data-clip="event-months" class="flex uppercase">
                <span class="mr-10"><?php echo date( 'F' ); ?></span>
                <span class="w-20"><?php include get_template_directory() . '/assets/images/caret.svg'; ?></span>
            </button>
        </p>

        <div id="event-months" class="clip z-50 absolute pin-x inset-t-full mt-border">
            <ul class="list-reset bg-gray">
            <?php for ( $iM = 1; $iM <= 12; $iM++ ) : ?>
                <?php $date = date( 'F', strtotime( "$iM/01/2019" ) ); ?>
                <?php $is_current = $date === date( 'F' ); ?>
                <?php $button_classes = 'flex w-full px-20 py-10 hover:bg-magenta uppercase'; ?>
                <?php $button_classes = $is_current ? "$button_classes font-bold" : $button_classes; ?>

                <li class="flex border-b">
                    <button data-month="<?php echo esc_attr( strtolower( $date ) ); ?>"
                        class="<?php echo esc_attr( $button_classes ); ?>"><?php echo $date; ?></button>
                </li>

            <?php endfor; ?>
            </ul>
        </div>

    </div>

</aside>
