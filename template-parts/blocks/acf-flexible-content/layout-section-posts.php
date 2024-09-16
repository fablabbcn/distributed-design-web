<?php 
/**
 * ✅ Template part for Section Posts layout
 */
$title_section_posts = get_sub_field('title');
$button_section_posts = get_sub_field('button');
$posts_section_posts = get_sub_field('posts');
$show_cat = get_sub_field('show_cat');
$show_read_more = get_sub_field('show_read_more');
$hidden_date = get_sub_field('hidden_date');
?>
<div class="py-20 flex flex-col gap-10 px-10">
    <h3 class="text-3xl"><?php echo $title_section_posts; ?></h3>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <?php foreach( $posts_section_posts as $post): ?>
            <a class="no-underline" href="<?php echo get_the_permalink( $post->ID ) ?>">
                <div class="rounded-2xl bg-white flex flex-col h-full relative">
                    <div class="w-full aspect-[1.3/1] overflow-hidden rounded-t-2xl">
                        <img 
                            class="w-full h-full object-cover object-center rounded-t-2xl hover:scale-110"
                            src="<?php echo get_the_post_thumbnail_url( $post->ID ) ?>" 
                            alt="<?php echo $post->post_title; ?>"
                        >
                    </div>
                    <div class="p-5 grow <?php echo ($show_read_more) ? 'pb-12' : '' ?>">
                        <?php 
                            $formatted_date = date('d F Y', strtotime($post->post_date));
                            $city_terms = get_the_terms($post->ID, 'city_post');
                        ?>
                        <?php if(!$hidden_date): ?>
                        <span class="text-xs">
                            <span><?php echo $formatted_date; ?></span>
                            <?php if($city_terms): ?>
                            <span>| <?php echo $city_terms[0]->name ?></span>
                            <?php endif; ?>
                        </span>
                        <?php endif; ?>
                        <h4 class="text-base"><?php echo $post->post_title; ?></h4>
                        <?php if($show_read_more): ?>
                            <div class="text-xs absolute bottom-5 left-5">Read more</div>
                        <?php endif; ?>
                    </div>
                    <?php if($show_cat): ?>
                    <?php 
                            $categories = get_the_category( $post->ID );
                            $category_list = [];
                            if ( !empty( $categories ) ) {
                                foreach( $categories as $category ) {
                                    $category_list[] = $category->name;
                                }
                            }
                            $category_names = implode(', ', $category_list);
                        ?>
                    <div class="absolute top-5 left-5 rounded-full bg-purple text-white p-2 text-xs font-semibold capitalize">
                        <?php echo $category_names; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <?php if($button_section_posts): ?>
    <a 
        class="ddp-button w-fit mx-auto"
        href="<?php echo $button_section_posts['url'] ?>" 
        target="<?php echo $button_section_posts['target'] ?>"
    >
        <?php echo $button_section_posts['title'] ?>
    </a>
    <?php endif; ?>
</div>
<?php wp_reset_postdata(); ?>