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
            <div 
                data-membernum="<?php echo $num_member; ?>" 
                class="col-member cursor-pointer grid grid-cols-12 gap-x-2 relative border-b py-2 <?php echo ($num_member < 2) ? 'lg:border-t' : '' ?> <?php echo ($num_member < 1) ? 'border-t' : '' ?>"
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
            </div>
            <div 
                class="fixed z-50 px-10 py-20 bg-white min-h-screen left-0 top-0 opacity-0 w-full transition-opacity duration-500 ease-in-out pointer-events-none" 
                data-membermap="<?php echo $num_member; ?>"
            >
                <div class="absolute top-10 right-10 cursor-pointer" data-closemap="<?php echo $num_member; ?>">
                    <svg width="20" viewBox="0 0 20 20">
                        <path fill="black" d="M10 8.586L2.929 1.515 1.515 2.929 8.586 10l-7.071 7.071 1.414 1.414L10 11.414l7.071 7.071 1.414-1.414L11.414 10l7.071-7.071-1.414-1.414L10 8.586z"/>
                    </svg>
                </div>
                <div class="relative h-[calc(100vh-80px)] overflow-y-auto">
                    <?php get_template_part(
                        'template-parts/base/partner/modal',
                        'partner-modal', 
                        array(
                            'partner' => $member,
                            'partner_type' => null,
                        ));
                    ?> 
                </div>
            </div>
            <?php $num_member++; ?>
        <?php endforeach; ?>
    </div>
</div>