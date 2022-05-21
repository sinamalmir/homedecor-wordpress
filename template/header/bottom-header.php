<!-- bottom header -->
<section class="bottom-header border-color-1">
    <nav class="nav">
        <div class="container">
            <div class="row">

                <div class="col-md-2 header-left">
                    <a href="#">
                        <span>anis.</span>
                    </a>
                </div>


                <div class="col-md-8 header-center">


                    <div class="megaMenu-main submega-main home-menu-fixed">


                        <?php
                        $header_menu_id = get_menu_id('main_menu');
                        //       this function give to us some information from that id and then we can use this information for show our menu
                        $header_menus = wp_get_nav_menu_items($header_menu_id);
                        if (!empty($header_menus) && is_array($header_menus)) { ?>

                        <ul class="megaheading">

                            <?php

                            foreach ($header_menus as $menu_item) {
                                if (!$menu_item->menu_item_parent) {
                                    $child_menu_items = get_child_menu_items($header_menus, $menu_item->ID);
                                    $has_children = !empty($child_menu_items) && is_array($child_menu_items);

                                    if (!$has_children) { ?>
                                        <!--                                  any item who have not children is show here-->

                                        <li class="mega-headingbox">
                                            <a href="<?php echo esc_url($menu_item->url) ?>">
                                                <?php echo esc_html($menu_item->title) ?>
                                            </a>
                                        </li>

                                    <?php } elseif (get_class_menu($menu_item) !== 'mega-menu-all') { ?>
                                        <!--                             any item who have child (level 1)        -->

                                        <li class="mega-dropdown">
                                            <a href="<?php echo esc_url($menu_item->url) ?>">
                                                <?php echo esc_html($menu_item->title) ?>
                                            </a>

                                            <ul class="dropdown-menu-items">
                                                <?php
                                                foreach ($child_menu_items as $child_menu_item) { ?>

                                                    <li>
                                                        <a href="<?php echo esc_url($child_menu_item->url) ?>">
                                                            <?php echo esc_html($child_menu_item->title) ?>
                                                        </a>
                                                    </li>


                                                <?php }
                                                ?>

                                            </ul>
                                        </li>


                                    <?php } elseif (get_class_menu($menu_item) == 'mega-menu-all') { ?>

                                        <li class="mega-headingbox mega-menu-all"><a
                                                    href="<?php echo esc_url($menu_item->url) ?> "> <?php echo esc_html($menu_item->title) ?> </a>
                                            <ul>

                                                <?php
                                                foreach ($child_menu_items as $child_menu_item) { ?>
                                                    <li>
                                                        <div class="megatopWrapper">
                                                            <div class="mega-inner bgwhite">
                                                                <div class="mega">
                                                                    <div class="mega-heading"><a
                                                                                href="<?php echo esc_url($child_menu_item->url) ?> "> <?php echo esc_html($child_menu_item->title) ?> </a>
                                                                    </div>
                                                                    <ul>
<!--                                                                        -->
                                                                        <li><a href="#"> Face Primer </a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                <?php }
                                                ?>


                                            </ul>
                                        </li>

                                        <!--                                                        <div class="mega-inner bggray">-->
                                        <!--                                                            <div class="mega-menu-img"><img src="-->
                                        <!--                                            --><?php //echo HD_TDU; ?><!--/assets/images/menu_banner6.jpg" alt=""></div>-->
                                        <!--                                                        </div>-->


                                    <?php }
                                }
                            }

                            ?>

                            <?php
                            }


                            ?>


                            <div class="mega-headingbox"><a href="#" class="offers-hover" id="offerBlock"></a></div>

                        </ul>

                    </div>


                </div>


                <div class="col-md-2 header-right">
                    <ul class="head-right-item">
                        <li>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fal fa-search"></i>
                            </a>
                        </li>
                        <li class="cart-trigger">
                            <a href="#" class="cart-trigger">
                                <i class="fal fa-shopping-bag "></i>
                                <span class="cart-count">2</span>
                            </a>

                            <div class="cart-box">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo HD_TDU; ?>/assets/images/cart_thamb1.jpg" alt="">
                                        </a>
                                    </li>

                                    <div class="cart-header">
                                        <span class="cart-name"> sofa chair </span>

                                        <span class="cart-price">$380.00</span>


                                        <div class="increase-cart">
                                            <span> 2 </span>
                                        </div>
                                    </div>

                                    <div class="close-cart">
                                        <a href="#" class="remove-item"> <i class="far fa-times"></i> </a>
                                    </div>

                                </ul>

                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="<?php echo HD_TDU; ?>/assets/images/cart_thamb1.jpg" alt="">
                                        </a>
                                    </li>

                                    <div class="cart-header">
                                        <span class="cart-name"> sofa chair </span>

                                        <span class="cart-price">$380.00</span>


                                        <div class="increase-cart">
                                            <span> 2 </span>
                                        </div>
                                    </div>

                                    <div class="close-cart">
                                        <a href="#" class="remove-item"> <i class="far fa-times"></i> </a>
                                    </div>
                                </ul>

                                <div class="cart-footer">
                                    <div class="total-price">
                                        <span> subtotal : </span>
                                        <span> $680.00 </span>
                                    </div>
                                    <div class="cart-btn">
                                        <a href="#" class="btn btn-outline-danger  fw-light"> view cart </a>
                                        <a href="#" class="btn btn-danger fw-light"> checkout </a>
                                    </div>


                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

</section>
<!-- end bottom header -->