<?php
if( !function_exists('zo_woo_share') ) {

    /**
     * WooCommerce Share Hook
     */
    function zo_woo_share() {
        global $post;
?>
        <ul class="social-list">
            <li class="box"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-facebook"></i></a></li>
            <li class="box"><a href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-twitter"></i></a></li>
            <li class="box"><a href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-linkedin"></i></a></li>
            <li class="box"><a href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-google-plus"></i></a></li>
            <li class="box"><a href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;"><i class="fa fa-pinterest"></i></a></li>
        </ul>
<?php
    }
}
add_action('woocommerce_share', 'zo_woo_share');


/*
** Remove tabs from product details page
*/
function zo_woo_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); // Remove the additional information tab
    unset( $tabs['tags'] );//Remove tags
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'zo_woo_remove_product_tabs', 98 );
/*Order By Tab*/
add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {
    $tabs['description']['priority'] = 5;
    $tabs['feature']['priority'] = 10;
    $tabs['user_manual']['priority'] = 15;
    $tabs['reviews']['priority'] = 25;
    return $tabs;
}
/*Add Tab*/
add_filter('woocommerce_product_tabs','feature_woocommerce_product_tabs',10,1);
add_filter('woocommerce_product_tabs','users_woocommerce_product_tabs',10,2);
add_filter('woocommerce_product_tabs','description_woocommerce_product_tabs',10,3);

/*Custom tab descripton*/
// description tab
function description_woocommerce_product_tabs($tabs){
    $newtab = array('description' => array('title'=>'Description','priority' => 100 , 'callback'=>'description_woocommerce_product_tab_html'));
    $tabs = array_merge($tabs,$newtab);
    return $tabs;
}
/*Callback Description Tab*/
function description_woocommerce_product_tab_html($key, $tab){
    global $post, $product;
    $is_terms = get_the_terms( $post->ID, 'pa_brand');
    if(!empty($is_terms)):
        ?>
        <div class="attribute">
            <h2><?php echo esc_html__('Specification for this item','woocommerce') ?></h2>
            <ul class="product-attribute">
                <?php if(!empty($product->get_attribute("brand"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Brand Name:','woocommerce'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("brand")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("part-number"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Part Number:','woocommerce'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("part-number")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("ean"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('EAN:','woocommerce'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("ean")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("import-designation"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Import Designation:','woocommerce'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("import-designation")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("item-weight"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('Item Weight:','woocommerce'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("item-weight")); ?></span>
                    </li>
                <?php endif; ?>
                <?php if(!empty($product->get_attribute("unspsc"))):?>
                    <li>
                        <span class="name"><?php echo esc_html__('UNSPSC:','woocommerce'); ?></span>
                        <span class="content"> <?php echo esc_attr($product->get_attribute("unspsc")); ?></span>
                    </li>
                <?php endif; ?>
            </ul>
            <?php
            $pro_attr = $product->get_attribute(" printed-product-color ");
            if(!empty($pro_attr)) {
                foreach ( $pro_attr as $value ) {
                    echo '<a class="color" href="#">'. $value->term_name .'</a>';
                }
            }
            ?>
        </div><!--End Attribule Product-->
        <?php
    endif;
    echo apply_filters( 'woocommerce_short_description', $post->post_content );
}
/*End Caback Tab Description*/

// feature tab
function feature_woocommerce_product_tabs($tabs){
    $newtab = array('feature' => array('title'=>'features','priority' => 100 , 'callback'=>'feature_woocommerce_product_tab_html'));
    $tabs = array_merge($tabs,$newtab);
    return $tabs;
}
function feature_woocommerce_product_tab_html(){
    global $zo_meta;
    ?>
    <ul class="product-features">

        <?php
        if(!empty($zo_meta->_zo_overall_dimensions)){
            echo '<li><span>'.esc_html__('Overall Dimensions - ','woocommerce'). $zo_meta->_zo_overall_dimensions .'</span></li>';
        }

        if(!empty($zo_meta->_zo_build_volume)){
            echo '<li><span>'.esc_html__('Build Volume - ','woocommerce'). $zo_meta->_zo_build_volume .'</span></li>';
        }

        if(!empty($zo_meta->_zo_print_speed)){
            echo '<li><span>'.esc_html__('Print Speed - ','woocommerce'). $zo_meta->_zo_print_speed .'</span></li>';
        }

        if(!empty($zo_meta->_zo_maximum_resolution)){
            echo '<li><span>'. esc_html__('Maximum Resolution - ','woocommerce').$zo_meta->_zo_maximum_resolution .'</span></li>';
        }
        ?>
        </ul>
        <ul class="product-features-right">
         <?php
        if(!empty($zo_meta->_zo_print_from_sd_card)){
            $print_card = isset( $zo_meta->_zo_print_from_sd_card ) ? $zo_meta->_zo_print_from_sd_card : 'no';
            echo '<li><span>'.esc_html__('Print from SD Card - ','woocommerce'). $print_card .'</span></li>';
        }

        if(!empty($zo_meta->_zo_print_material)){
            echo '<li><span>'.esc_html__('Print Material - ','woocommerce'). $zo_meta->_zo_print_material .'</span></li>';
        }

        if(!empty($zo_meta->_zo_noise_level)){
            echo '<li><span>'.esc_html__('Noise Level - ','woocommerce'). $zo_meta->_zo_noise_level .'</span></li>';
        }

        if(!empty($zo_meta->_zo_recommended_software)){
            echo '<li><span>'. esc_html__('Recommended Software - ','woocommerce').$zo_meta->_zo_recommended_software .'</span></li>';
        }
        ?>
        </ul>
    <?php
}

// user manual tab
function users_woocommerce_product_tabs($tabs){
    $newtab = array('user_manual' => array('title'=>'User Manual','priority' => 100 , 'callback'=>'users_woocommerce_product_tab_html'));
    $tabs = array_merge($tabs,$newtab);
    return $tabs;
}

function users_woocommerce_product_tab_html(){
    global $zo_meta;
    if(!empty($zo_meta->_zo_documents_links)){
        echo '<div class="user-menual">'. get_the_title(). '<a href="'.esc_url($zo_meta->_zo_documents_links).'" ><i class="fa fa-download"></i></a></div>';
    }

}
/*End manual tab*/
/**
 * Add Cart Clear Cart Function
 */
add_action('init', 'zo_woo_clear_cart_url');
function zo_woo_clear_cart_url() {
    global $woocommerce;
    if( isset($_REQUEST['clear_cart']) ) {
        $woocommerce->cart->empty_cart();
    }
}

//add wrap for '(Free)' or '(FREE!)' label text on cart page for Shipping and Handling
function zo_custom_shipping_free_label( $label ) {
    $label =  str_replace( "(Free)", '<span class="amount">Free</span>', $label );
    $label =  str_replace( "(FREE!)", '<span class="amount">FREE!</span>', $label );
    return $label;
}
add_filter( 'woocommerce_cart_shipping_method_full_label' , 'zo_custom_shipping_free_label' );

//Change add to cart
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' );
function woo_custom_cart_button_text() {
    return __( 'Buy now', 'woocommerce' );
}