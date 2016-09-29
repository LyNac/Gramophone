<?php
/**
 *******************************************************************************
 * //woocommerce/content-product.php
 *******************************************************************************
 *
 * The template for displaying product content
 * within loops
 *
 * @author
 * @copyright
 * @link
 * @todo
 * @license
 * @since
 * @version
**/

if ( ! defined( 'ABSPATH' ) )
{
    exit; // exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
    $woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
    $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
    return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] )
{
    $classes[] = 'first';
}

if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
{
    $classes[] = 'last';
}

?>

<div class="col-xs-12 col-sm-6 col-md-3" <?php post_class( $classes ); ?>>
    <div class="card">

    <?php
        /**
        * woocommerce_before_shop_loop_item hook.
        *
        * @hooked woocommerce_template_loop_product_link_open - 10
        */
        //do_action( 'woocommerce_before_shop_loop_item' );

        /**
        * woocommerce_before_shop_loop_item_title hook.
        *
        * @hooked woocommerce_show_product_loop_sale_flash - 10
        * @hooked woocommerce_template_loop_product_thumbnail - 10
        */
        do_action( 'woocommerce_before_shop_loop_item_title' );

        /**
        * woocommerce_shop_loop_item_title hook.
        *
        * @hooked woocommerce_template_loop_product_title - 10
        */
        do_action( 'woocommerce_shop_loop_item_title' );

        /**
        * woocommerce_after_shop_loop_item_title hook.
        *
        * @hooked woocommerce_template_loop_rating - 5
        * @hooked woocommerce_template_loop_price - 10
        */
        do_action( 'woocommerce_after_shop_loop_item_title' );

        /**
        * woocommerce_after_shop_loop_item hook.
        *
        * @hooked woocommerce_template_loop_product_link_close - 5
        * @hooked woocommerce_template_loop_add_to_cart - 10
        */
        do_action( 'woocommerce_after_shop_loop_item' );
    ?>

    </div>
</div>
