<?php 
/**
 * ✅ Template part for Section Members layout
 */
$title_section_members = get_sub_field('title');
$members_section_members = get_sub_field('members');
?>
<div class="px-5 py-10 md:px-10 xl:p-20">
    <h2 class="text-5xl font-extralight mb-10 lg:mb-20"><?php echo $title_section_members; ?></h2>
    <div class="grid-members-section grid grid-cols-1 lg:grid-cols-2 gap-x-10">
        <?php $num_member = 0; ?>
        <?php foreach($members_section_members as $member): ?>
            <?php $places_terms = get_the_terms($member->ID, 'place_member'); ?>
            <a
                href="<?php echo the_permalink( $member->ID); ?>"
                class="col-member cursor-pointer grid grid-cols-12 gap-x-2 relative border-b py-2 no-underline <?php echo ($num_member < 2) ? 'lg:border-t' : '' ?> <?php echo ($num_member < 1) ? 'border-t' : '' ?>"
            >
                <div class="col-span-8 lg:col-span-7 text-base font-semibold">
                    <?php echo $member->post_title; ?>
                </div>
                <div class="col-span-2 relative hidden lg:block">
                    <img
                        class="absolute top-0 -mt-14 xl:-mt-20 left-0 w-full aspect-[1/1] object-cover object-center rounded-2xl opacity-0 transition-opacity duration-500 ease-in-out"
                        width="320"
                        height="320"
                        src="<?php echo get_the_post_thumbnail_url( $member->ID ) ?>"
                        alt="<?php echo $member->post_title; ?>"
                    >
                </div>  
                <div class="col-span-4 lg:col-span-3 text-sm pt-[3px]">
                    <?php echo $places_terms[0]->name; ?>
                </div>
            </a>
            <?php $num_member++; ?>
        <?php endforeach; ?>
    </div>
</div>