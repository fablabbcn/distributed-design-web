<?php 
/**
 * ✅ Template part for Section Data layout
 */
$title_section_data = get_sub_field('title');
$button_section_data = get_sub_field('button');
$data_section_data = get_sub_field('datas');
$background_section_data = get_sub_field('background');
?> 
<div 
    style="background: <?php echo ($background_section_data) ?: 'transparent'; ?>"
    class="p-10 grid grid-cols-12 gap-y-5"
>
    <div class="col-span-12 lg:col-span-4 flex flex-row lg:flex-col gap-5">
        <h3 class="text-2xl w-1/2"><?php echo $title_section_data; ?></h3>
        <?php if($button_section_data): ?>
            <a 
                class="ddp-button text-nowrap w-fit h-fit" 
                href="<?php echo $button_section_data['url']; ?>" 
                target="<?php echo $button_section_data['target']; ?>"
            >
                <?php echo $button_section_data['title']; ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="col-span-12 lg:col-span-8 grid grid-cols-2 gap-10">
        <?php foreach($data_section_data as $data): ?>
            <div class="col-span-1 border-t border-black flex flex-col py-1">
                <h4 class="text-base font-semibold"><?php echo $data['title']; ?></h4>
                <h5 
                    class="text-7xl font-semibold" 
                    style="color: <?php echo $data['number_color']; ?>" 
                >
                    <?php echo $data['number']; ?>
                </h5>
                <div class="text-xs mt-2"><?php echo $data['text']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>