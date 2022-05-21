<div class="blog-navigation">
    <div class="row justify-content-between align-items-center p-4">


        <div class=" col-5">
            <?php
            previous_post_link('%link', '      <div class="post-nav-prev float-start">
                    <i class="fal fa-long-arrow-left"></i>
                    <span> %title </span>
                </div>');
            ?>
        </div>


        <div class=" col-2">
            <a href="<?php bloginfo('url'); ?>"><span class="post-nav-home"><i
                            class="fal fa-home-lg-alt"></i></span></a>
        </div>


        <div class=" col-5">
            <?php
            next_post_link('%link', '    <div class="post-nav-next float-end">
                    <span> %title </span>
                    <i class="fal fa-long-arrow-right"></i>
                </div>');
            ?>
        </div>


    </div>
</div>