<?php
if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header(); ?>
<?php 
	$field = get_fields(); 
?>
<div class="main-content">
	<div class="container-fluid">
		<div class="row">
			<?php 
			$args = array('post_type' => 'slider',
						'post_status' => 'publish',
						'posts_per_page'=>5);
		    $my_query = null;
		    $my_query = new WP_Query($args);
		    if( $my_query->have_posts() ):
			?>
			<div class="owl-slider">
				<?php while ($my_query->have_posts()):
					$my_query->the_post(); ?>
					<div  class="owl-iterm ">
					<?php 
						$src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
						$url = $src[0];
					?>
					 	<div class="img-slider" style="background:url(<?php echo $url?>); min-height: 300px;"></div>
					</div>
				<?php 
					endwhile; 
					wp_reset_postdata();
				?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="container">
		<div class="form-sign-up">
			<?php echo (shortcode_exists('formidable'))? do_shortcode('[formidable id=2]'): ''?>
		</div>
	</div>
	<div class="container">
		<div class="page-content">
			<div class="entry-content">
				<?php 
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							the_content();
						}
					} 
				?> 
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php 
				$args = array('post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page'=>6,
					'category_name'=> 'feature',
					'order' => 'asc'
					);
			 	$post_home = null;
			 	$post_home = new WP_Query($args);
			    if( $post_home->have_posts() ):
			?> 
			<div class="feature">
				<?php while ($post_home->have_posts()):
					$post_home->the_post();
				?>
				<div class="feature_item col-md-4">
					<a href="#">
						<?php the_post_thumbnail('medium'); ?>
					</a>
					<div class="entry-content">
						<a href="<?php the_field('link',get_the_ID()); ?>"><h3 class="iterm-title"><?php  the_title(); ?> </h3></a>
						<div class="content">
							<?php the_content() ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
get_footer();


