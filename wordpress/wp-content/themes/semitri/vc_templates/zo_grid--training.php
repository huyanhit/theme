<?php 
    /* get categories */
        $taxo = 'category';
        $_category = array();
        if(!isset($atts['cat']) || $atts['cat']==''){
            $terms = get_terms($taxo);
            foreach ($terms as $cat){
                $_category[] = $cat->term_id;
            }
        } else {
            $_category  = explode(',', $atts['cat']);
        }
        $atts['categories'] = $_category;
		
		$zo_pagination = isset( $atts['zo_pagination'] ) ? $atts['zo_pagination']: 0;
?>
<div class="zo-grid-wrapper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <div class="row zo-grid <?php echo esc_attr($atts['grid_class']);?>">
        <?php
        $posts = $atts['posts'];
        $size = ( isset($atts['layout']) && $atts['layout']=='basic')?'medium':'full';
        while($posts->have_posts()){
            $posts->the_post();
            $groups = array();
            $groups[] = '"all"';
            foreach(zoGetCategoriesByPostID(get_the_ID(),$taxo) as $category){
                $groups[] = '"category-'.$category->slug.'"';
            }
            ?>
            <div class="zo-grid-item <?php echo esc_attr($atts['item_class']);?>" data-groups='[<?php echo implode(',', $groups);?>]'>
                <?php 
                    if(has_post_thumbnail() && !post_password_required() && !is_attachment() &&  wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), $size, false)):
                        $class = ' has-thumbnail';
                        $thumbnail = get_the_post_thumbnail(get_the_ID(),$size);
                    else:
                        $class = ' no-image';
                        $thumbnail = '<img src="'.ZO_IMAGES.'no-image.jpg" alt="'.get_the_title().'" />';
                    endif;
                    echo '<div class="zo-grid-media '.esc_attr($class).'">'.$thumbnail;
					?>
					<div class="zo-grid-content">
						<?php echo the_content(); ?>
					</div>
					<div class="zo-carousel-info">
						<div class="zo-carousel-icon">
							<a href="<?php the_permalink()?>"> <i class="fa fa-link"></i></a>
						</div>
						<h3 class="zo-carousel-title">
							<a href="<?php the_permalink()?>"> <?php the_title();?></a>
						</h3>
					</div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
		if($zo_pagination){
			zo_paging_nav($posts);
		}
		wp_reset_postdata();
    ?>
</div>