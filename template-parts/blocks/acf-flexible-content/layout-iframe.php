<?php
/**
 * ✅ Template part for iFrame layout
 */

$title_iframe = get_sub_field('title');
$code_iframe = get_sub_field('iframe');
?>

<div class="bg-green px-10 py-20 flex flex-col gap-20">
    <h3 class="text-white text-7xl text-center"><?php echo $title_iframe; ?></h3>
    <div class="wrapper-iframe-layout lg:px-10"><?php echo $code_iframe; ?></div>
</div>