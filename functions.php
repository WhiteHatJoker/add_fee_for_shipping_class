//Function to check if certain shipping class of the product in the cart
function cart_has_product_with_shipping_class( $slug ) {
 
    global $woocommerce;
 
    $product_in_cart = false;
 
    // start of the loop that fetches the cart items
 
    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
 
        $_product = $values['data'];
        $terms = get_the_terms( $_product->id, 'product_shipping_class' );
 
        if ( $terms ) {
            foreach ( $terms as $term ) {
                $_shippingclass = $term->slug;
                if ( $slug === $_shippingclass ) {
                     
                    // Our Shipping Class is in cart!
                    $product_in_cart = true;
                }
            }
        }
    }
 
    return $product_in_cart;
}

//Handling Fees

add_action( 'woocommerce_cart_calculate_fees','woocommerce_custom_surcharge' );
function woocommerce_custom_surcharge() {
  global $woocommerce;
  $fixed = 30;

    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    if (cart_has_product_with_shipping_class( 'tsar-nicoulai' )) {
        $woocommerce->cart->add_fee( 'Tsar Nicoulai Shipping Fee :', $fixed, true, '' );
    }
    if (cart_has_product_with_shipping_class( 'tonewood' )) {
        $woocommerce->cart->add_fee( 'Tonewood Shipping Fee :', $fixed, true, '' );
    }
    if (cart_has_product_with_shipping_class( 'life-basics' )) {
		$woocommerce->cart->add_fee( 'Life Basics Shipping Fee :', $fixed, true, '' );
	}
}
