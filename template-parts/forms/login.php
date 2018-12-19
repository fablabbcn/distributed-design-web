<?php

$container_classes = 'w-full p-20';
$fieldset_classes = $container_classes . ' border border-solid';
$button_classes = 'w-full p-20 text-16 md:text-29 hover:bg-cyan font-oswald font-medium uppercase border';
$form_classes = 'z-50 relative bg-gray';
$label_classes = 'mb-10 text-16 md:text-19 font-oswald font-medium uppercase';
$input_classes = 'w-full mb-10 p-20 text-16 md:text-17 bg-white border';
$input_container_classes = 'w-full md:w-1/2 mb-10 px-10';

?>


<div class="z-10 md:px-25">
    <div class="<?php echo esc_attr( $container_classes ); ?>">


        <div class="relative">

            <button data-clip="form-news-login" class="<?php echo esc_attr( $button_classes ); ?>">Login Form</button>

            <div id="form-news-login" class="clip absolute pin-x pin-b">
                <button data-clip="form-news-login" class="fixed pin w-full h-full"></button>
                <form action="" class="<?php echo esc_attr( $form_classes ); ?>">

                    <fieldset class="<?php echo esc_attr( $fieldset_classes ); ?>">
                        <p class="mb-20 text-16 md:text-22 font-oswald font-medium md:text-center uppercase">Log In</p>
                        <input type="text" placeholder="Username or Email" name="" id="" class="<?php echo esc_attr( $input_classes ); ?>">
                        <input type="password" placeholder="Password" name="" id="" class="<?php echo esc_attr( $input_classes ); ?>">
                        <p class="mt-10 text-12 md:text-16 md:text-center"><a class="underline" href="">Forgot your password?</a></p>
                    </fieldset>

                    <div class="-mt-border">
                        <button type="submit" class="<?php echo esc_attr( $button_classes ); ?>">Sign In</button>
                    </div>

                </form>
            </div>

        </div>


        <div class="relative">

            <button data-clip="form-news-submit" class="<?php echo esc_attr( $button_classes ); ?>">Add News</button>

            <div id="form-news-submit" class="clip absolute pin-x pin-b">
                <button data-clip="form-news-submit" class="fixed pin w-full h-full"></button>
                <form action="" class="<?php echo esc_attr( $form_classes ); ?>">

                    <fieldset class="<?php echo esc_attr( $fieldset_classes ); ?>">
                        <div class="flex flex-wrap -mx-10">

                            <div class="<?php echo esc_attr( $input_container_classes ); ?>">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">Headline</label>
                                <input type="text" name="" id="" class="<?php echo esc_attr( $input_classes ); ?>">
                            </div>

                            <div class="<?php echo esc_attr( $input_container_classes ); ?>">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">Organization</label>
                                <input type="text" name="" id="" class="<?php echo esc_attr( $input_classes ); ?>">
                            </div>

                            <div class="<?php echo esc_attr( $input_container_classes ); ?>">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">Date</label>
                                <input type="date" name="" id="" class="<?php echo esc_attr( $input_classes ); ?>">
                            </div>

                            <div class="<?php echo esc_attr( $input_container_classes ); ?>">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">Link</label>
                                <input type="url" name="" id="" class="<?php echo esc_attr( $input_classes ); ?>">
                            </div>

                            <div class="w-full px-10">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">About</label>
                                <textarea name="" id="" cols="30" rows="16" class="<?php echo esc_attr( $input_classes ); ?>"></textarea>
                            </div>

                            <div class="<?php echo esc_attr( $input_container_classes ); ?>">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">Head Photo</label>
                                <input type="file" name="" id="">
                            </div>

                            <div class="<?php echo esc_attr( $input_container_classes ); ?>">
                                <label for="" class="<?php echo esc_attr( $label_classes ); ?>">Artic Photos</label>
                                <input type="file" name="" id="">
                            </div>

                        </div>
                    </fieldset>

                    <div class="-mt-border">
                        <button type="submit" class="<?php echo esc_attr( $button_classes ); ?>">Submit</button>
                    </div>

                </form>
            </div>

        </div>


    </div>
</div>
