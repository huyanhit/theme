<?php
/* get categories */
$taxonomy = 'categories-pricing';
$_category = array();
if(!isset($atts['cat']) || $atts['cat']=='' && taxonomy_exists($taxonomy)){
    $terms = get_terms($taxonomy);
    foreach ($terms as $cat){
        $_category[] = $cat->term_id;
    }
} else {
    $_category  = explode(',', $atts['cat']);
}
$atts['categories'] = $_category;

?>

<div class="zo-grid-wrapper zo-pricing-default <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="zo-grid <?php echo esc_attr($atts['grid_class']);?> zo-gird-pricing-item-wrap">
        <?php
        $posts = $atts['posts'];
        $i = 1;
        while($posts->have_posts()) :
            $posts->the_post();
            $pricing_meta = zo_post_meta_data();
            $zo_title_size = isset( $atts['zo_title_size'] ) ? $atts['zo_title_size'] : 'h2';
        ?>
            <div class="zo-pricing-item <?php echo 0 === $i++ % 2 ? 'even' : 'odd'; ?> <?php echo esc_attr($atts['item_class']);?> <?php echo ( $pricing_meta->_zo_is_feature == 1 ) ? ' pricing-feature-item' : '' ?> ">
                <div class="zo-pricing-inner">
                    <div class="zo-pricing-title"><?php the_title();?></div>
                    <div class="zo-pricing-price">
                        <span class="unit"><?php esc_html_e('$', 'semitri'); ?></span><span class="price"><?php echo esc_attr($pricing_meta->_zo_price); ?><?php esc_html_e(' / ', 'semitri'); ?></span><span class="time"><?php echo esc_attr($pricing_meta->_zo_value); ?></span>
						<?php $attachment = wp_get_attachment_image_src($pricing_meta->_zo_icon,'full', false); ?>
						<span class="zo-pricing-icon"><img src="<?php echo esc_attr($attachment[0]) ?>"/></span>
					</div>
				    <div class="zo-pricing-meta">
                        <?php the_content(); ?>
						<div class="zo-pricing-button">
							<?php printf('<a class="btn-pricing" href="%s">%s</a>', esc_url($pricing_meta->_zo_button_url), esc_attr($pricing_meta->_zo_button_text) ) ; ?>
						</div>
                    </div>
                </div>
             </div>
        <?php
        endwhile;
    wp_reset_postdata();
    ?>
</div>
</div>