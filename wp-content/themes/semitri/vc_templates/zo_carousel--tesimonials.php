<?php
/* Get Categories */
$taxonomy = 'category';
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
<div class="zo-carousel-wrap <?php echo esc_attr($atts['template']); ?>">
	<!-- Get Filter Query -->
	<?php if ( $atts['filter'] == "true" && !$atts['loop'] ):?>
	<div class="zo-carousel-filter">
		<ul>
			<li><a class="active" href="#" data-group="all"><?php esc_html_e("All", 'semitri');?></a></li>
			<?php
				$posts = $atts['posts'];
				$query = $posts->query;
				$taxs  = array();
				if(isset($query['tax_query'])){
					$tax_query=$query['tax_query'];
					foreach($tax_query as $tax){
						if(is_array($tax)){
							$taxs[] = $tax['terms'];
						}
					}
				}
				foreach ($atts['categories'] as $category):
					if(!empty($taxs)){
						if(in_array($category,$taxs)) {
							$term = get_term($category, $taxonomy); 
				?>
							<li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
			<?php 		}
					}else{
						$term = get_term($category, $taxonomy); 
			?>
						<li><a href="#" data-group="<?php echo esc_attr('category-' . $term->slug); ?>"><?php echo esc_attr($term->name); ?></a></li>
			<?php
					} 
				endforeach; 
			?>
		</ul>
	</div>
	<div class="zo-carousel-filter-hidden" style="display: none"></div>
<?php endif; ?>
	<div class="col-sm-6">
		<div class="info">
			<div class="semitri-title-style1"> 
				<p>
				<?php
					if(!empty($atts['zo_carousel_block']))
						echo esc_attr($atts['zo_carousel_block']);
				?>
				</p>
			</div>
			<h2 class="title">
				<?php
					if(!empty($atts['zo_carousel_title']))
						echo esc_attr($atts['zo_carousel_title']);
				?>
			</h1>
			<div class="description semitri-title-style1">
				<p>
				<?php
					if(!empty($atts['zo_carousel_description']))
						echo esc_attr($atts['zo_carousel_description']);
				?>
				</p>
			</div>
		</div>
		<div class="list-image-carousel">
			<?php
			$posts = $atts['posts'];
			$i = 1;
			while ($posts->have_posts()) :
			$posts->the_post();
				if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
					$class = ' has-thumbnail';
					$thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium');
				else:
					$class = ' no-image';
					$thumbnail = '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
				endif;
				echo '<div class="item zo-grid-media image-'.$i++.' '. esc_attr($class) . '">' . $thumbnail . '</div>';
			endwhile;
			?>
		</div>
	</div>
	<div class="col-sm-6">
		 <div class="zo-carousel " id="<?php echo esc_attr($atts['html_id']); ?>">
			<?php
			$posts = $atts['posts'];
			while ($posts->have_posts()) :
				$posts->the_post();
				$groups = array();
				$groups[] = 'zo-carousel-filter-item all';
				foreach (zoGetCategoriesByPostID(get_the_ID(), $taxonomy) as $category) {
					$groups[] = 'category-' . $category->slug;
				}
				?>
				<div class="zo-carousel-item <?php echo implode(' ', $groups);?>">
					<?php
					if (has_post_thumbnail() && !post_password_required() && !is_attachment() && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full', false)):
						$class = ' has-thumbnail';
						$thumbnail = get_the_post_thumbnail(get_the_ID(), 'medium');
					else:
						$class = ' no-image';
						$thumbnail = '<img src="' . ZO_IMAGES . 'no-image.jpg" alt="' . get_the_title() . '" />';
					endif;
					echo '<div class="zo-grid-media ' . esc_attr($class) . '">' . $thumbnail . '</div>';
					?>
					<div class="zo-carousel-content">
						<?php the_content();?>
					</div>
					<h3 class="zo-carousel-title">
						<a href="<?php the_permalink()?>"> <?php the_title();?></a>
					</h3>
				</div>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>
