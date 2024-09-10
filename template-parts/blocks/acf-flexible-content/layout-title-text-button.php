<?php
/**
 * ✅ Template part for Title Text Button section
 */

$background_title_text_button = get_sub_field('background');
$title_title_text_button = get_sub_field('title');
$text_title_text_button = get_sub_field('text');
$button_title_text_button = get_sub_field('button');

?>
<div class="py-40 flex flex-col items-center gap-y-10 relative text-white">
    <h3 class="text-5xl">
        <?php echo $title_title_text_button; ?>
    </h3>
    <div class="text-base text-center max-w-[650px]">
        <?php echo $text_title_text_button; ?>
    </div>
    <?php if($button_title_text_button): ?>
        <a 
            class="ddp-button bg-white border-0 text-black"
            target="<?php $button_title_text_button['target'] ?>" 
            href="<?php echo $button_title_text_button['url']; ?>"
        >
            <?php echo $button_title_text_button['title']; ?>
        </a>
    <?php endif; ?>
    <img 
        class="absolute top-0 left-0 w-full h-full object-cover object-center -z-50" 
        width="1920" 
        src="<?php echo $background_title_text_button['url'] ?>"
        alt="<?php echo $background_title_text_button['alt'] ?>"
    >
</div>