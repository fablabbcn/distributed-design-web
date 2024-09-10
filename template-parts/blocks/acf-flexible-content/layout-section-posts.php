<?php 
/**
 * ✅ Template part for Section Posts layout
 */
$title_section_posts = get_sub_field('title');
$button_section_posts = get_sub_field('button');
$posts_section_posts = get_sub_field('posts');
?>
<div class="py-20 flex flex-col gap-10 px-10">
    <h3 class="text-3xl"><?php echo $title_section_posts; ?></h3>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <?php foreach( $posts_section_posts as $post): ?>
            <a class="no-underline" href="<?php echo get_the_permalink( $post->ID ) ?>">
                <div class="rounded-2xl bg-white">
                    <div class="w-full aspect-[1.3/1] overflow-hidden">
                        <img 
                            class="w-full h-full object-cover object-center rounded-t-2xl hover:scale-110"
                            src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" 
                            alt="<?php echo $post->post_title; ?>"
                        >
                    </div>
                    <div class="p-5">
                        <?php 
                            $formatted_date = date('d F Y', strtotime($post->post_date)); 
                            $categories = get_the_category( $post->ID );
                            $category_list = [];
                            if ( !empty( $categories ) ) {
                                foreach( $categories as $category ) {
                                    $category_list[] = $category->name;
                                }
                            }
                            $category_names = implode(', ', $category_list);
                        ?>
                        <span class="text-xs"><?php echo $formatted_date; ?> | <?php echo $category_names; ?></span>
                        <h4 class="text-base"><?php echo $post->post_title; ?></h4>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <button class="text-xs py-2 px-3 border border-black text-black rounded-full w-fit mx-auto">
        <a 
            href="<?php echo $button_section_posts['url'] ?>" 
            target="<?php echo $button_section_posts['target'] ?>"
        >
            <?php echo $button_section_posts['title'] ?>
        </a>
    </button>
</div>
<?php wp_reset_postdata(); ?>