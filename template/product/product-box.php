<?php global $product ?>

<div class="pro-box border-color-3 text-center border-rad-1 overflow-hidden">
    <div class="pro-img d-flex justify-content-center position-relative">
        <a href="<?= $product->get_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
        <div class="pro-action-box">
            <ul class="list-none d-flex">
                <li>
                    <a href="#">
                        <i class="fal fa-heart"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fal fa-repeat-alt"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fal fa-eye"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="pro-info">
        <h3 class="min-height-pro">
            <a href="<?= $product->get_permalink(); ?>"> <?= $product->get_title(); ?> </a>
        </h3>
        <div class="pro-info-price">

            <?php if ($price_html = $product->get_price_html()) : ?>
            <span class="price"> <?php echo $price_html; ?></span>
            <?php else: ?>
            <span class="no-price"> Read more </span>
            <?php endif; ?>

        </div>


        <div class="pro-star d-inline-flex">
            <div class="rating-star">
                <div class="rate" style="width: <?= woo_average_rate($product->get_average_rating()); ?>"></div>
            </div>
            <div class="rating-num ms-3"> (<?php  echo $product->get_rating_count(); ?>) </div>
        </div>

<!--      if u want show nothing when have not any rate , just set one if $product->get_rating_count(); == 0 { dont show anything }   -->

        <div class="add-to-cart "><?php
            echo sprintf( '<a href="%s" data-quantity="1" class="%s btn btn-danger rounded-pill fw-light anis-btn-s1" %s>%s</a>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( implode( ' ', array_filter( array(
                    'button', 'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                ) ) ) ),
                wc_implode_html_attributes( array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ) ),
                esc_html( $product->add_to_cart_text() )
            );
            ?></div>





    </div>
</div>
