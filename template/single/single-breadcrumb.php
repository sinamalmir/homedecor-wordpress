
<!-- start breadcrumb -->
<section class="brd-section bg-color-5">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 col-md-12">
                <div class="page-title">

                    <?php
                        if (is_archive()){
                            the_archive_title('<h1 class=" mb-0 title-pro">' , '</h1>');
                        }elseif (is_search()){
                            echo '<h1 class=" mb-0 title-pro">' ;
                            echo $wp_query ->found_posts;
                            _e(' Search result for : ','locale') ; the_search_query();
                            echo '</h1>';
                        }
                        else{
                            the_title('<h1 class=" mb-0 title-pro">' , '</h1>');
                        }
                    ?>

                </div>
            </div>

            <div class="col-lg-6 col-md-12 mt-4">
                <div class="">

                    <?php
                    if (class_exists('woocommerce')){
                        if (is_product() || is_product_taxonomy() || is_shop() || is_checkout() || is_cart()){
                            woocommerce_breadcrumb();
                        }
                        else { ?>
                              <ol class="breadcrumb mb-0 float-lg-end float-md-start">
                        <li class="breadcrumb-item"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></li>

                        <?php if (!is_archive() && !is_search() && !is_page()){ ?>
                            <li class="breadcrumb-item"> <?php the_category(' / '); ?> </li>
                        <?php  } ?>






                        <li class="breadcrumb-item active" aria-current="page">
                            <?php
                            if (is_archive()){
                                the_archive_title();
                            }elseif (is_search()){
                                echo $wp_query ->found_posts;
                                _e(' Search result for : ','locale') ; the_search_query();
                            }
                            else{
                                the_title();
                            }
                            ?>

                        </li>
                    </ol>
                          <?php   }
                        }else { ?>
                          <ol class="breadcrumb mb-0 float-lg-end float-md-start">
                        <li class="breadcrumb-item"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></li>

                        <?php if (!is_archive() && !is_search() && !is_page()){ ?>
                            <li class="breadcrumb-item"> <?php the_category(' / '); ?> </li>
                        <?php  } ?>






                        <li class="breadcrumb-item active" aria-current="page">
                            <?php
                            if (is_archive()){
                                the_archive_title();
                            }elseif (is_search()){
                                echo $wp_query ->found_posts;
                                _e(' Search result for : ','locale') ; the_search_query();
                            }
                            else{
                                the_title();
                            }
                            ?>

                        </li>
                    </ol>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- end breadcrumb-->
