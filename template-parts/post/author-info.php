<div class="bg-black text-white w-full lg:min-w-[400px] lg:max-w-[400px] pl-10 pt-10 pr-5 pb-3">
    <h1 class="text-2xl font-semibold">
        <?php echo $post->post_title; ?>
    </h1>
    <div class="grid grid-cols-2 gap-6 my-4">
        <img 
            class=" rounded-2xl"
            src="<?php echo get_the_post_thumbnail_url( $author->ID ); ?>" 
            alt="<?php echo $author->post_title; ?>"
        >
        <h3 class="text-xl font-semibold">
            <?php echo $author->post_title; ?>
        </h3>
    </div>
    <div class="border- border-t border-gray">
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Profession</div>
            <div class="text-sm"><?php echo get_field('profession', $author->ID) ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Project</div>
            <div class="text-sm"><?php echo $post->post_title; ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Based in</div>
            <div class="text-sm"><?php echo get_field('based_in', $author->ID) ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Platform Member</div>
            <div class="text-sm"><?php echo get_field('platform_member', $author->ID)->post_title; ?></div>
        </div>
        <div class="border-b border-gray grid grid-cols-2 py-1">
            <div class="text-xs opacity-75 !leading-[1.5]">Works at</div>
            <div class="text-sm"><?php echo get_field('works_at', $author->ID) ?></div>
        </div>
    </div>
    <div class="flex justify-between mt-4">
        <a 
            class="block border border-gray rounded-full h-fit py-[0.3rem] px-7 text-sm no-underline hover:opacity-50" 
            target="_blank" 
            href="<?php echo get_field('website', $author->ID) ?>"
        >
            Website
        </a>
        <div class="flex gap-1">
            <div class="border border-gray p-[0.3rem] rounded-full w-fit">
                <a 
                    class="block w-5 hover:opacity-50" 
                    target="_blank" 
                    href="<?php echo get_field('instagram', $author->ID) ?>"
                >
                    <svg class="w-full" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path fill="#FFFFFF75" d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/>
                    </svg>
                </a>
            </div>
            <div class="border border-gray p-[0.3rem] rounded-full w-fit">
                <a 
                    class="block w-5 hover:opacity-50" 
                    target="_blank" 
                    href="<?php echo get_field('facebook', $author->ID) ?>"
                >
                    <svg class="w-full" version="1.1" viewBox="0 0 56.693 56.693">
                        <path fill="#FFFFFF75" d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/>
                    </svg>
                </a>
            </div>
            <div class="border border-gray p-[0.3rem] rounded-full w-fit">
                <a 
                    class="block w-5 hover:opacity-50" 
                    target="_blank" 
                    href="<?php echo get_field('twitter', $author->ID) ?>"
                >
                    <svg class="w-full" version="1.1" viewBox="0 0 56.693 56.693">
                        <path fill="#FFFFFF75" d="M52.837,15.065c-1.811,0.805-3.76,1.348-5.805,1.591c2.088-1.25,3.689-3.23,4.444-5.592c-1.953,1.159-4.115,2-6.418,2.454  c-1.843-1.964-4.47-3.192-7.377-3.192c-5.581,0-10.106,4.525-10.106,10.107c0,0.791,0.089,1.562,0.262,2.303  c-8.4-0.422-15.848-4.445-20.833-10.56c-0.87,1.492-1.368,3.228-1.368,5.082c0,3.506,1.784,6.6,4.496,8.412  c-1.656-0.053-3.215-0.508-4.578-1.265c-0.001,0.042-0.001,0.085-0.001,0.128c0,4.896,3.484,8.98,8.108,9.91  c-0.848,0.23-1.741,0.354-2.663,0.354c-0.652,0-1.285-0.063-1.902-0.182c1.287,4.015,5.019,6.938,9.441,7.019  c-3.459,2.711-7.816,4.327-12.552,4.327c-0.815,0-1.62-0.048-2.411-0.142c4.474,2.869,9.786,4.541,15.493,4.541  c18.591,0,28.756-15.4,28.756-28.756c0-0.438-0.009-0.875-0.028-1.309C49.769,18.873,51.483,17.092,52.837,15.065z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>