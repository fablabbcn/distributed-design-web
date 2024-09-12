<?php 
/**
 * ✅ Template part for Quotes layout
 */
$background_quotes = get_sub_field('background');
$quotes_quotes = get_sub_field('quotes');
?>
<div 
    class="py-20 px-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5"
    style="background: <?php echo ($background_quotes) ? $background_quotes : 'transparent' ?>"
>
    <?php foreach($quotes_quotes as $quote): ?>
        <div class="bg-white text-black relative rounded-lg pb-32 p-5">
            <svg class="w-20 h-20" height="48" viewBox="0 0 48 48" width="48" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 34h6l4-8v-12h-12v12h6zm16 0h6l4-8v-12h-12v12h6z"/>
                <path d="M0 0h48v48h-48z" fill="none"/>
            </svg>
            <div class="text-base"><?php echo $quote['quote']; ?></div>
            <div class="absolute bottom-5 left-5 text-base font-semibold"><?php echo $quote['author']; ?></div>
        </div>
    <?php endforeach; ?>
</div>