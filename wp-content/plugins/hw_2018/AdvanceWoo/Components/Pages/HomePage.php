<?php

class HomePage {

    public static function get () {
        ?>
        <div class="woocommerce">
            <form class="woocommerce-cart-form" action="http://wp2.dev/cart/" method="post">

                <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity">Quantity</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr class="woocommerce-cart-form__cart-item cart_item">

                        <td class="product-remove">
                            <a href="http://wp2.dev/cart/?remove_item=735b90b4568125ed6c3f678819b6e058&amp;_wpnonce=1b6accd19c" class="remove" aria-label="Remove this item" data-product_id="67" data-product_sku="woo-single">×</a>						</td>

                        <td class="product-thumbnail"><a href="http://wp2.dev/product/single/"><img width="324" height="324" src="//wp2.dev/wp-content/uploads/2018/04/single-1-324x324.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail wp-post-image" alt="" srcset="//wp2.dev/wp-content/uploads/2018/04/single-1-324x324.jpg 324w, //wp2.dev/wp-content/uploads/2018/04/single-1-416x416.jpg 416w, //wp2.dev/wp-content/uploads/2018/04/single-1-150x150.jpg 150w, //wp2.dev/wp-content/uploads/2018/04/single-1-300x300.jpg 300w, //wp2.dev/wp-content/uploads/2018/04/single-1-768x768.jpg 768w, //wp2.dev/wp-content/uploads/2018/04/single-1-100x100.jpg 100w, //wp2.dev/wp-content/uploads/2018/04/single-1.jpg 800w" sizes="(max-width: 324px) 100vw, 324px"></a></td>

                        <td class="product-name" data-title="Product"><a href="http://wp2.dev/product/single/">Single</a></td>

                        <td class="product-price" data-title="Price">
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span>						</td>

                        <td class="product-quantity" data-title="Quantity">	<div class="quantity">
                                <label class="screen-reader-text" for="quantity_5aeb0de395cb8">Quantity</label>
                                <input type="number" id="quantity_5aeb0de395cb8" class="input-text qty text" step="1" min="0" max="" name="cart[735b90b4568125ed6c3f678819b6e058][qty]" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric" aria-labelledby="Single quantity">
                            </div>
                        </td>

                        <td class="product-subtotal" data-title="Total">
                            <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span>						</td>
                    </tr>


                    <tr>
                        <td colspan="6" class="actions">

                            <div class="coupon">
                                <label for="coupon_code">Coupon:</label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> <input type="submit" class="button" name="apply_coupon" value="Apply coupon">
                            </div>

                            <button type="submit" class="button" name="update_cart" value="Update cart" disabled="">Update cart</button>


                            <input type="hidden" id="_wpnonce" name="_wpnonce" value="1b6accd19c"><input type="hidden" name="_wp_http_referer" value="/cart/">				</td>
                    </tr>

                    </tbody>
                </table>
            </form>

            <div class="cart-collaterals">
                <div class="cart_totals ">


                    <h2>Cart totals</h2>

                    <table cellspacing="0" class="shop_table shop_table_responsive">

                        <tbody><tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span></td>
                        </tr>


                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">د.إ</span>2.00</span></strong> </td>
                        </tr>


                        </tbody></table>

                    <div class="wc-proceed-to-checkout">

                        <a href="http://wp2.dev/checkout/" class="checkout-button button alt wc-forward">
                            Proceed to checkout</a>
                    </div>


                </div>
            </div>

        </div>
        <?php
    }

}