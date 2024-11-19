<?php 
/**
 * ✅ Template part for Title Logos layout
 */
$title_title_logos= get_sub_field('title');
$logos_title_logos= get_sub_field('logos');
?> 

<div class="p-10">
    <h3 class="text-4xl"><?php echo $title_title_logos; ?></h3>
    <div class="flex flex-wrap justify-center max-w-[1100px] mx-auto gap-5 py-10">
        <?php foreach($logos_title_logos as $logo): ?>
            <a href="<?php echo ($logo['description']) ?: $logo['description']; ?>" target="_blank" class="flex">
                <img 
                    class="max-w-[15rem] max-h-[3rem] object-contain"
                    src="<?php echo $logo['url']; ?>" 
                    alt="<?php echo $logo['alt']; ?>"
                >
            </a>
           
        <?php endforeach; ?>
    </div>
</div>